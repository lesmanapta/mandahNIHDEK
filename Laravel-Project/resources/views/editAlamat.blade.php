@extends('layout.master')
@section('content')
<title>MandahNet | Edit Alamat</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">edit Alamat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">edit Alamat</li>
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
                            <form method="post" action="{{ route('updateAlamat', $alamat->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jalan" class="col-sm-2 col-form-label">Jalan</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Jalan Palem Aren No. 10" type="text" class="form-control" name="jalan" value="{{ old('jalan', $alamat->jalan) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Kelapa Dua" type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan', $alamat->kelurahan) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Bencongan Indah" type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan', $alamat->kecamatan) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Kota/Kabupaten Tangerang" class="form-control" name="kota" value="{{ old('kota', $alamat->kota) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="provinsi" class="col-sm-2 col-form-label">provinsi</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Banten" type="text" class="form-control" name="provinsi" value="{{ old('provinsi', $alamat->provinsi) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                                        <div class="col-sm-10">
                                            <input placeholder="10101" type="text" class="form-control" name="kode_pos" value="{{ old('kode_pos', $alamat->kode_pos) }}" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/dashboard" class="btn btn-secondary">Cancel</a>
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
