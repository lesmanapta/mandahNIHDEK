@extends('layout.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

@section('content')
    <title>MandahNet | Laporan Keuangan</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- ... (Your existing code) ... -->

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
                                                <button id="searchAdmin" type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Tombol Tambah Pengeluaran dan Download Laporan -->
                                    <div class="col-md-6 text-right">
                                        <button id="exportToExcel" class="btn btn-primary">Export to Excel</button>
                                    </div>
                                </div>

                                <!-- Tabel Laporan Pengeluaran -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Paket</th>
                                                <th>Nama Bandwidth</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($plans) && count($plans) > 0)
                                                <?php $totalPendapatan = 0; ?>
                                                @foreach($plans as $plan)
                                                    <?php $totalPendapatan += $plan->harga; ?>
                                                    <tr>
                                                        <td>{{ $plan->namapaket }}</td>
                                                        <td>{{ $plan->namabandwith }}</td>
                                                        <td>Rp. {{ number_format($plan->harga, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">No data available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Total Pendapatan Form -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h4 class="float-left">Total Pendapatan:</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="float-right">Rp. <span id="totalPendapatan">{{ number_format($totalPendapatan, 2) }}</span></h4>
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
                    ['Nama Paket', 'Nama Bandwidth', 'Harga'],
                    @if(isset($plans) && count($plans) > 0)
                        <?php $totalPendapatan = 0; ?>
                        @foreach($plans as $plan)
                            <?php $totalPendapatan += $plan->harga; ?>
                            ['{{ $plan->namapaket }}', '{{ $plan->namabandwith }}', 'Rp. {{ number_format($plan->harga, 2) }}'],
                        @endforeach
                    @endif
                ];

                var wb = XLSX.utils.book_new();
                var ws = XLSX.utils.aoa_to_sheet(data);
                XLSX.utils.book_append_sheet(wb, ws, 'Laporan Keuangan');
                XLSX.writeFile(wb, 'laporan_keuangan.xlsx');
            }

            // Attach click event to the export button
            $('#exportToExcel').click(function () {
                exportToExcel();
            });
        });
    </script>

@endsection
