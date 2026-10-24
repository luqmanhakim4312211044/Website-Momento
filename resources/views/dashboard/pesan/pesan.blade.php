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
                    <a href="/dashboard/pesan" style="color:darkgoldenrod; text-decoration:none; font-family: 'Inter', sans-serif">Pesan</a>
                </div>
            </div>
            <h1 style="margin-bottom:3vw; margin-left:10px; font-family: 'Inter', sans-serif">Pesan</h1>
            <div style="max-width:100vw; overflow-x:auto">
                <table style="width:100vw; border-collapse:collapse">
                    <thead>
                        <tr>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">No.</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Nama</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Email</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Isi</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Tanggal</th>
                            <th style="border-bottom:1px solid black; text-align:left; padding:8px; font-family: 'Inter', sans-serif">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                            <tr>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $i + 1 }}.</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $item->nama_pengirim }}</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $item->email_pengirim }}</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif; min-width:350px">{{ $item->isi_pesan }}</td>
                                <td style="border-bottom:1px solid black; padding:8px; font-family: 'Inter', sans-serif">{{ $item->created_at->format('d-m-Y') }}</td>
                                <td style="border-bottom:1px solid black; padding:8px;">
                                    <div style="display:flex; flex-wrap:wrap; gap:10px">
                                        <form action="/dashboard/pesan/delete/{{ $item->id_pesan }}" method="POST" style="margin:0">
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