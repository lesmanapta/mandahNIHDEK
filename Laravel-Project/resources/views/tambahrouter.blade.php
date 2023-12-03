@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kontak Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kontak Baru</li>
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
                                    <label for="examplestatus" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="enable" value="enable">
                                            <label class="form-check-label" for="enable">Enable</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="disable" value="disable">
                                            <label class="form-check-label" for="disable">Disable</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleNamaRouter" class="col-sm-2 col-form-label">Nama Router</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namarouter">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="exampleIpAdd" class="col-sm-2 col-form-label">IP Address</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="ipaddress" step="1" placeholder="192.168.88.1:8728">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Username">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="examplePasswordRouter" class="col-sm-2 col-form-label">Password Router</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="passwordrouter">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="exampleDeskripsiRouter" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                    <input type="textarea" class="form-control" id="deskripsirouter">
                                    </div>
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