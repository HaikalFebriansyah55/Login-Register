@extends("layouts.master")
@section('title', 'Home')
@section('content')
<style>
    .banner-img {
        position: relative;
        transition: transform 0.3s ease-in-out;
        object-fit: cover;
        height: 500px;
    }

    .banner-img:hover {
        transform: scale(1.1);
    }

    .game-container {
        display: flex;
        flex-wrap: wrap; /* Allow flex items to wrap to the next line */
        justify-content: space-around;
        margin-top: 20px;
    }

    .game-card {
        position: relative;
        width: 30%; /* Set to 30% to allow three items in a row */
        text-align: center;
        cursor: pointer;
        overflow: hidden;
        margin-bottom: 20px; /* Add some bottom margin for spacing between rows */
    }

    .game-card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 8px;
        object-fit: cover;
    }

    .game-info {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        opacity: 0;
        transition: bottom 0.3s ease-in-out, opacity 0.3s ease-in-out;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px;
        border-radius: 8px;
        color: #fff;
        text-align: center;
    }

    .game-card:hover .game-info {
        bottom: 0;
        opacity: 1;
    }
    
</style>

<main class="py-4">
    <img src="https://giffiles.alphacoders.com/218/218301.gif" class="img-fluid" style="background-color: #040A11;" />
    <div class="container mt-4">
        <div class="row">
            @php
                $shuffledData = $data->shuffle();
                $randomThree = $shuffledData->take(3);
            @endphp
        
            @foreach ($randomThree as $datas)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('gameDetail', ['id' => $datas->game_id]) }}">
                        <img src="{{ asset('img/' . $datas->image) }}" class="img-fluid banner-img" alt="Image {{ $loop->iteration }}" >
                    </a>
                </div>
            @endforeach
        
            <a href="/gamedetail/3">
                <img src="{{ asset('https://cdn.akamai.steamstatic.com/steam/apps/1194810/extras/AM4186_MYM_Steam_Store_Page_GIFs_2-create-destroy_EN_UNCOMPRESSED.gif?t=1701198702') }}" alt="meetymaker"  style="width: 100%; height: 200px;">
            </a>
        </div>
        

        <!-- Game Etalase -->
        <div class="game-container">
            @foreach ($data->chunk(3) as $chunk)
                <div class="row justify-content-center"> <!-- Use justify-content-center to center the game cards horizontally -->
                    @foreach ($chunk as $g)
                        <div class="game-card">
                            <a href="{{ route('gameDetail', ['id' => $g->game_id]) }}">
                                <img src="{{ asset('img/' . $g->image) }}" alt="Game Image">
                            </a>
                            <div class="game-info">
                                <h5>{{ $g->title }}</h5>
                                <p>${{ $g->price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        
    </div>
</main>

@endsection
