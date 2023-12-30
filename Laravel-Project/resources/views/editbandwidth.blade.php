<style>
   .edit-button {
     background-color: green;
     color: white;
     padding: 5px 10px;
     border: none;
     border-radius: 5px;
     cursor: pointer;
   }

   .hapus-button {
     background-color: red;
     color: white;
     padding: 5px 10px;
     border: none;
     border-radius: 5px;
     cursor: pointer;
   }
 </style>

 @extends('layout.master')
 @section('content')
 <title>MandahNet | Edit Bandwidth</title>

 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Edit Bandwidth</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                         <li class="breadcrumb-item active">Edit Bandwidth</li>
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
                         <form method="POST" action="{{ route('updatebandwidth', ['id' => $bandwidth]) }}">
                                @csrf
                                @method('PUT')
                                    <div class="form-group row">
                                        <label for="namabandwith" class="col-sm-2 col-form-label">Nama Bandwidth</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_bw" id="namabandwith" placeholder="Nama Bandwidth" value="{{ old('name_bw', $bandwidth->name_bw) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rateDownload" class="col-sm-2 col-form-label">Rate Download</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rateDownload" name="rate_down" value="{{ old('rate_down', $bandwidth->rate_down) }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="rate_down_unit">
                                                <option value="Kbps" {{ old('rate_down_unit', $bandwidth->rate_down_unit) === 'Kbps' ? 'selected' : ''}}>Kbps</option>
                                                <option value="Mbps" {{ old('rate_down_unit', $bandwidth->rate_down_unit) === 'Mbps' ? 'selected' : ''}}>Mbps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rateUpload" class="col-sm-2 col-form-label">Rate Upload</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rateUpload" name="rate_up" value="{{ old('rate_up', $bandwidth->rate_up) }}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="rate_up_unit">
                                                <option value="Kbps" {{ old('rate_down_unit', $bandwidth->rate_down_unit) === 'Kbps' ? 'selected' : ''}}>Kbps</option>
                                                <option value="Mbps" {{ old('rate_down_unit', $bandwidth->rate_down_unit) === 'Mbps' ? 'selected' : ''}}>Mbps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 offset-sm-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button href="bandwidth.index" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
