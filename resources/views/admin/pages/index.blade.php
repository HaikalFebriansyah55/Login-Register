@extends("admin.layouts.master")
@section('title', 'Dashboard')
@section('content')

<div class="container mt-5">

    <!-- Grafik Statistik Data Game -->
    <div class="card mb-4">
        <div class="card-header">
            Statistik Data Game
        </div>
        <div class="card-body">
            <canvas id="gameChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            Urutan Game Pembelian
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Game</th>
                        <th>Jumlah Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gameTransactions as $gameTransaction)
                        <tr>
                            <td>{{ $gameTransaction->game->title }}</td>
                            <td>{{ $gameTransaction->total_transactions }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<!-- Script untuk inisialisasi grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Menggunakan data yang diteruskan dari controller
    var gameData = @json($gameChart);

    // Inisialisasi grafik
    var gameChartCanvas = document.getElementById('gameChart').getContext('2d');

    new Chart(gameChartCanvas, {
        type: 'bar',
        data: gameData,
    });
</script>
@endsection
