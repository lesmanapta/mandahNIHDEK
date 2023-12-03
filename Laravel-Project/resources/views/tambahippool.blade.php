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
                                    <label for="exampleNamaRouter" class="col-sm-2 col-form-label">Nama Pool</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namarouter">
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="exampleIRentangIp" class="col-sm-2 col-form-label">Rentang IP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="rentangip" step="1" placeholder="ex. 192.168.88.1-192.168.88.1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRouters" class="col-sm-2 col-form-label">Routers</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namapaket1" name="namarouter">
                                            <option value="namarouter">Pilih Router</option>
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