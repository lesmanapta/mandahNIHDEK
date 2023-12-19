@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Bandwidth Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Bandwidth Baru</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <form method="POST" action="{{ route('your.route.name') }}">
                                @csrf --}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="bandwith" class="col-sm-2 col-form-label">Nama Bandwidth</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="namabandwith" id="namabandwith" placeholder="nama bandwith">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rateDownload" class="col-sm-2 col-form-label">Rate Download</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rateDownload" name="rateDownload">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="downloadUnit">
                                                <option value="Kbps">Kbps</option>
                                                <option value="Mbps">Mbps</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="rateUpload" class="col-sm-2 col-form-label">Rate Upload</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rateUpload" name="rateUpload">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="uploadUnit">
                                                <option value="Kbps">Kbps</option>
                                                <option value="Mbps">Mbps</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10 offset-sm-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
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
</div>
@endsection
