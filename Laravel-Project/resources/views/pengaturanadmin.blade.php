@extends('layout.master')
@section('content')
<link rel="stylesheet" href="css/button.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan Admin</li>
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
                                            <button id="searchAdmin" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        {{-- <input type="reset" name= "Reset" value="Reset" href="/pengaturanadmin"> --}}
                                    </form>
                                    <a href="/pengaturanadmin" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <div class="float-sm-right">
                                    <a href="tambahadmin" class="btn btn-success">Tambah Admin</a>
                                </div>
                            </div>

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis</th>
                                        <th>Terakhir Login</th>
                                        <th>Proses</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->user_type }}</td>
                                            <td>{{ $user->last_login }}</td>
                                            <td>
                                                <a href="{{ route('editadmin', $user->id) }}" class="edit-button">Edit</a>
                                                <a href="{{ route('deleteadmin', $user->id) }}" class="hapus-button">Hapus</a>
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
