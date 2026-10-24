<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    private function createAdmin(string $username = 'admin', string $password = 'rahasia-123'): Admin
    {
        return Admin::create([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);
    }

    public function test_guest_is_sent_to_login_from_every_admin_page(): void
    {
        $pages = [
            '/dashboard',
            '/dashboard/layanan',
            '/dashboard/profilpendiri',
            '/dashboard/video',
            '/dashboard/mediasosial',
            '/dashboard/kontak',
            '/dashboard/pesan',
        ];

        foreach ($pages as $url) {
            $this->get($url)->assertRedirect('/login');
        }
    }

    public function test_guest_cannot_change_or_delete_data(): void
    {
        $this->post('/dashboard/layanan/tambah')->assertRedirect('/login');
        $this->post('/dashboard/kontak/edit/1')->assertRedirect('/login');
        $this->delete('/dashboard/pesan/delete/1')->assertRedirect('/login');
        $this->delete('/dashboard/layanan/delete/1')->assertRedirect('/login');
        $this->post('/logout')->assertRedirect('/login');
    }

    public function test_admin_can_log_in_with_correct_password(): void
    {
        $this->createAdmin();

        $this->post('/login', ['username' => 'admin', 'password' => 'rahasia-123'])
            ->assertRedirect('/dashboard')
            ->assertSessionHas('admin_logged_in', true);

        $this->get('/dashboard')->assertOk();
    }

    public function test_wrong_password_is_rejected(): void
    {
        $this->createAdmin();

        $this->from('/login')
            ->post('/login', ['username' => 'admin', 'password' => 'salah'])
            ->assertRedirect('/login')
            ->assertSessionHas('error', 'Username atau password salah')
            ->assertSessionMissing('admin_logged_in');
    }

    public function test_unknown_username_is_rejected_with_the_same_message(): void
    {
        $this->createAdmin();

        $this->from('/login')
            ->post('/login', ['username' => 'orang-lain', 'password' => 'rahasia-123'])
            ->assertRedirect('/login')
            ->assertSessionHas('error', 'Username atau password salah')
            ->assertSessionMissing('admin_logged_in');
    }

    public function test_empty_or_non_text_login_input_does_not_crash(): void
    {
        $this->createAdmin();

        $this->from('/login')->post('/login', [])
            ->assertRedirect('/login')
            ->assertSessionHas('error');

        $this->from('/login')
            ->post('/login', ['username' => ['admin'], 'password' => ['rahasia-123']])
            ->assertRedirect('/login')
            ->assertSessionHas('error')
            ->assertSessionMissing('admin_logged_in');
    }

    public function test_oversized_login_input_is_rejected(): void
    {
        $this->createAdmin();

        $this->from('/login')
            ->post('/login', ['username' => 'admin', 'password' => str_repeat('a', 256)])
            ->assertRedirect('/login')
            ->assertSessionMissing('admin_logged_in');
    }

    public function test_login_is_rate_limited(): void
    {
        $this->createAdmin();

        for ($i = 1; $i <= 5; $i++) {
            $this->from('/login')
                ->post('/login', ['username' => 'admin', 'password' => 'salah'])
                ->assertRedirect('/login');
        }

        // Percobaan ke-6 ditolak walaupun passwordnya benar.
        $this->post('/login', ['username' => 'admin', 'password' => 'rahasia-123'])
            ->assertStatus(429);
    }

    public function test_logout_ends_the_admin_session(): void
    {
        $this->withSession(['admin_logged_in' => true]);

        $this->get('/dashboard')->assertOk();

        $this->post('/logout')->assertRedirect('/login');

        $this->get('/dashboard')->assertRedirect('/login');
    }
}
