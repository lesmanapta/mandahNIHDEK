@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kontak</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kontak</li>
                    </ol>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
{{-- <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updateKontak', ['id' => $kontak->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            -- Use PUT method for updating -->
                            <div class="card-body">
                              @method('PUT') <!  <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputNama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fullnameCustomer" id="fullnameCustomer" placeholder="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputemail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputNomorhp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                    <input type="integer" class="form-control" name="phonenumber" id="phonenumber" placeholder="nomor hp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="examplePassword" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleKonfirmasiPassword1" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="exampleKonfirmasiPassword" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputAlamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="address" id="address" placeholder="alamat lengkap"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/listKontak" class="btn btn-secondary">Cancel</a>
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
 --}}


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updateKontak', ['id' => $kontak->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('username', $kontak->username) }}" type="text" class="form-control" name="username" id="username" placeholder="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputNama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ old('fulnameCustomer', $kontak->fullnameCustomer) }}"name="fullnameCustomer" id="fullnameCustomer" placeholder="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputemail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('email', $kontak->email) }}" type="email" class="form-control" name="email" id="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputNomorhp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                    <input value="{{ old('phonenumber', $kontak->phonenumber) }}"type="integer" class="form-control" name="phonenumber" id="phonenumber" placeholder="nomor hp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="examplePassword" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleKonfirmasiPassword1" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="exampleKonfirmasiPassword" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputAlamat"  class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="address" id="address" placeholder="alamat lengkap">{{ old('address', $kontak->address) }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/listKontak" class="btn btn-secondary">Cancel</a>
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
