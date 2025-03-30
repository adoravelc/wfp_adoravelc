<div class="sidebar">
    <div class="sidebar-header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="sidebar-logo">
            <img src="{{ asset('asset/logo_adoravelc.png') }}" alt="Logo" class="sidebar-logo-img">
        </a>
    </div>
    <!-- Sidebar Links -->
    <a href="{{ url('/laporan') }}" class="{{ request()->is('laporan') ? 'active' : '' }}">Reports</a>
    <a href="{{ url('/daftar-kategori') }}" class="{{ request()->is('daftar-kategori') ? 'active' : '' }}">Categories</a>
    <a href="{{ url('/daftar-makanan') }}" class="{{ request()->is('daftar-makanan') ? 'active' : '' }}">Foods</a>
    <a href="{{ url('/daftar-order') }}" class="{{ request()->is('daftar-order') ? 'active' : '' }}">Orders</a>
    <a href="{{ url('/daftar-customer') }}" class="{{ request()->is('daftar-customer') ? 'active' : '' }}">Customers</a>

    @include('components.footer')
</div>
