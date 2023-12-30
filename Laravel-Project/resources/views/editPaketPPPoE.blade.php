@extends('layout.master')
@section('content')
<title>MandahNet | Edit Paket</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Paket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Tambah Paket</li>
                    </ol>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updatePaketPPPoE', ['id' => $plans->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control" required>
                                            <option value="Enable" {{ old('status', $plans->status) === 'Enable' ? 'selected' : '' }}>Enable</option>
                                            <option value="Disable" {{ old('status', $plans->status) === 'Disable' ? 'selected' : '' }}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namapaket" class="col-sm-2 col-form-label">Nama Paket</label>
                                    <div class="col-sm-10">
                                        <input value="{{ old('namapaket', $plans->namapaket) }}" type="text" class="form-control" name="namapaket" id="namapaket" placeholder="Nama Paket">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namabandwidth" class="col-sm-2 col-form-label">Nama Bandwidth</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namabandwidth" name="namabandwith">
                                            <option value="">Pilih Nama Bandwidth...</option>
                                            @foreach($bandwidths as $bandwidth)
                                                <option value="{{ $bandwidth }}" {{ old('namabandwith', $plans->namabandwith) === $bandwidth ? 'selected' : '' }}>{{ $bandwidth }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input value="{{ old('harga', $plans->harga) }}" type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="masa_aktif" class="col-sm-2 col-form-label">Masa Aktif</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="masa_aktif" name="masa_aktif" step="1" value="{{ old('masa_aktif', $plans->masa_aktif) }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="masa_aktif_unit">
                                            <option value="menit" {{ old('masa_aktif_unit', $plans->masa_aktif_unit) === 'menit' ? 'selected' : '' }}>Menit</option>
                                            <option value="jam" {{ old('masa_aktif_unit', $plans->masa_aktif_unit) === 'jam' ? 'selected' : '' }}>Jam</option>
                                            <option value="hari" {{ old('masa_aktif_unit', $plans->masa_aktif_unit) === 'hari' ? 'selected' : '' }}>Hari</option>
                                            <option value="bulan" {{ old('masa_aktif_unit', $plans->masa_aktif_unit) === 'bulan' ? 'selected' : '' }}>Bulan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namarouters" class="col-sm-2 col-form-label">Nama Routers</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namarouters" name="nama_router">
                                            <option value="">Pilih Router</option>
                                            @foreach($routers as $router)
                                                <option value="{{ $router }}" {{ old('nama_router', $plans->nama_router) === $router ? 'selected' : '' }}>{{ $router }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ippool" class="col-sm-2 col-form-label">IP Pool</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="ippool" name="ippol">
                                            <option value="">Pilih Pool</option>
                                            @foreach($pools as $pool)
                                                <option value="{{ $pool }}" {{ old('ippol', $plans->ippol) === $pool ? 'selected' : '' }}>{{ $pool }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/paketpppoe" class="btn btn-secondary">Cancel</a>
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