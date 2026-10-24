<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
</head>
<body style="margin:0">
    @include('navbar')
    <div style="display: flex; flex-direction: column; align-items: center">
        <h1 style="font-size: clamp(25px, 4vw, 40px); margin-top: 140px; font-family: 'Inter', sans-serif">Galeri Drone</h1>
        <div style="display:flex; align-items:center; justify-content:center; margin-top: clamp(30px, 5vw, 55px); flex-wrap:wrap; gap: clamp(10px, 5vw, 40px)">
            @foreach($data as $i => $item)
                <div style="background-color:black; width: clamp(320px, 40vw, 640px); height: clamp(180px, 30vw, 360px)">
                    <video controls style="width: 100%; height: 100%; object-fit: cover">
                        <source src="{{ asset('storage/video/' . $item->video_showcase) }}">
                    </video>
                </div>
            @endforeach
        </div>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1); margin-top: 40px">
        <h1 style="color:black; font-size: clamp(22px, 4vw, 35px)">Momento Studio</h1>
    </div>
</body>
</html>