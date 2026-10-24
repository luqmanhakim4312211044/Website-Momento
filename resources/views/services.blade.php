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
        <h1 style="font-size: clamp(25px, 4vw, 40px); margin-top: 140px; font-family: 'Inter', sans-serif">Layanan Momento Studio</h1>
        @foreach ($data as $i => $item)
            <div id="{{ $item->id_layanan }}" style="scroll-margin-top: 170px; display:flex; margin-top: clamp(30px, 5vw, 55px); gap:5vw; flex-wrap:wrap; justify-content: center; align-items: center">
                <div style="background-color:black; width: clamp(320px, 40vw, 680px); height: clamp(180px, 30vw, 540px)">
                    <img src="{{ asset('storage/layanan/' . $item->foto_layanan) }}" style="width:100%; height:100%; object-fit:cover">
                </div>
                <div style="display: flex; flex-direction: column">
                    <h1 style="font-size: clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">{{ $item->nama_layanan }}</h1>
                    <p style="font-size: clamp(15px, 3vw, 25px); max-width: clamp(320px, 60vw, 680px); text-align: justify; font-family: 'Inter', sans-serif;">{{ $item->deskripsi }}</p>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:10px; margin:40px; width:100%; justify-content: center">
                <div style="width: 45%;height:3px; background-color:black;"></div>
                <div style="font-size:12px; color:black">◆</div>
                <div style="width: 45%;height:3px;background-color:black;"></div>
            </div>
        @endforeach
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; background-color: white; width:100%; box-shadow: 0 -2px 10px rgba(0,0,0,0.1)">
        <h1 style="font-size: clamp(22px, 4vw, 35px)">Momento Studio</h1>
    </div>
</body>
</html>