@extends('layouts.template')

@section('content')
<div class="container">

  <h2 class="my-4 text-center font-bold text-lg">Kelola Akun Pengguna</h2>

  <a href="{{ route('users.create') }}" class="btn btn-dark mb-3">
    <i class="fas fa-plus me-1"></i> Tambah Pengguna
  </a>

  <!-- Success Message -->
  @if (session('success'))
    <div class="alert alert-success">
      <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
    </div>
  @endif

  <table class="table table-striped table-bordered table-hover">
    <thead class="bg-dark text-white">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td class="d-flex justify-content-center">

          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark me-2">
            <i class="fas fa-edit"></i> Edit
          </a>

          <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i> Hapus
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-end my-3">
    {{ $users->links() }}
  </div>
</div>
@endsection
