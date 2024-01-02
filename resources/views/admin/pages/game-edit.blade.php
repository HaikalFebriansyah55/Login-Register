@extends("admin.layouts.master")
@section('title', 'Game Edit Form')
@section('content')
<div class="col-lg">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Game Form</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/dashboard/games/update/{{ $data->game_id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Use the PUT method for updating --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $data->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter the game title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    <input type="text" name="deskripsi" value="{{ $data->deskripsi }}" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Enter the game description">
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" value="{{ $data->price }}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter the game price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="release_date" class="form-label">Release Date</label>
                    <input type="date" name="release_date" value="{{ $data->release_date }}" class="form-control @error('release_date') is-invalid @enderror" id="release_date" placeholder="Enter the game release date">
                    @error('release_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform</label>
                    <input type="text" name="platform" value="{{ $data->platform }}" class="form-control @error('platform') is-invalid @enderror" id="platform" placeholder="Enter the game platform">
                    @error('platform')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Game Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
