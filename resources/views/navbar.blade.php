<div style="position: fixed; width: 100%; background: white; padding-top:20px; padding-bottom:20px; display: flex; justify-content: space-between; align-items: center; gap:10vw; z-index:1; box-shadow: 0 2px 10px rgba(0,0,0,0.1)">
    <div style="margin-left: 30px">
        <a href="/"><img src="{{ asset('images/logo.png') }}" style="height: clamp(35px, 4vw, 45px)"></a>
    </div>
    <div id="menu" style="margin-right: 30px; display: flex; gap:2vw; flex-wrap:wrap">

        <a href="/" 
            style="font-size:18px; text-decoration: none; 
            color: {{ request()->is('/') ? 'darkgoldenrod' : 'black' }}"
            onmouseover="this.style.color='darkgoldenrod'" 
            onmouseout="this.style.color='{{ request()->is('/') ? 'darkgoldenrod' : 'black' }}'">
            Beranda
        </a>

        <a href="/about" 
            style="font-size:18px; text-decoration: none; 
            color: {{ request()->is('about') ? 'darkgoldenrod' : 'black' }}"
            onmouseover="this.style.color='darkgoldenrod'" 
            onmouseout="this.style.color='{{ request()->is('about') ? 'darkgoldenrod' : 'black' }}'">
            Tentang Kami
        </a>

        <a href="/services" 
            style="font-size:18px; text-decoration: none; 
            color: {{ request()->is('services') ? 'darkgoldenrod' : 'black' }}"
            onmouseover="this.style.color='darkgoldenrod'" 
            onmouseout="this.style.color='{{ request()->is('services') ? 'darkgoldenrod' : 'black' }}'">
            Layanan
        </a>

        <a href="/showcase" 
            style="font-size:18px; text-decoration: none; 
            color: {{ request()->is('showcase') ? 'darkgoldenrod' : 'black' }}"
            onmouseover="this.style.color='darkgoldenrod'" 
            onmouseout="this.style.color='{{ request()->is('showcase') ? 'darkgoldenrod' : 'black' }}'">
            Galeri
        </a>

        <a href="/contact" 
            style="font-size:18px; text-decoration: none; 
            color: {{ request()->is('contact') ? 'darkgoldenrod' : 'black' }}"
            onmouseover="this.style.color='darkgoldenrod'" 
            onmouseout="this.style.color='{{ request()->is('contact') ? 'darkgoldenrod' : 'black' }}'">
            Kontak
        </a>
    </div>

    <div id="menu-toggle" style="display: none; margin-right:30px">
        <button onclick="toggleSidebar()" style="font-size:24px; background:none; border:none; cursor:pointer" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">☰</button>
    </div>
</div>

<div id="sidebar" style="width:130px; background-color:white; padding:20px; display: flex; flex-direction: column; align-items: center; height:100vh; transition: right 0.3s; position:fixed; right:-170px; z-index:1; box-shadow: 5px 0 10px rgba(0,0,0,0.1)">
    <div style="margin-bottom: 30px">
        <a href="/"><img src="{{ asset('images/logo.png') }}" style="height: clamp(35px, 4vw, 45px)"></a>
    </div>
    <a href="/" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('/') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('/') ? 'darkgoldenrod' : 'black' }}'">
        Beranda
    </a>

    <a href="/about" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('about') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('about') ? 'darkgoldenrod' : 'black' }}'">
        Tentang Kami
    </a>

    <a href="/services" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('services') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('services') ? 'darkgoldenrod' : 'black' }}'">
        Layanan
    </a>

    <a href="/showcase" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('showcase') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('showcase') ? 'darkgoldenrod' : 'black' }}'">
        Galeri
    </a>

    <a href="/contact" 
        style="text-decoration:none; margin-bottom:15px; 
        color: {{ request()->is('contact') ? 'darkgoldenrod' : 'black' }}"
        onmouseover="this.style.color='darkgoldenrod'" 
        onmouseout="this.style.color='{{ request()->is('contact') ? 'darkgoldenrod' : 'black' }}'">
        Kontak
    </a>

    <button onclick="toggleSidebar()" style="font-size:24px; background:none; border:none; cursor:pointer" onmouseover="this.style.color='darkgoldenrod'" onmouseout="this.style.color='black'">☰</button>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const menu = document.getElementById('menu');

    function updateNavbar() {
        if (window.innerWidth <= 768) {
            menuToggle.style.display = 'block';
            menu.style.display = 'none';
        } else {
            menuToggle.style.display = 'none';
            menu.style.display = 'flex';
            sidebar.style.right = '-170px';
        }
    }

    let isOpen = false;
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (isOpen) {
            sidebar.style.right = '-170px';
        } else {
            sidebar.style.right = '0px';
        }
        isOpen = !isOpen;
    }
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        if (isOpen) {
            if (!sidebar.contains(e.target) && !e.target.closest('button')) {
                sidebar.style.right = '-170px';
                isOpen = false;
            }
        }
    });
    window.addEventListener('DOMContentLoaded', updateNavbar);
    window.addEventListener('resize', updateNavbar);
</script>