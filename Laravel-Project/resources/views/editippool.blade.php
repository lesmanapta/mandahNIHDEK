@extends('layout.master')
@section('content')
<title>MandahNet | Edit IP Pool</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pool<h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Edit Pool</li>
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
                            <form method="POST" action="{{ route('updateippool', ['id' => $pool]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="exampleNamaPool" class="col-sm-2 col-form-label">Nama Pool</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('pool_name') is-invalid @enderror" id="pool_name" name="pool_name" value="{{ old('pool_name',$pool->pool_name) }}">
                                            @error('pool_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleRentangIp" class="col-sm-2 col-form-label">Rentang IP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('range_ip') is-invalid @enderror" id="range_ip" name="range_ip" placeholder="ex. 192.168.88.1-192.168.88.1" value="{{ old('range_ip',$pool->range_ip) }}">
                                            @error('range_ip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="selectRouters" class="col-sm-2 col-form-label">Routers</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('routers') is-invalid @enderror" id="routers" name="routers">
                                                <option value="">Pilih Router</option>
                                                @foreach($routers as $router)
                                                <option value="{{ $router->id }}" @if(old('routers',$router->id)) selected @endif>{{ $router->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('routers')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/ippool" class="btn btn-secondary">Cancel</a>
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
