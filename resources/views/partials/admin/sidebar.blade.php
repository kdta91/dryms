@if (Auth::check())
<div id="sidebar" class="bg-dark text-white">
    <div id="brand">
        <a class="navbar-brand" href="{{ url('/admin') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div>
        <a href="/admin"><span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span> <span class="sidebar-text">Dashboard</span></a>
        <a href="/admin/rooms"><span class="sidebar-icon"><i class="fas fa-hotel"></i></span> <span class="sidebar-text">Rooms</span></a>
        <a href="/admin/bookings"><span class="sidebar-icon"><i class="fas fa-clipboard-list"></i></span> <span class="sidebar-text">Bookings</span></a>
        <a href="/admin/purchases"><span class="sidebar-icon"><i class="fas fa-money-bill"></i></i></span> <span class="sidebar-text">Purchases</span></a>
        <a href="/admin/receipts"><span class="sidebar-icon"><i class="fas fa-receipt"></i></i></span> <span class="sidebar-text">Receipts</span></a>
        <a href="/admin/vouchers"><span class="sidebar-icon"><i class="fas fa-file-invoice"></i></i></span> <span class="sidebar-text">Vouchers</span></a>
    </div>

    @if (auth()->user()->usertype_id === 1)
    <div>
        <a href="/admin/users"><span class="sidebar-icon"><i class="fas fa-users"></i></span> <span class="sidebar-text">User Management</span></a>
    </div>
    @endif
</div>
@endif
