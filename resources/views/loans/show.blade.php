@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Peminjaman Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('loans.index') }}">Peminjaman</a></li>
                    <li class="breadcrumb-item active">Detail Peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 20%" class="text-center">Field</th>
                                    <th style="width: 80%" class="text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><strong>Nama Peminjam</strong></td>
                                    <td class="text-center">{{ $loan->borrower_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><strong>Buku</strong></td>
                                    <td class="text-center">{{ $loan->book ? $loan->book->judul : 'Tidak ada buku' }}</td>
                                    <!-- Pastikan kita menggunakan 'judul' sesuai dengan nama field di model Book -->
                                </tr>
                                <tr>
                                    <td class="text-center"><strong>Tanggal Peminjaman</strong></td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($loan->borrowed_at)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><strong>Tanggal Pengembalian</strong></td>
                                    <td class="text-center">{{ $loan->return_at ? \Carbon\Carbon::parse($loan->return_at)->format('d-m-Y') : 'Belum Dikembalikan' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('loans.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <a href="{{ route('loans.print', $loan->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Cetak PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
