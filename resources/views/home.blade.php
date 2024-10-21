@extends('layouts.template')

@section('content')
<div class="container mx-auto py-6">
    @if (Session::get('failed'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ Session::get('failed') }}
        </div>
    @endif

    @if (Session::get('login'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
            {{ Session::get('login') }}
        </div>
    @endif

    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Aplikasi Perpustakaan!</h1>
    <p class="text-lg mb-6">Aplikasi ini digunakan untuk mengelola data buku dan pengguna di perpustakaan.</p>
    <p class="mb-4">Digunakan untuk memudahkan pengelolaan koleksi buku, peminjaman, dan pengembalian.</p>
    <a class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300" href="{{ route('books.index') }}">
        Mulai Sekarang
    </a>
</div>

<div class="container mx-auto py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Fitur Utama</h2>
            <ul class="list-disc pl-5">
                <li>Pengelolaan Data Buku</li>
                <li>Peminjaman dan Pengembalian Buku</li>
                <li>Manajemen Pengguna Perpustakaan</li>
            </ul>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Kontak Kami</h2>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di:</p>
            <p>Email: <a href="mailto:support@perpustakaan.com" class="text-blue-500">support@perpustakaan.com</a></p>
            <p>Telepon: <span class="text-blue-500">123-456-7890</span></p>
        </div>
    </div>
</div>
@endsection
