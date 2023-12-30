@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/button.css">

<title>MandahNet | Pengajuan Pasang</title>

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
                        <li class="breadcrumb-item"><a href="#">Pengajuan Pasang</a></li>
                        <li class="breadcrumb-item active">Pengajuan Pasang</li>
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
                            <form>
                              <style>
                                 .callout {
                                     min-height: 100px; /* Sesuaikan tinggi yang diinginkan */
                                 }
                             
                                 .callout h5 {
                                     font-size: 1.25rem;
                                     margin-bottom: 0;
                                 }
                             </style>
                             
                             <div class="table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Paket</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                            <th>Proses</th>

    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paket as $pengajuan)
                                            <tr>
                                                <td>{{ $pengajuan->nama }}</td>
                                                <td>{{ $pengajuan->jenis_paket }}</td>
                                                <td>{{ $pengajuan->email }}</td>
                                                <td>{{ $pengajuan->nomor_hp }}</td>
                                                <td>{{ $pengajuan->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('deletePengajuan', $pengajuan->id) }}" class="hapus-button">Hapus</a>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $paket -> links() }}
                                </div>
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
