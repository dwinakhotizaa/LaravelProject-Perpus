@extends('layouts.template')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Buku</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded shadow">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Buku</label>
            <input type="file" id="foto" name="foto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @if ($book->foto)
                <img src="{{ asset('storage/gambar_buku/' . $book->foto) }}" alt="{{ $book->judul }}" class="mt-2" style="max-width: 100px;">
            @endif
        </div>

        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ $book->judul }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ $book->penulis }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ $book->penerbit }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
    </form>
</div>
@endsection
    