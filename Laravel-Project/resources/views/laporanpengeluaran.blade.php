@extends('layout.master')
<!-- Add the necessary AdminLTE CSS and JS files -->
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<link rel="stylesheet" href="css/button.css">
<title>MandahNet | Laporan Pengeluaran</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Pengeluaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Laporan Pengeluaran</li>
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
                            <div class="row mb-3">
                                <!-- Form Pencarian -->
                                <div class="col-md-6">
                                    <form action="{{ route('laporanpengeluaran.index') }}" class="form-inline" method="GET">
                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{ request('keyword') }}">
                                        <div class="input-group-append">
                                            <button id="searchLaporanPengeluaran" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        <a href="/laporanpengeluaran" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                            </a>
                                    </form>
                                </div>
                                <!-- Tombol Tambah Pengeluaran dan Download Laporan -->
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('tambahpengeluaran') }}" class="btn btn-success">Tambah Pengeluaran</a>
                                    <button id="exportToExcel" class="btn btn-primary">Export to Excel</button>
                                </div>
                            </div>

                            <!-- Tabel Laporan Pengeluaran -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengeluarans as $pengeluaran)
                                            <tr>
                                                <td>{{ $pengeluaran->namakategori }}</td>
                                                <td>{{ $pengeluaran->namapengeluaran }}</td>
                                                <td>Rp. {{ number_format($pengeluaran->hargapengeluaran, 2) }}</td>
                                                <td>
                                                  <a href="{{ route('deletelaporanpengeluaran', $pengeluaran->id) }}" class="hapus-button">Hapus</a>
                                              </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Tidak ada data pengeluaran.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Total Pengeluaran Form -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="float-left">Total Pengeluaran:</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="float-right">Rp. <span id="totalPengeluaran">{{ number_format($pengeluarans->sum('hargapengeluaran'), 2) }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.container-fluid -->

<script>
    $(document).ready(function () {
        // Function to export data to Excel
        function exportToExcel() {
            var data = [
                ['Kategori', 'Nama', 'Harga'],
                @forelse ($pengeluarans as $pengeluaran)
                    ['{{ $pengeluaran->namakategori }}', '{{ $pengeluaran->namapengeluaran }}', 'Rp. {{ number_format($pengeluaran->hargapengeluaran, 2) }}'],
                @empty
                    // No data
                @endforelse
            ];

            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.aoa_to_sheet(data);
            XLSX.utils.book_append_sheet(wb, ws, 'Laporan Pengeluaran');
            XLSX.writeFile(wb, 'laporan_pengeluaran.xlsx');
        }

        // Attach click event to the export button
        $('#exportToExcel').click(function () {
            exportToExcel();
        });
    });
</script>

@endsection
