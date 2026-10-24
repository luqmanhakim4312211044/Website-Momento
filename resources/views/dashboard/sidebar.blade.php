<div id="sidebar" style="width:130px; background-color:white; padding:20px; display: flex; flex-direction: column; align-items: center; height:100vh; transition: left 0.3s; position:fixed; left:-170px; z-index:1; box-shadow: 5px 0 10px rgba(0,0,0,0.1)">
    <div style="margin-bottom: 30px">
        <a href="/"><img src="{{ asset('images/logo.png') }}" style="height: clamp(35px, 4vw, 45px)"></a>
    </div>
    <a href="/dashboard" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard') ? 'darkgoldenrod' : 'black' }}'">
        Dashboard
    </a>

    <a href="/dashboard/layanan" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/layanan*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/layanan*') ? 'darkgoldenrod' : 'black' }}'">
        Layanan
    </a>

    <a href="/dashboard/profilpendiri" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/profilpendiri*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/profilpendiri*') ? 'darkgoldenrod' : 'black' }}'">
        Profil Pendiri
    </a>

    <a href="/dashboard/video" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/video*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/video*') ? 'darkgoldenrod' : 'black' }}'">
        Showcase Video
    </a>

    <a href="/dashboard/mediasosial" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/mediasosial*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/mediasosial*') ? 'darkgoldenrod' : 'black' }}'">
        Media Sosial
    </a>

    <a href="/dashboard/kontak" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/kontak*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/kontak*') ? 'darkgoldenrod' : 'black' }}'">
        Kontak
    </a>

    <a href="/dashboard/pesan" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('dashboard/pesan*') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('dashboard/pesan*') ? 'darkgoldenrod' : 'black' }}'">
        Pesan
    </a>

    <form action="/logout" method="POST" style="margin-bottom:15px">
        @csrf
        <button type="submit"
            style="background:none; border:none; cursor:pointer; padding:0; font:inherit; color:black"
            onmouseover="this.style.color='darkgoldenrod'"
            onmouseout="this.style.color='black'">
            Logout
        </button>
    </form>

    <button onclick="toggleSidebar()" style="font-size:24px; background:none; border:none; cursor:pointer" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">☰</button>
</div>

<script>
    let isOpen = false;
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (isOpen) {
            sidebar.style.left = '-170px';
        } else {
            sidebar.style.left = '0px';
        }
        isOpen = !isOpen;
    }
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        if (isOpen) {
            if (!sidebar.contains(e.target) && !e.target.closest('button')) {
                sidebar.style.left = '-170px';
                isOpen = false;
            }
        }
    });
</script>