@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/button.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Kontak</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Kontak</li>
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
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group input-group-sm" style="width: 300px;">

                                    <form action="" class="form-inline" method="GET">
                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                        
                                        <div class="input-group-append">
                                            <button id="searchAdmin" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        {{-- <input type="reset" name= "Reset" value="Reset" href="/pengaturanadmin"> --}}
                                        <button style="margin: 3px" id="tombolSilang"  style="display: block;" type="submit" class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                     </form>
                                </div>
                                <a href="/tambahkontakbaru" class="btn btn-success">Tambah Kontak</a>
                            </div>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor Hp</th>
                                        <th>Tanggal Aktif</th>
                                        <th>isi Ulang Akun</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kontaks as $kontak)
                                        <tr>
                                            <td>{{ $kontak->username }}</td>
                                            <td>{{ $kontak->fullnameCustomer }}</td>
                                            <td>{{ $kontak->phonenumber }}</td>
                                            <td>{{ $kontak->created_at->format('d-m-Y') }}</td>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('editKontak', $kontak->id) }}" class="edit-button">Edit</a>
                                                <a href="{{ route('hapusKontak', $kontak->id) }}" class="hapus-button">Hapus</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Add your content here -->
</div>
@endsection
