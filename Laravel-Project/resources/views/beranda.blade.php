@extends('layout.master')
@section('content')
<title>MandahNet | Dashboard</title>
<link rel="stylesheet" href="css/button.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Beranda</li>
                        {{-- <li class="breadcrumb-item active">List Kontak</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ 'Rp. ' . $jumlahPendapatan }}</h3>

                <p>Pendapatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="laporanharian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $jumlahPelanggan }}</h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="pengajuanpasang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ 'Rp. ' . $jumlahPengeluaran }}</h3>

                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="/laporanpengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jumlahPengajuan }}</h3>

                <p>Pengajuan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="pengajuanpasang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Add your content here -->
</div>
@endsection
    