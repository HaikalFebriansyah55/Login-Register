@extends("admin.layouts.master")
@section('title', 'Add Publisher')
@section('content')
    <div class="col-lg">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Publisher Form</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/publishers/store">
                    @csrf
                    <div class="mb-3">
                        <label for="publisher_name" class="form-label">Publisher Name</label>
                        <input type="text" name="publisher_name" class="form-control @error('publisher_name') is-invalid @enderror" id="publisher_name" placeholder="Enter the game publisher_name">
                        @error('publisher_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter the game address">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="Enter the game contact">
                        @error('contact')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
