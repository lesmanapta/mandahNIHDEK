@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Keuangan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Laporan Keuangan</li>
                    </ol>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                            <div class="input-group date" id="tglMulai" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="hh/bb/yyyy" data-target="#tglMulai"/>
                                <div class="input-group-append" data-target="#tglMulai" data-toggle="datetimepicker" >
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Hingga</label>
                            <div class="col-sm-10">
                            <div class="input-group date" id="tglHingga" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="hh/bb/yyyy" data-target="#tglHingga"/>
                                <div class="input-group-append" data-target="#tglHingga" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                            <select class="form-control">
                                <option value="1">Semua Transaksi</option>
                                <option value="2">Hotspot</option>
                                <option value="3">PPPoE</option>
                            </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection