@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/button.css">

<title>MandahNet | Paket PPPoE</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Paket PPPoE</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Paket PPPoE</li>
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

                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{ old('keyword', $keyword) }}">

                                        <div class="input-group-append">
                                            <button id="searchPaketPPPoE" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <a href="/pengaturanadmin" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <a href="/tambahpaketbaru" class="btn btn-success">Tambah Paket Baru</a>
                            </div>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama Paket</th>
                                        <th>Status</th>
                                        <th>Nama Bandwidth</th>
                                        <th>Harga</th>
                                        <th>Masa Aktif</th>
                                        <th>Nama Router</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->namapaket }}</td>
                                        <td>{{ $plan->status }}</td>
                                        <td>{{ $plan->namabandwith }}</td>
                                        <td>Rp. {{ number_format($plan->harga, 2) }}</td>
                                        <td>{{ $plan->masa_aktif.' '.$plan->masa_aktif_unit}}</td>
                                        <td>{{ $plan->nama_router }}</td>
                                        <td>
                                            <a href="{{ route('editPaketPPPoE', $plan->id) }}" class="edit-button">Edit</a>
                                            <a href="{{ route('deletePaketPPPoE', $plan->id) }}" class="hapus-button">Hapus</a>
                                            <!-- Add buttons for edit and delete here -->
                                        </td>
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
@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Script untuk menampilkan SweetAlert setelah berhasil mengedit admin
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
</script>
@endsection
