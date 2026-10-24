<?php

namespace Tests\Feature;

use App\Models\KontakPerusahaan;
use App\Models\Layanan;
use App\Models\MediaSosial;
use App\Models\ProfilPendiri;
use App\Models\ShowcaseVideo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    private const PAGES = ['/', '/about', '/services', '/showcase', '/contact', '/login'];

    public function test_public_pages_open_even_when_database_is_empty(): void
    {
        foreach (self::PAGES as $url) {
            $status = $this->get($url)->getStatusCode();
            $this->assertSame(200, $status, "Halaman {$url} mengembalikan status {$status}, seharusnya 200.");
        }
    }

    public function test_public_pages_show_data_from_database(): void
    {
        Layanan::create([
            'nama_layanan' => 'Video Company Profile',
            'deskripsi' => 'Pembuatan video profil perusahaan.',
            'foto_layanan' => 'layanan.jpg',
        ]);
        ProfilPendiri::create([
            'nama_pendiri' => 'Budi Santoso',
            'deskripsi_pendiri' => 'Pendiri studio.',
            'foto_pendiri' => 'budi.jpg',
        ]);
        ShowcaseVideo::create(['video_showcase' => 'showcase.mp4']);
        MediaSosial::create([
            'nama_media' => 'Instagram',
            'url_media' => 'https://instagram.com/momento',
            'logo_platform' => 'ig.png',
        ]);
        KontakPerusahaan::create([
            'jenis_kontak' => 'Email',
            'isi_kontak' => 'halo@momento.test',
            'logo_kontak' => 'email.png',
        ]);

        $this->get('/')->assertOk()->assertSee('Video Company Profile');
        $this->get('/services')->assertOk()->assertSee('Video Company Profile');
        $this->get('/about')->assertOk()->assertSee('Budi Santoso');
        $this->get('/showcase')->assertOk()->assertSee('showcase.mp4');
        $this->get('/contact')->assertOk()->assertSee('Instagram')->assertSee('halo@momento.test');
    }

    public function test_pages_send_security_headers(): void
    {
        $this->get('/')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    public function test_contact_page_has_hidden_honeypot_field(): void
    {
        $this->get('/contact')->assertSee('name="website"', false);
    }
}
