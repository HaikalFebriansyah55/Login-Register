@extends("admin.layouts.master")
@section('title', 'Users Control')
@section('content')

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Users Total</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg">
    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
            Users Data Table
        </div>
        <div class="card-body">
            <p>This section provides an interface to manage user data. You can perform various operations on users using the options below:</p>
            
            <ul>
                <li><strong>Create:</strong> Add a new user to the system by filling out the creation form.</li>
                <li><strong>Read:</strong> View the list of existing users along with their details.</li>
                <li><strong>Update:</strong> Modify the information of a specific user through the edit form.</li>
                <li><strong>Delete:</strong> Remove a user from the system permanently.</li>
            </ul>

            <p>Use the navigation menu to explore different CRUD functionalities and manage user data efficiently.</p>
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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $datas)
                            <tr>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->username }}</td>
                                <td>{{ $datas->email }}</td>
                                <td>{{ $datas->password }}</td>
                                <td>{{ $datas->role }}</td>
                                <td>
                                    <a type="button" class="btn btn-info btn-circle" href="/dashboard/users/edit/{{ $datas->id }}"><i
                                        class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-circle btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $datas->id }}')"
                                    href="/dashboard/users/{{ $datas->id }}"><i class="fa fa-trash"></i></a>
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