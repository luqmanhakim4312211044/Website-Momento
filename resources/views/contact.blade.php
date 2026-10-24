<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js" integrity="sha384-nLoOnA/BDh8A/jxqtckg4DumuCGOBYUnNJLZdQz/zfYNp3wcjGSoWTAzgko06G/2" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin:0; min-height: 100vh; display: flex; flex-direction: column">
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Fail!',
                text: '{{ $errors->first() }}',
                showConfirmButton: true,
            });
        @endif
    </script>
    @include('navbar')
    <div style="display: flex; justify-content: center; margin-bottom: 40px">
        <div style="display:flex; align-items:flex-start; justify-content:center; margin-top: 140px; flex-wrap:wrap; gap:5vw">
            <form action="/contact" method="POST">
                @csrf
                {{-- Honeypot anti-spam: jangan dihapus. Disembunyikan dari pengguna asli. --}}
                <div style="position:absolute; left:-9999px; top:-9999px" aria-hidden="true">
                    <label>Website</label>
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>
                <label style="font-size:clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Nama (Wajib Diisi)</label><br>
                <input type="text" name="nama_pengirim" placeholder="Masukkan nama Anda" style="font-size: clamp(22px, 4vw, 35px); width: clamp(300px, 50vw, 700px); margin-bottom: 30px; margin-top: 30px; height: 50px; font-family: 'Inter', sans-serif"><br>
                <label style="font-size:clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Email (Wajib Diisi)</label><br>
                <input type="email" name="email_pengirim" pattern="^[^@\s]+@(gmail\.com|yahoo\.com|outlook\.com|GMAIL\.COM|YAHOO\.COM|OUTLOOK\.COM)$" oninvalid="this.setCustomValidity('Masukkan email valid (contoh: email@gmail.com)')" oninput="this.setCustomValidity('')" placeholder="Masukkan email Anda" style="font-size: clamp(22px, 4vw, 35px); width: clamp(300px, 50vw, 700px); margin-bottom: 30px; margin-top: 30px; height: 50px; font-family: 'Inter', sans-serif"><br>
                <label style="font-size:clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Pesan (Wajib Diisi)</label><br>
                <textarea type="text" name="isi_pesan" placeholder="Masukkan pesan Anda" style="font-size: clamp(22px, 4vw, 35px); width: clamp(300px, 50vw, 700px); margin-bottom: 30px; margin-top: 30px; height: 120px; font-family: 'Inter', sans-serif"></textarea><br>
                <button type="submit" style="padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">Kirim</button>
            </form>
            <div style="display: flex; flex-direction: column; gap: 10px">
                <h1 style="font-size: clamp(22px, 4vw, 35px); margin-bottom: 20px; font-family: 'Inter', sans-serif">Media Sosial</h1>
                @foreach($mediaSosial as $i => $item)
                    <a href="{{ $item->url_media }}" target="_blank" style="color: black; font-size: clamp(20px, 4vw, 30px); margin-bottom: 20px; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'"><img src="{{ asset('storage/mediasosial/' . $item->logo_platform) }}" style="height: 45px; width: 45px; margin-right: 10px; vertical-align: middle">{{ $item->nama_media }}</a>
                @endforeach
                <h1 style="font-size: clamp(22px, 4vw, 35px); margin-bottom: 20px; font-family: 'Inter', sans-serif">Kontak</h1>
                @foreach($kontak as $i => $item)
                    @if ($item->jenis_kontak == 'Email')
                        <a href="mailto:{{ $item->isi_kontak }}" style="color: black; font-size: clamp(20px, 4vw, 30px); margin-bottom: 20px; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'"><img src="{{ asset('storage/kontak/' . $item->logo_kontak) }}" style="height: 45px; width: 45px; margin-right: 10px; vertical-align: middle">{{ $item->isi_kontak }}</a>
                    @elseif ($item->jenis_kontak == 'Telefon')
                        <a href="tel:{{ $item->isi_kontak }}" style="color: black; font-size: clamp(20px, 4vw, 30px); margin-bottom: 20px; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'"><img src="{{ asset('storage/kontak/' . $item->logo_kontak) }}" style="height: 45px; width: 45px; margin-right: 10px; vertical-align: middle">{{ $item->isi_kontak }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1); margin-top: auto">
        <h1 style="font-size: clamp(22px, 4vw, 35px)">Momento Studio</h1>
    </div>
</body>
</html>