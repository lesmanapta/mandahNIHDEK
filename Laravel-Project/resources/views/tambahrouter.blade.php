@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Router Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Router</li>
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
                        <form action="{{ route('router.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="statusRouter" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="statusRouter" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleNamaRouter" class="col-sm-2 col-form-label">Nama Router</label>
                                    <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="namarouter" placeholder="nama router">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="exampleIpAdd" class="col-sm-2 col-form-label">IP Address</label>
                                    <div class="col-sm-10">
                                        <input name="ip_address" type="string" class="form-control" id="ipaddress" step="1" placeholder="192.168.88.1:8728">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input name="username" type="text" class="form-control" id="Username" placeholder="username">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="examplePasswordRouter" class="col-sm-2 col-form-label">Password Router</label>
                                    <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="passwordrouter" placeholder="password">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="exampleDeskripsiRouter" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi"></textarea>
                                    </div>
                                </div>                                                                           
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="router" class="btn btn-secondary">Cancel</a>
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