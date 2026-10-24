<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha384-/o6I2CkkWC//PSjvWC/eYN7l3xM3tJm8ZzVkCOfp//W05QcE3mlGskpoHB6XqI+B" crossorigin="anonymous">
</head>
<body style="margin:0">
    <div style="display: flex; height:100vh">
        @include('dashboard.sidebar')
        <div style="width: 100%">
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px">
                <button onclick="toggleSidebar()" style="font-size:24px; background:none; border:none; cursor:pointer" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">☰</button>
                <div style="display:flex; flex-direction: row; align-items: center; gap: 5px">
                    <a href="/" style="color:black; text-decoration:none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">Home</a>
                    <p style="text-decoration:none; font-family: 'Inter', sans-serif; margin: 0">/</p>
                    <a href="/dashboard" style="color:darkgoldenrod; text-decoration:none; font-family: 'Inter', sans-serif">Dashboard</a>
                </div>
            </div>
            <h1 style="margin-bottom:3vw; margin-left:10px; font-family: 'Inter', sans-serif">Dashboard</h1>
            <div style="display:flex; justify-content:center; margin-bottom:3vw; flex-wrap:wrap; gap: 3vw; text-align:center">
                <a href="/dashboard/layanan" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-gear"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Layanan</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $layanan->count() }} Layanan</p>
                    </div>
                </a>
                <a href="/dashboard/profilpendiri" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-user"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Profil Pendiri</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $profilPendiri->count() }} Profil Pendiri</p>
                    </div>
                </a>
                <a href="/dashboard/video" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-video"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Showcase Video</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $showcaseVideo->count() }} Video</p>
                    </div>
                </a>
            </div>
            <div style="display:flex; justify-content:center; flex-wrap:wrap; gap: 3vw; text-align:center">
                <a href="/dashboard/mediasosial" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-comments"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Media Sosial</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $mediaSosial->count() }} Media Sosial</p>
                    </div>
                </a>
                <a href="/dashboard/kontak" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Kontak</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $kontak->count() }} Kontak</p>
                    </div>
                </a>
                <a href="/dashboard/pesan" style="text-decoration:none; background-color:darkgoldenrod; gap:20px; width:clamp(350px, 40vw, 450px); height: clamp(100px, 20vw, 150px); display:flex; align-items:center; justify-content:center; color: white" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    <div style="font-size:clamp(40px, 4vw, 50px); margin-right: 10px"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <p style="margin:0; font-weight:bold; font-family: 'Inter', sans-serif; font-size:20px">Pesan</p>
                        <p style="margin:0; font-family: 'Inter', sans-serif; font-size:20px">{{ $pesanGuest->count() }} Pesan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>