@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Administrator</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Administrator</li>
                    </ol>
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
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="exampleusername" class="col-sm-2 col-form-label">username</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="konfirmasipassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examplenamalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="konfirmasipassword" step="1">
                                    </div>
                                </div>                             
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-2 col-form-label">Posisi User</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namapaket1" name="namaPaket">
                                            <option value="paket1">Pilih Posisi User...</option>
                                            <option value="paket2">Full Administrator</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" step="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleKonfirmasiPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" step="2">
                                    </div>
                                </div>                                              
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="#" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
                    <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


@endsection