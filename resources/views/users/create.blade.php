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

  <!-- Add User Form -->
  <form action="{{ route('users.store') }}" method="POST" class="card p-4 shadow">
    @csrf

    <!-- Nama Input -->
    <div class="form-group mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <!-- Email Input -->
    <div class="form-group mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <!-- Password Input -->
    <div class="form-group mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <!-- Role Input -->
    <div class="form-group mb-3">
      <label for="role" class="form-label">Role</label>
      <select class="form-control" id="role" name="role" required>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">
      <i class="fas fa-user-plus me-1"></i> Tambah Pengguna
    </button>
  </form>
</div>

@endsection
