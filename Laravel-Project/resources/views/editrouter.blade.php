@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit router</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Router</li>
                    </ol>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updaterouter', ['id' => $router->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control" required>
                                            <option value="Enable" {{ old('status', $router->status) === 'Enable' ? 'selected' : '' }}>Enable</option>
                                            <option value="Disable" {{ old('status', $router->status) === 'Disable' ? 'selected' : '' }}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Router</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('name', $router->name) }}" type="text" class="form-control" name="name" id="name" placeholder="nama router">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputemail" class="col-sm-2 col-form-label">IP Address</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('ip_address', $router->ip_address) }}" type="text" class="form-control" name="ip_address" id="ip_address" placeholder="IP Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ old('username', $router->username) }}"name="username" id="username" placeholder="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Password Router</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="examplePassword" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputDeskripsi"  class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi">{{ old('deskripsi', $router->deskripsi) }}</textarea>
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
