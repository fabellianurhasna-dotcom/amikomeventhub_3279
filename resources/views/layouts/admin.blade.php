<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Portal Event')</title>
    
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="admin-wrapper d-flex">

        <aside class="sidebar bg-dark text-white p-3" style="min-height: 100vh; width: 250px;">
            <h3 class="text-center mb-4">Admin Panel</h3>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="/admin/dashboard" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/events" class="nav-link text-white">Kelola Event</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/tickets" class="nav-link text-white">Pesanan Tiket</a>
                </li>
                <li class="nav-item mt-5">
                    <a href="/" class="nav-link text-danger">Logout</a>
                </li>
            </ul>
        </aside>

        <div class="main-content flex-grow-1">

            <header class="top-navbar bg-light p-3 border-bottom d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Selamat Datang, Admin</h4>
                <div class="user-profile">
                    <span class="me-2">Admin Utama</span>
                    <img src="{{ asset('images/admin-avatar.png') }}" alt="Profile" class="rounded-circle" width="40">
                </div>
            </header>

            <main class="container-fluid p-4">
                @yield('content')
            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
</body>
</html>