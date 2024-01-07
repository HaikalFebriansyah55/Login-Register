@extends("layouts.master")
@section('title', 'Register')
@section('content')

<div class="register row justify-content-center align-items-center" style="height: 100vh;">
  <div class="card col-lg-6 bg-dark">
    <div class="card mt-1 bg-dark border border-0">
      <div class="card-body bg-dark">
        <h1 class="h3 mb-3 fw-normal text-center judul">Form Registrasi</h1>
        
        <form action="/register" method="post">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
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
            <label for="email" class="form-label">Email</label>
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
          <small class="judul2">Sudah Punya Akun? <a href="/login">Login</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<style>
  /* Ganti warna ikon menjadi putih */
  .text-white {
    fill: currentColor;
  }

  body {
    position: relative;
    background: url('https://pbs.twimg.com/media/FmXPN1oXoAEJb6F.png:large') no-repeat center center fixed;
    background-size: cover;
  }

  body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
  }

  .register, .login {
    position: absolute;
    width: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>
