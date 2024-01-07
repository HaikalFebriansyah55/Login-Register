@extends("admin.layouts.master")
@section('title', 'Games Control')
@section('content')

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Games Total</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGames }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Games Data Table</h6>
        </div>
        @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}

        </div>
    @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>price</th>
                            <th>Release Date</th>
                            <th>Platform</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $datas)
                            <tr>
                                <td>{{ $datas->title }}</td>
                                <td>{{ $datas->deskripsi }}</td>
                                <td>{{ $datas->price }}</td>
                                <td>{{ $datas->release_date }}</td>
                                <td>{{ $datas->platform }}</td>
                                <td><img src="{{asset('img/'.$datas->image)}}" alt="img" class="img-fluid w-25 h-25 rounded"></td>
                                <td>
                                    <a type="button" class="btn btn-info btn-circle" href="/dashboard/games/edit/{{ $datas->game_id }}"><i
                                        class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-circle btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data game {{ $datas->title}}')"
                                    href="/dashboard/games/{{ $datas->game_id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection