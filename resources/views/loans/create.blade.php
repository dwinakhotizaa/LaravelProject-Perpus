@extends('layouts.template')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-black">Tambah Peminjaman Buku</h6>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Pilih Buku</label>
                <select class="form-select" id="book_id" name="book_id" required>
                    <option value="" disabled selected>Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrower_name" class="form-label">Nama Peminjam:</label>
                <input type="text" name="borrower_name" class="form-control" placeholder="Masukkan nama peminjam" required>
            </div>
            <div class="mb-3">
                <label for="borrowed_at" class="form-label">Tanggal Peminjaman:</label>
                <input type="date" name="borrowed_at" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Pinjam</button>
                <a href="{{ route('loans.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
