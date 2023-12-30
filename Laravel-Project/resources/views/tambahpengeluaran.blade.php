@extends('layout.master')
@section('content')
<title>MandahNet | Tambah Pengeluaran</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pengeluaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Tambah Pengeluaran</li>
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
                            <form class="form-horizontal" method="POST" action="{{ route('tambahpengeluaran.store') }}">
                                @csrf <!-- Add CSRF token for security -->

                                <div class="card-body">
                                    <!-- Your form fields... -->
                                    <div class="form-group row">
                                        <label for="selectkategori" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="kategoripengeluaran" name="namakategori">
                                                <option value="namakategori">Pilih Kategori</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <small id="kategoriHelp" class="form-text text-muted">Pilih dari opsi di atas atau tambahkan kategori baru.</small>
                                            <div class="input-group mt-2">
                                                <input type="text" class="form-control" id="newCategory" name="newCategory" placeholder="Kategori Baru">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="addNewCategory()">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="examplenamaPengeluaran" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="namapengeluaran" name="namapengeluaran" placeholder="cth. router">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleHarga" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="hargapengeluaran" name="hargapengeluaran" placeholder="harga">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="#" class="btn btn-secondary">Cancel</a>
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

<script>
   function addNewCategory() {
       var newCategoryValue = document.getElementById('newCategory').value;
       if (newCategoryValue.trim() !== "") {
           var selectElement = document.getElementById('kategoripengeluaran');
           var option = document.createElement("option");
           option.text = newCategoryValue;
           option.value = newCategoryValue;
           selectElement.add(option);
           document.getElementById('newCategory').value = "";
       }
   }
</script>

@endsection