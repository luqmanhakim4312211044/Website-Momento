<?php

namespace Tests\Feature;

use App\Models\PesanGuest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    private function validMessage(array $override = []): array
    {
        return array_merge([
            'nama_pengirim' => 'Sari',
            'email_pengirim' => 'sari@example.com',
            'isi_pesan' => 'Halo, saya ingin bertanya soal paket video.',
        ], $override);
    }

    public function test_visitor_can_send_a_message(): void
    {
        $this->post('/contact', $this->validMessage())
            ->assertRedirect('/contact')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('pesan_guest', [
            'nama_pengirim' => 'Sari',
            'email_pengirim' => 'sari@example.com',
        ]);
    }

    public function test_empty_form_is_rejected(): void
    {
        $this->post('/contact', [])
            ->assertSessionHasErrors(['nama_pengirim', 'email_pengirim', 'isi_pesan']);

        $this->assertSame(0, PesanGuest::count());
    }

    public function test_invalid_email_is_rejected(): void
    {
        $this->post('/contact', $this->validMessage(['email_pengirim' => 'bukan-email']))
            ->assertSessionHasErrors('email_pengirim');

        $this->assertSame(0, PesanGuest::count());
    }

    public function test_too_long_input_is_rejected(): void
    {
        $this->post('/contact', $this->validMessage(['nama_pengirim' => str_repeat('a', 101)]))
            ->assertSessionHasErrors('nama_pengirim');

        $this->post('/contact', $this->validMessage(['isi_pesan' => str_repeat('a', 2001)]))
            ->assertSessionHasErrors('isi_pesan');

        $this->assertSame(0, PesanGuest::count());
    }

    public function test_message_at_the_length_limits_is_accepted(): void
    {
        $this->post('/contact', $this->validMessage([
            'nama_pengirim' => str_repeat('a', 100),
            'isi_pesan' => str_repeat('b', 2000),
        ]))->assertSessionHasNoErrors();

        $this->assertSame(1, PesanGuest::count());
    }

    public function test_bot_that_fills_the_honeypot_is_ignored_silently(): void
    {
        $this->post('/contact', $this->validMessage(['website' => 'http://spam.example']))
            ->assertRedirect('/contact')
            ->assertSessionHas('success');

        $this->assertSame(0, PesanGuest::count());
    }

    public function test_contact_form_is_rate_limited(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $this->post('/contact', $this->validMessage())->assertRedirect('/contact');
        }

        $this->post('/contact', $this->validMessage())->assertStatus(429);

        $this->assertSame(3, PesanGuest::count());
    }
}
