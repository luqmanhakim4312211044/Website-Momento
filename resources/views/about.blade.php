<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin:0">
    @include('navbar')
    <div style="display: flex; flex-direction: column; align-items: center">
        <h1 style="font-size: clamp(25px, 4vw, 40px); margin-top: 140px; font-family: 'Inter', sans-serif">Tentang Kami</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-top: clamp(30px, 5vw, 55px); flex-wrap:wrap; gap:5vw">
            <div style="background-color:black; width: clamp(320px, 40vw, 680px); height: clamp(180px, 30vw, 540px)">
                <img src="{{ asset('images/momento.png') }}" style="width:100%; height:100%; object-fit:cover">
            </div>
            <div style="display: flex; flex-direction: column">
                <h1 style="font-size: clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Momento Studio</h1>
                <p style="font-size: clamp(15px, 3vw, 25px); max-width: clamp(320px, 60vw, 680px); text-align: justify; font-family: 'Inter', sans-serif">
                    Momento Studio merupakan perusahaan yang didirikan oleh Tjhin Yut Khong dan bergerak di bidang fotografi dan videografi, termasuk pengambilan gambar menggunakan drone serta layanan percetakan. Perusahaan ini didirikan dengan tujuan memberikan layanan visual yang mencakup prewedding, acara, dokumentasi, serta berbagai kebutuhan foto, video, dan hasil cetak lainnya.
                </p>
            </div>
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; margin-top: clamp(30px, 5vw, 55px); background-color: black">
        <h1 style="font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif; color: white; margin-top: 40px;">Pendiri Kami</h1>
        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: clamp(40px, 7vw, 80px); flex-wrap:wrap; gap: 5vw; margin-top: clamp(30px, 5vw, 55px);">
            @foreach ($profilPendiri as $i => $item)
                <div style="height: clamp(180px, 30vw, 480px)">
                    <img src="{{ asset('storage/pendiri/' . $item->foto_pendiri) }}" style="height:100%; object-fit:cover">
                </div>
                <div style="display: flex; flex-direction: column">
                    <h1 style="font-size: clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif; color: white">{{ $item->nama_pendiri }}</h1>
                    <p style="font-size: clamp(15px, 3vw, 25px); max-width: clamp(320px, 60vw, 680px); text-align: justify; font-family: 'Inter', sans-serif; color: white">{{ $item->deskripsi_pendiri }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; width:100%">
        <h1 style="font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif">Lokasi</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-top: clamp(10px, 4vw, 40px); flex-wrap:wrap; gap:5vw; margin-bottom: clamp(50px, 6vw, 110px);">
            <div style="background-color:black; width: clamp(320px, 40vw, 640px); height: clamp(180px, 30vw, 360px)">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d352.58342924784597!2d104.0052647720318!3d1.1417743029881473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98b9d0e6c24c7%3A0x3d0d97c9ac044d46!2sMomento%20studio!5e0!3m2!1sid!2sid!4v1765339708468!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p style="font-size: clamp(15px, 3vw, 25px); max-width: clamp(320px, 60vw, 680px); text-align: justify; font-family: 'Inter', sans-serif">
                Ruko Nagoya Paradise Center Blok E No.6, RW.3, Batu Selicin, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29433.
            </p>
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1)">
        <h1 style="font-size: clamp(22px, 4vw, 35px)">Momento Studio</h1>
    </div>
</body>
</html>