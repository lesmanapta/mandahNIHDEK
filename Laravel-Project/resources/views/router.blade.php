<link rel="stylesheet" href="css/button.css">
@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Routers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Routers</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="router.store" class="btn btn-success">Router Baru</a>
                            </div>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama Router</th>
                                        <th>IP Address</th>
                                        <th>Username</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($routers as $router)
                                    <tr>
                                        <td>{{ $router->name}}</td>
                                        <td>{{ $router->ip_address }}</td>
                                        <td>{{ $router->username }}</td>
                                        <td>{{ $router->deskripsi}}</td>
                                        <td>{{ $router->status }}</td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Add your content here -->
</div>
@endsection
