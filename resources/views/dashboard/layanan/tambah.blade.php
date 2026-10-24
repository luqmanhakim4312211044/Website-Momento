<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
    <title>Momento Studio</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js" integrity="sha384-nLoOnA/BDh8A/jxqtckg4DumuCGOBYUnNJLZdQz/zfYNp3wcjGSoWTAzgko06G/2" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin:0">
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first() }}',
                showConfirmButton: true,
            });
        @endif
    </script>
    <div style="display: flex; height:100vh">
        @include('dashboard.sidebar')
        <div style="width: 100%">
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px">
                <button onclick="toggleSidebar()" style="font-size:24px; background:none; border:none; cursor:pointer" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">☰</button>
                <div style="display:flex; flex-direction: row; align-items: center; gap: 5px">
                    <a href="/" style="color:black; text-decoration:none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">Home</a>
                    <p style="text-decoration:none; font-family: 'Inter', sans-serif; margin: 0">/</p>
                    <a href="/dashboard/layanan" style="color:black; text-decoration:none; font-family: 'Inter', sans-serif" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">Layanan</a>
                    <p style="text-decoration:none; font-family: 'Inter', sans-serif; margin: 0">/</p>
                    <a href="/dashboard/layanan/tambah" style="color:darkgoldenrod; text-decoration:none; font-family: 'Inter', sans-serif">Tambah Layanan</a>
                </div>
            </div>
            <h1 style="margin-bottom:3vw; margin-left:10px; font-family: 'Inter', sans-serif">Tambah Layanan</h1>
            <div style="box-shadow: 4px 4px 10px rgba(0,0,0,0.1); border:1px solid #ccc; padding: 20px; width: 85vw; margin: auto">
                <form action="/dashboard/layanan/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label style="font-size: clamp(20px, 4vw, 30px); font-family: 'Inter', sans-serif">Nama Layanan (Required)</label><br>
                    <input type="text" name="nama_layanan" placeholder="Masukkan nama layanan" style="font-size: clamp(20px, 4vw, 30px); margin-bottom: 30px; margin-top: 30px; height: 50px; width:100%; font-family: 'Inter', sans-serif"><br>
                    <label style="font-size: clamp(20px, 4vw, 30px); font-family: 'Inter', sans-serif">Deskripsi Layanan (Required)</label><br>
                    <textarea name="deskripsi" placeholder="Masukkan deskripsi layanan" style="font-size: clamp(20px, 4vw, 30px); margin-bottom: 30px; margin-top: 30px; height: 120px; width:100%; font-family: 'Inter', sans-serif"></textarea><br>
                    <label style="font-size: clamp(20px, 4vw, 30px); font-family: 'Inter', sans-serif">Foto Layanan (Required)</label><br>
                    <input type="file" name="foto_layanan" placeholder="Foto" style="font-size: clamp(20px, 4vw, 30px); margin-bottom: 30px; margin-top: 30px; font-family: 'Inter', sans-serif; padding-top: 10px; padding-bottom: 10px;font-family: 'Inter', sans-serif; border:1px solid #ccc; width: 100%" accept="image/png, image/jpg, image/jpeg"><br>
                    <button type="submit" style="padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif" onmouseover="this.style.backgroundColor='goldenrod'"onmouseout="this.style.backgroundColor='darkgoldenrod'">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>