@extends('layout.master')
@section('content')
<title>MandahNet | laporan Pengeluaran</title>
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
                        <li class="breadcrumb-item active">laporan Pengeluaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    {{-- isi dibawah ini --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Form Pencarian -->
                            <form action="{{ route('laporanpengeluaran.index') }}" class="form-inline" method="GET">
                                <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button id="searchAdmin" type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- Tombol Tambah Pengeluaran -->
                            <a href="{{ route('tambahpengeluaran') }}" class="btn btn-success">Tambah Pengeluaran</a>
                        </div>

                        <!-- Tabel Laporan Pengeluaran -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pengeluarans as $pengeluaran)
                                        <tr>
                                            <td>{{ $pengeluaran->namakategori }}</td>
                                            <td>{{ $pengeluaran->namapengeluaran }}</td>
                                            <td>Rp. {{ number_format($pengeluaran->hargapengeluaran, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Tidak ada data pengeluaran.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.container-fluid -->
@endsection
  