<style>
  .edit-button {
    background-color: green;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Bandwidth</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Bandwidth</li>
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
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="/bandwithbaru" class="btn btn-success">Bandwidth Baru</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Bandwidth</th>
                                            <th>Rate Download</th>
                                            <th>Rate Upload</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($inipool as $pool)
                                            <tr>
                                                <td>{{ $pool->id }}</td>
                                                <td>{{ $pool->pool_name }}</td>
                                                <td>{{ $pool->range_ip }}</td>
                                                <td>{{ $pool->routers }}</td>
                                                <td>
                                                  <a href="{{ route('ippool.edit', $pool->id) }}" class="edit-button">Edit</a>
                                                  <a href="{{ route('deleteippool', $pool->id) }}" class="hapus-button">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
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
