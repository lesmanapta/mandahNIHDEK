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
                                    <label for="exampleNamaPaket" class="col-sm-2 col-form-label">Nama Paket</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="konfirmasipassword">
                                    </div>
                                </div>                             
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-2 col-form-label">Nama Bandwith</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namapaket1" name="namaPaket">
                                            <option value="paket1">Pilih Nama Bandwith...</option>
                                            <option value="paket2">5 MB</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleHarga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="konfirmasipassword" step="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleMasaAktif" class="col-sm-2 col-form-label">Masa Aktif</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="masaaktif" step="1">
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control">
                                            <option value="menit">Menit</option>
                                            <option value="jam">Jam</option>
                                            <option value="hari">Hari</option>
                                            <option value="bulan">Bulan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRouters" class="col-sm-2 col-form-label">Nama Routers</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namapaket1" name="namaPaket">
                                            <option value="paket1">Pilih Router</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>  
                                </div>    
                                <div class="form-group row">
                                    <label for="selectippool" class="col-sm-2 col-form-label">IP Pool</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namapaket1" name="namaPaket">
                                            <option value="paket1">Pilih Pool</option>
                                            <!-- Add more options as needed -->
                                        </select>
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