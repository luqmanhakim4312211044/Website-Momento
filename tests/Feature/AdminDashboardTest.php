<?php

namespace Tests\Feature;

use App\Models\KontakPerusahaan;
use App\Models\Layanan;
use App\Models\PesanGuest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withSession(['admin_logged_in' => true]);
    }

    public function test_admin_pages_open(): void
    {
        $pages = [
            '/dashboard',
            '/dashboard/layanan',
            '/dashboard/layanan/tambah',
            '/dashboard/profilpendiri',
            '/dashboard/profilpendiri/tambah',
            '/dashboard/video',
            '/dashboard/video/tambah',
            '/dashboard/mediasosial',
            '/dashboard/mediasosial/tambah',
            '/dashboard/kontak',
            '/dashboard/kontak/tambah',
            '/dashboard/pesan',
        ];

        foreach ($pages as $url) {
            $status = $this->get($url)->getStatusCode();
            $this->assertSame(200, $status, "Halaman {$url} mengembalikan status {$status}, seharusnya 200.");
        }
    }

    public function test_admin_can_open_edit_page_of_existing_data(): void
    {
        $layanan = Layanan::create([
            'nama_layanan' => 'Fotografi Produk',
            'deskripsi' => 'Foto produk untuk katalog.',
            'foto_layanan' => 'foto.jpg',
        ]);

        $this->get("/dashboard/layanan/edit/{$layanan->id_layanan}")
            ->assertOk()
            ->assertSee('Fotografi Produk');
    }

    public function test_admin_can_delete_a_message(): void
    {
        $pesan = PesanGuest::create([
            'nama_pengirim' => 'Sari',
            'email_pengirim' => 'sari@example.com',
            'isi_pesan' => 'Halo',
        ]);

        $this->delete("/dashboard/pesan/delete/{$pesan->id_pesan}")
            ->assertRedirect('/dashboard/pesan');

        $this->assertDatabaseMissing('pesan_guest', ['id_pesan' => $pesan->id_pesan]);
    }

    public function test_message_content_is_escaped_in_the_dashboard(): void
    {
        PesanGuest::create([
            'nama_pengirim' => 'Penyerang',
            'email_pengirim' => 'x@example.com',
            'isi_pesan' => "<script>alert('xss')</script>",
        ]);

        $this->get('/dashboard/pesan')
            ->assertOk()
            ->assertDontSee("<script>alert('xss')</script>", false)
            ->assertSee('&lt;script&gt;', false);
    }

    public function test_adding_a_service_requires_all_fields(): void
    {
        $this->post('/dashboard/layanan/tambah', [])
            ->assertSessionHasErrors(['nama_layanan', 'deskripsi', 'foto_layanan']);

        $this->assertSame(0, Layanan::count());
    }

    public function test_service_upload_rejects_files_that_are_not_images(): void
    {
        $this->post('/dashboard/layanan/tambah', [
            'nama_layanan' => 'Layanan',
            'deskripsi' => 'Deskripsi',
            'foto_layanan' => UploadedFile::fake()->create('shell.php', 10, 'application/x-php'),
        ])->assertSessionHasErrors('foto_layanan');

        $this->assertSame(0, Layanan::count());
    }

    public function test_social_media_link_must_be_http_or_https(): void
    {
        $this->post('/dashboard/mediasosial/tambah', [
            'nama_media' => 'Jahat',
            'url_media' => 'javascript:alert(1)',
        ])->assertSessionHasErrors('url_media');
    }

    public function test_admin_can_delete_a_contact_entry_that_has_no_file_on_disk(): void
    {
        $kontak = KontakPerusahaan::create([
            'jenis_kontak' => 'Email',
            'isi_kontak' => 'halo@momento.test',
            'logo_kontak' => 'tidak-ada.png',
        ]);

        $this->delete("/dashboard/kontak/delete/{$kontak->id_kontak}")
            ->assertRedirect('/dashboard/kontak');

        $this->assertDatabaseMissing('kontak_perusahaan', ['id_kontak' => $kontak->id_kontak]);
    }
}
