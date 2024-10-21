@extends('layouts.template')

@section('content')

<div class="container my-5">
    <!-- Title -->
    <h2 class="text-center mb-4">Tambah Pengguna Baru</h2>

    <!-- Success Message -->
    @if (session('success'))
      <div class="alert alert-success">
          <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
      </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    
    <!-- Edit User Form -->
    <div class="card p-4">
        <h2 class="mb-4">Edit Pengguna</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Nama Input -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <!-- Email Input -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <!-- Password Input -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengganti)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-secondary mt-3">
                <i class="fas fa-save me-1"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>

@endsection
