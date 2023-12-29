@extends("layouts.master")
@section('title', 'Login')
@section('content')

<main class="py-4">
    <img src="https://giffiles.alphacoders.com/218/218301.gif" class="img-fluid" style="background-color: #040A11;" />
    <div class="container mt-4">
        <div class="row">
            <!-- First Carousel -->
            <div class="col-md-4">
                <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://placekitten.com/800/400" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/401" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/402" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Second Carousel -->
            <div class="col-md-4">
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://placekitten.com/800/400" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/401" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/402" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Third Carousel -->
            <div class="col-md-4">
                <div id="carousel3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://placekitten.com/800/403" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/404" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://placekitten.com/800/405" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
