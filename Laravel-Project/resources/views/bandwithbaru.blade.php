@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Paket Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Paket Baru</li>
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
                                    <label for="exampleNamaPaket" class="col-sm-2 col-form-label">Rate Download</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="konfirmasipassword">
                                    </div>
                                </div>                             
                                    <div class="col-sm-2">
                                        <select class="form-control">
                                            <option value="menit">Kbps</option>
                                            <option value="jam">Mbps</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                             
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="exampleNamaPaket" class="col-sm-2 col-form-label">Rate Upload</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="konfirmasipassword">
                                    </div>
                                </div>                             
                                    <div class="col-sm-2">
                                        <select class="form-control">
                                            <option value="menit">Kbps</option>
                                            <option value="jam">Mbps</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div>                   
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