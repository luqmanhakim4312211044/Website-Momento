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
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
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
                    <a href="/dashboard/profilpendiri" style="color:darkgoldenrod; text-decoration:none; font-family: 'Inter', sans-serif">Profil Pendiri</a>
                </div>
            </div>
            <h1 style="margin-bottom:3vw; margin-left:10px; font-family: 'Inter', sans-serif">Profil Pendiri</h1>
            <div style="display:flex; justify-content:flex-end; padding-right: 1vw">
                <a href="/dashboard/profilpendiri/tambah" style="border:1px solid black; padding:5px 10px; text-decoration:none; color:black; font-family: 'Inter', sans-serif; background-color: darkgoldenrod; color: white;" onmouseover="this.style.backgroundColor='goldenrod'" onmouseout="this.style.backgroundColor='darkgoldenrod'">+ Tambah</a>
            </div>
            <div style="max-width:100vw; overflow-x:auto">
                <table style="border-collapse:collapse; width:100vw">
                    <thead>
                        <tr>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">No.</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Nama</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Deskripsi</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Foto</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                            <tr>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $i + 1 }}</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $item->nama_pendiri }}</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif; min-width:350px">{{ $item->deskripsi_pendiri }}</td>
                                <td style="border-bottom:1px solid black; padding:8px;"><img src="{{ asset('storage/pendiri/' . $item->foto_pendiri) }}" height="100px"></td>
                                <td style="border-bottom:1px solid black; padding:8px;">
                                    <div style="display:flex; flex-wrap:wrap; gap:10px">
                                        <a href="/dashboard/profilpendiri/edit/{{ $item->id_pendiri }}" style="border:1px solid black; padding:4px 10px; color:black; text-decoration:none; font-family: 'Inter', sans-serif; background-color: blue; color: white;" onmouseover="this.style.backgroundColor='lightblue'" onmouseout="this.style.backgroundColor='blue'">EDIT</a>
                                        <form action="/dashboard/profilpendiri/delete/{{ $item->id_pendiri }}" method="POST" style="margin:0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border:1px solid black; padding:4px 10px; color:black;  font-family: 'Inter', sans-serif; background-color: red; color: white; cursor:pointer; font-size:inherit;" onmouseover="this.style.backgroundColor='lightcoral'" onmouseout="this.style.backgroundColor='red'">DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>