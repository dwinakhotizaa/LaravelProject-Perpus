@extends('layouts.template')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Kelola Buku</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 mb-4 inline-block shadow-lg transition duration-300">
        <i class="fas fa-plus mr-2"></i> Tambah Buku
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Foto</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Judul</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Penulis</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Penerbit</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <img src="{{ asset('storage/' . $book->foto) }}" alt="{{ $book->judul }}" class="max-w-xs rounded-lg shadow-sm">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $book->judul }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $book->penulis }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $book->penerbit }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 shadow transition duration-300 inline-flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 shadow transition duration-300 inline-flex items-center">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($books->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center border border-gray-300 px-4 py-2">Tidak ada buku yang tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
