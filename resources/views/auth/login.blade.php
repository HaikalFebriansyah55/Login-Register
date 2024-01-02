@extends("layouts.master")
@section('title', 'Login')
@section('content')

<div class="login row justify-content-center">
  <div class="col-md-6">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mt-5">
      <div class="card-body">
        <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
        
        <form action="/login" method="post" class="mx-auto">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>

        <div class="text-center mt-3">
          <small>Belum punya akun? <a href="/register">Registrasi</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
