@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/button.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan Admin</li>
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
                                <a href="/tambahadmin" class="btn btn-success">Tambah Admin</a>
                            </div>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis</th>
                                        <th>Terakhir Login</th>
                                        <th>Proses</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>admin</td>
                                        <td>Administrator</td>
                                        <td>Admin</td>
                                        <td></td>
                                        <td>
                                            <button href="" class="edit-button">Edit</button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>mantolesma</td>
                                        <td>Sumanto Lesmana Putra</td>
                                        <td>Admin</td>
                                        <td></td>
                                        <td>
                                            <button href="/tambahadmin" class="edit-button">Edit</button>
                                            <button href="#" class="hapus-button">Hapus</button>
                                        </td>

                                    </tr>
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