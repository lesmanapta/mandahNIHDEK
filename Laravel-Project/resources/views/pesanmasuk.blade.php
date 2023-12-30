@extends('layout.master')
@section('content')
<title>MandahNet | Pesan Masuk</title>
<style>
   .close-button {
      position: absolute;
      width: 30px;
      height: 30px;
      background-color: #ffffff;
      border: 1px solid #ccc;
      border-radius: 50%;
      cursor: pointer;
      right: 50px;
   }

   .close-button::before,
   .close-button::after {
     content: '';
     position: absolute;
     width: 2px;
     height: 15px;
     background-color: #333;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
   }

   .close-button::before {
     transform: translate(-50%, -50%) rotate(45deg);
   }

   .close-button::after {
     transform: translate(-50%, -50%) rotate(-45deg);
   }
 </style>
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
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Edit Pool</li>
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
                             
                             <div class="card-body">
                                 <div class="callout callout-danger">
                                    <div class="close-button"></div>
                                     <h5>I am a danger callout!</h5>
                                     <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                 </div>
                                 <div class="callout callout-info">
                                     <h5>I am an info callout!</h5>
                                     <p>Follow the steps to continue to payment.</p>
                                 </div>
                                 <div class="callout callout-warning">
                                     <h5>I am a warning callout!</h5>
                                     <p>This is a yellow callout.</p>
                                 </div>
                                 <div class="callout callout-success">
                                     <h5>I am a success callout!</h5>
                                     <p>This is a green callout.</p>
                                 </div>
                                 <div class="callout callout-success">
                                    <h5>I am a success callout!</h5>
                                    <p>This is a green callout.</p>
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

