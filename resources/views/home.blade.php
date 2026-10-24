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
    <video autoplay muted loop style="position:absolute; z-index: -1; width: 100%; height: 100%; object-fit: cover">
        <source src="{{ asset('videos/background.mp4') }}">
    </video>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100svh">
        <h1 style="color: white; font-size: clamp(24px, 5vw, 40px); font-family: 'Inter', sans-serif">ABADIKAN MOMEN ANDA</h1>
        <h1 style="color: white; font-size: clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">FOTO & VIDEO</h1>
        <a href="/contact" style="margin-top: 30px; padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">Hubungi Kami</a>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; text-align:center">
        <h1 style="font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif">Tentang Momento Studio</h1>
        <p style="font-size: clamp(15px, 3vw, 25px); max-width:85vw; font-family: 'Inter', sans-serif">Momento Studio hadir karena kami percaya setiap momen punya cerita istimewa yang layak untuk dikenang. Kami tidak hanya memotret atau merekam video, tetapi juga menangkap emosi, detail, dan suasana yang membuat setiap momen terasa hidup.</p>
        <a href="/about" style="margin-top: 30px; margin-bottom: 30px; padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">Baca Selengkapnya</a>
    </div>
    <div id="layanan" style="scroll-margin-top: 170px; display: flex; flex-direction: column; align-items: center; background-color: black; width:100%">
        <h1 style="color:white; font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif">Layanan Kami</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-bottom: 60px; flex-wrap:wrap; gap:7vw; flex-wrap:wrap">
            @if ($layanan->currentPage() == 1)
                <a href="{{ $layanan->url($layanan->lastPage()) }}#layanan" style="font-size:30px; color:white; text-decoration:none">
                    &#10094;
                </a>
            @else
                <a href="{{ $layanan->previousPageUrl() }}#layanan" style="font-size:30px; color:white; text-decoration:none">
                    &#10094;
                </a>
            @endif
            @foreach ($layanan as $i => $item)
                <div style="background-color:white; width: clamp(50px, 20vw, 220px); height: clamp(50px, 20vw, 220px)">
                    <a href="/services#{{ $item->id_layanan }}"><img src="{{ asset('storage/layanan/' . $item->foto_layanan) }}" style="width:100%; height:100%; object-fit:cover"> </a>
                    <a href="/services#{{ $item->id_layanan }}" style="text-decoration: none"><p style="margin-top:10px; font-weight:bold; color:white; text-align:center; font-size: clamp(13px, 2vw, 20px); font-family: 'Inter', sans-serif">{{ $item->nama_layanan }}</p></a>
                </div>
            @endforeach
            @if ($layanan->currentPage() == $layanan->lastPage())
                <a href="{{ $layanan->url(1) }}#layanan" style="font-size:30px; color:white; text-decoration:none">
                    &#10095;
                </a>
            @else
                <a href="{{ $layanan->nextPageUrl() }}#layanan" style="font-size:30px; color:white; text-decoration:none">
                    &#10095;
                </a>
            @endif
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%">
        <h1 style="font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif">Portofolio Foto & Video</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-bottom: 30px; margin-top: 30px; gap:8vw; flex-wrap:wrap">
            <div style="background-color:black; width: clamp(320px, 40vw, 640px); height: clamp(180px, 30vw, 360px)">
                <img src="{{ asset('images/test4.jpg') }}" style="width:100%; height:100%; object-fit:cover">
            </div>
            <div style="background-color:white; width: clamp(320px, 40vw, 640px); height: clamp(180px, 30vw, 360px)">
                <video controls style="width: 100%; height: 100%; object-fit: cover">
                    <source src="{{ asset('videos/test6.mp4') }}">
                </video>
            </div>
        </div>
        <a href="https://www.instagram.com/momentomoto/" target="_blank" style="margin-top: clamp(15px, 3vw, 30px); margin-bottom: 30px; padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">Lihat Semua</a>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: black; width:100%">
        <h1 style="color:white; font-size: clamp(25px, 4vw, 40px); font-family: 'Inter', sans-serif">Galeri Drone</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-bottom: 30px; margin-top: 30px; gap:8vw; flex-wrap:wrap">
            @foreach ($portofolioVideo as $i => $item)
                <div style="background-color:white; width: clamp(320px, 40vw, 640px); height: clamp(180px, 30vw, 360px)">
                    <video controls style="width: 100%; height: 100%; object-fit: cover">
                        <source src="{{ asset('storage/video/' . $item->video_showcase) }}">
                    </video>
                </div>
            @endforeach
        </div>
        <a href="/showcase" style="margin-top:clamp(15px, 3vw, 30px); margin-bottom: 30px; padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">Lihat Semua</a>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1)">
        <h1 style="font-size: clamp(22px, 4vw, 35px)">Momento Studio</h1>
    </div>
</body>
</html>

