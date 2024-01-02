@extends("admin.layouts.master")
@section('title', 'Edit User')
@section('content')
<div class="col-lg">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User Form</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/dashboard/users/update/{{ $data->id }}">
                @csrf
                @method('PUT') {{-- Use the PUT method for updating --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" value="{{ $data->username }}" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Choose a username">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" id="role">
                        <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="publisher" {{ $data->role === 'publisher' ? 'selected' : '' }}>Publisher</option>
                        <option value="user" {{ $data->role === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
