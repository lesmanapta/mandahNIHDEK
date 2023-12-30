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
                             @foreach($pesans as $pesan)
                             <div class="card-body">
                                 <div class="callout callout-danger">
                                     <a href="{{ route('deletePesanMasuk', $pesan->id) }}" class="close-button"></a>
                                     <h5>{{ $pesan -> name . ' (' . $pesan -> email . ')'}}</h5>
                                     <p>{{ \Carbon\Carbon::parse($pesan->created_at)->diffForHumans() }}</p>
                                     <p>{{ $pesan -> message .'.' }}</p>
                                    </div>
                                </div>
                             @endforeach
                             <div class="float-right">
                                {{ $pesans -> links() }}
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

