@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Admin</li>
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
                        <form method="post" action="{{ route('updateadmin', $admin->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="examplenamalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fullname" value="{{ old('fullname', $admin->fullname) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-2 col-form-label">Posisi User</label>
                                    <div class="col-sm-10">
<<<<<<< HEAD
                                        <select name="user_type"  class="form-control" required>
                                            <option value="Super Admin" {{ old('user_type', $admin->user_type) == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="Admin" {{ old('user_type', $admin->user_type) == 'Admin' ? 'selected' : '' }}>Admin</option>
=======
                                        <select class="form-control" id="namapaket1" name="user_type">
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                            <!-- Add more options as needeed -->
>>>>>>> 056c67725b4df95b5d138e9786ec34c9fec4796a
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleKonfirmasiPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/pengaturanadmin" class="btn btn-secondary">Cancel</a>
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

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 056c67725b4df95b5d138e9786ec34c9fec4796a
