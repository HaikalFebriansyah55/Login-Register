@extends("layouts.master")
@section('title', 'Register')
@section('content')

<div class="register row justify-content-center">
  <div class="col-lg-6">
    <div class="card mt-5">
      <div class="card-body">
        <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
        
        <form action="/register" method="post">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Pengguna</label>
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama Pengguna" required value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>

        <div class="text-center mt-3">
          <small>Sudah Punya Akun? <a href="/login">Login</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
