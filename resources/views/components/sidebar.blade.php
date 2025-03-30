<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-logo">
            <img src="{{ asset('asset/logo_adoravelc.png') }}" alt="Logo" class="sidebar-logo-img">
        </a>
        @auth
            <div class="sidebar-user">
                Hi {{ Auth::user()->name }}!
            </div>
        @endauth
    </div>
    <a href="{{ url('/laporan') }}" class="{{ request()->is('laporan') ? 'active' : '' }}">Reports</a>
    <a href="{{ url('/daftar-kategori') }}" class="{{ request()->is('daftar-kategori') ? 'active' : '' }}">Categories</a>
    <a href="{{ url('/daftar-makanan') }}" class="{{ request()->is('daftar-makanan') ? 'active' : '' }}">Foods</a>
    <a href="{{ url('/daftar-order') }}" class="{{ request()->is('daftar-order') ? 'active' : '' }}">Orders</a>
    <a href="{{ url('/daftar-customer') }}" class="{{ request()->is('daftar-customer') ? 'active' : '' }}">Customers</a>
    
    @guest
        <form action="{{ route('login') }}" method="GET">
            <button type="submit" class="sidebar-login-btn">
                <i class="fa fa-sign-in-alt"></i> Login
            </button>
        </form>
    @endguest
    
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-logout-btn">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>
    @endauth
    @include('components.footer')
</div>
