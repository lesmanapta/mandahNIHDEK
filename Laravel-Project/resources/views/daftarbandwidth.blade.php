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
  <title>MandahNet | Daftar Bandwidth</title>

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
                          <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                          <li class="breadcrumb-item active">Daftar Bandwidth</li>
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
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                  <div class="input-group input-group-sm" style="width: 300px;">
                                    <form action="" class="form-inline" method="GET">

                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="">

                                        <div class="input-group-append">
                                            <button id="searchAdmin" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        {{-- <input type="reset" name= "Reset" value="Reset" href="/pengaturanadmin"> --}}
                                    </form>
                                    <a href="/daftarbandwidth" style="margin: 3px" id="tombolSilang"  style="display: block;" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    </a>
                                  </div>
                                  <a href="{{ route('bandwidthbaru') }}" class="btn btn-success">Bandwidth Baru</a>
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
                                          @foreach ($bandwidths as $bandwidth)
                                              <tr>
                                                  <td>{{ $bandwidth->name_bw }}</td>
                                                  <td>{{ $bandwidth->rate_down }} {{ $bandwidth->rate_down_unit }}</td>
                                                  <td>{{ $bandwidth->rate_up }} {{ $bandwidth->rate_up_unit }}</td>
                                                  <td>
                                                    <a href="{{ route('editbandwidth', $bandwidth->id) }}" class="edit-button">Edit</a>
                                                    <a href="{{ route('deletebandwidth', $bandwidth->id) }}" class="hapus-button">Hapus</a>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                                    <div class="float-right">
                                        {{ $bandwidths -> links() }}
                                    </div>
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
