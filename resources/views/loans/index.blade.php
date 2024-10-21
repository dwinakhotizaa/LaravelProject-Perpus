@extends('layouts.template')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-black">Data Peminjaman Buku</h6>
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

            <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Peminjaman</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($loans->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada peminjaman buku saat ini.</td>
                            </tr>
                        @else
                            @foreach ($loans as $key => $loan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $loan->borrower_name }}</td>
                                    <td>{{ $loan->book ? $loan->book->judul : 'Tidak ada judul' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->borrowed_at)->format('d-m-Y') }}</td>
                                    <td>{{ $loan->return_at ? \Carbon\Carbon::parse($loan->return_at)->format('d-m-Y') : '-' }}</td>
                                    <td>
                                        <button type="button" onclick="window.location='{{ route('loans.show', $loan->id) }}'" class="btn btn-info">
                                            <i class="fas fa-info-circle"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
