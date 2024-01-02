@extends("admin.layouts.master")
@section('title', 'Publishers Control')
@section('content')

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Publishers Total</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPublishers }}</div>
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
            <h6 class="m-0 font-weight-bold text-primary">Users Data Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Publisher Name</th>
                            <th>Address</th>
                            <th>contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $datas)
                            <tr>
                                <td>{{ $datas->publisher_name }}</td>
                                <td>{{ $datas->address }}</td>
                                <td>{{ $datas->contact }}</td>
                                <td>
                                    <a type="button" class="btn btn-info btn-circle" href="/dashboard/publishers/edit/{{ $datas->publisher_id }}"><i
                                        class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-circle btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $datas->publisher_id}}')"
                                    href="/dashboard/publishers/{{ $datas->publisher_id }}"><i class="fa fa-trash"></i></a>
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