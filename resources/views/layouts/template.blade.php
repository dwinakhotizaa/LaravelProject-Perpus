<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Perpus APK')</title>

    <!-- Favicon -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/168/168091.png" type="image/png"> <!-- Gambar buku -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body class="bg-white">

    <nav class="bg-gray-800 text-white mt-4">
        <div class="container mx-auto flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="text-xl font-bold">Aplikasi Perpus</a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-gray-400' : 'hover:text-gray-400' }}">Dashboard</a>
                <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'text-gray-400' : 'hover:text-gray-400' }}">Kelola Akun</a>
                <a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.index') ? 'text-gray-400' : 'hover:text-gray-400' }}">Kelola Buku</a>
                <a href="{{ route('loans.index') }}" class="{{ request()->routeIs('loans.index') || request()->routeIs('loans.show') || request()->routeIs('loans.edit') ? 'text-gray-400' : 'hover:text-gray-400' }}">Kelola Peminjaman</a>
            </div>
            <button class="md:hidden text-gray-400">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
