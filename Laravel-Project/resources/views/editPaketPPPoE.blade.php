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
                        <form action="{{ route('updatepaket', ['id' => $plans->id]) }}" method="post" class="form-horizontal">
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
                                    <label for="nama paket" class="col-sm-2 col-form-label">Nama Paket</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('namapaket', $plans->namapaket) }}" type="text" class="form-control" name="name" id="name" placeholder="nama paket">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-2 col-form-label">Nama Bandwith</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="namabandwidth" name="namabandwith">
                                            <option value="{{ old('namabandwith', $plans->namabandwith) }}">Pilih Nama Bandwith...</option>
                                            @foreach($bandwidths as $bandwidth)
                                                <option value="{{ $bandwidth }}">{{ $bandwidth }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('harga', $plans->harga) }}" type="text" class="form-control" name="harga" id="harga" placeholder="harga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleHarga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="harga" name="harga" step="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleMasaAktif" class="col-sm-2 col-form-label">Masa Aktif</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="masa_aktif" name="masa_aktif" step="1" value="{{ old('masa)aktif', $plans->masa_aktif) }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="masa_aktif_unit">
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
                                        <select class="form-control" id="namarouters" name="nama_router">
                                            <option value="{{ old('nama_router', $plans->nama_router) }}">Pilih Router</option>
                                            @foreach($routers as $router)
                                                <option value="{{ $router }}">{{ $router }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="selectippool" class="col-sm-2 col-form-label">IP Pool</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="ippool" name="ippol">
                                            <option value="{{ old('ippol', $plans->ippol) }}">Pilih Pool</option> 
                                            value="{{ old('ippol', $plans->ippol) }}
                                            @foreach($pools as $pool)
                                                <option value="{{ $pool }}">{{ $pool }}</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                </div>     
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/router" class="btn btn-secondary">Cancel</a>
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
