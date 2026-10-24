<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    <a href="/dashboard/video" style="color:black; text-decoration:none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">Showcase Video</a>
                    <p style="text-decoration:none; font-family: 'Inter', sans-serif; margin: 0">/</p>
                    <a href="/dashboard/video/edit/{{ $data->id_video }}" style="color:darkgoldenrod; text-decoration:none; font-family: 'Inter', sans-serif">Edit Showcase Video</a>
                </div>
            </div>
            <h1 style="margin-bottom:3vw; margin-left:10px; font-family: 'Inter', sans-serif">Edit Showcase Video</h1>
            <div style="box-shadow: 4px 4px 10px rgba(0,0,0,0.1); border:1px solid #ccc; padding: 20px; width: 85vw; margin: auto">
                <form action="/dashboard/video/edit/{{ $data->id_video }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label style="font-size: clamp(20px, 4vw, 30px); font-family: 'Inter', sans-serif">Video Showcase</label><br>
                    <input type="file" name="video_showcase" style="font-size: clamp(20px, 4vw, 30px); margin-bottom: 30px; margin-top: 30px; padding-top: 10px; padding-bottom: 10px; font-family: 'Inter', sans-serif; border:1px solid #ccc; width: 100%" accept="video/mp4, video/mov, video/avi"><br>
                    <button type="submit" style="padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>