@extends("admin.layouts.master")
@section('title', 'Edit User')
@section('content')
<div class="col-lg">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User Form</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/dashboard/publishers/update/{{ $data->publisher_id }}">
                @csrf
                @method('PUT') {{-- Use the PUT method for updating --}}
                <div class="mb-3">
                    <label for="publisher_name" class="form-label">Publisher Name</label>
                    <input type="text" name="publisher_name" value="{{ $data->publisher_name }}" class="form-control @error('publisher_name') is-invalid @enderror" id="publisher_name" placeholder="Enter your publisher_name">
                    @error('publisher_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" value="{{ $data->address }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Choose an address">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" value="{{ $data->contact }}" class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="Enter your contact">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
