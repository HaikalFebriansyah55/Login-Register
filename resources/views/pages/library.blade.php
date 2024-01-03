@extends('layouts.master')

@section('title', 'Game Library')

@section('content')
<style>
    .library {
      padding-top:100px;
      padding-bottom: 600px;
    }

    .library-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .library-header h2 {
        font-size: 36px;
        font-weight: bold;
        color: white; /* Adjust text color as needed */
    }

    .game-thumbnail {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .game-thumbnail img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .game-thumbnail:hover {
        transform: scale(1.1);
    }
</style>

<div class="container library">
    <div class="library-header">
        <h2>Your Game Library</h2>
    </div>
    <div class="row">
        @foreach ($userTransactions as $transaction)
            <div class="col-md-3 mb-4">
                <div class="game-thumbnail">
                    <img src="{{ asset('img/' . $transaction->game->image) }}" alt="{{ $transaction->game->title }}" class="img-fluid rounded" data-toggle="tooltip" title="{{ $transaction->game->title }} by {{ $transaction->game->publisher }}">
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    // Initialize Tooltip
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
