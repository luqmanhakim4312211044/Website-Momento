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
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login!',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            });
        @endif
    </script>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100svh">
        <h1 style="color: black; margin-bottom: 30px; font-family: 'Inter', sans-serif; font-size: clamp(25px, 4vw, 40px)">LOGIN</h1>
        <form action="/login" method="POST">
            @csrf
            <label style="font-size:clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Username</label><br>
            <input type="text" name="username" placeholder="Enter your username" 
                   style="font-size: clamp(22px, 4vw, 35px); width: clamp(300px, 50vw, 700px); margin-bottom: 30px; margin-top: 30px; height: 50px; font-family: 'Inter', sans-serif"><br>
            <label style="font-size:clamp(22px, 4vw, 35px); font-family: 'Inter', sans-serif">Password</label><br>
            <input type="password" name="password" placeholder="Enter your password" 
                   style="font-size: clamp(22px, 4vw, 35px); width: clamp(300px, 50vw, 700px); margin-bottom: 90px; margin-top: 30px; height: 50px; font-family: 'Inter', sans-serif"><br>
            <div style="display: flex; justify-content: center">
                <button type="submit"
                    style="font-size: clamp(22px, 4vw, 35px); padding: 12px 24px; background-color: darkgoldenrod; color: white; font-weight: bold; text-decoration: none; font-family: 'Inter', sans-serif"
                    onmouseover="this.style.backgroundColor='goldenrod'"
                    onmouseout="this.style.backgroundColor='darkgoldenrod'">
                    LOGIN
                </button>
            </div>
        </form>
    </div>
</body>
</html>
