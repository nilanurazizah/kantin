<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.include.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Topbar -->
        @include('admin.include.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                <!-- konten -->
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <strong>EDIT DATA</strong> 
                        </div>
                        <div class="card-body">
                            <br/>
                            
                            <form method="post" action="/update/{{ $makanan->id_makanan }}">
        
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
        
                            <input type="text" class="form-control" name="id_makanan" value="{{ $makanan->id_makanan}}" readonly>
                                <div class="form-group">
                                    <label for="">Nama Makanan </label>
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama')}}
                                        </div>
                                    @endif
                                    <input type="text" name="nama" class="form-control" value="{{ $makanan->nama }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Harga Makanan </label>
                                        @if($errors->has('harga'))
    
                                                <div class="text-danger">
                                                {{ $errors->first('harga')}}
                                            </div>
                                        @endif
                                        <input type="text" name="harga" class="form-control" value="{{ $makanan->harga }}">
                                    </div>

                                    <div class="from-group">
                                        <label for="">Status</label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" type="text" value="{{ $makanan->status }}">
                                            <option value="{{ old('status')}}" >{{ old('status')}}</option>
                                                <option value="ready">Ready</option>
                                                <option value="soldout">Sold Out</option>
                                            </select>
                                                @error('status')
                                                    <div class="text-danger">{{ $message}}</div>
                                                @enderror
                                            </div>
        
                                <div class="form-group">
                                <label for="">Gambar</label>
                                    @if($errors->has('gambar'))
                                        <div class="text-danger">
                                            {{ $errors->first('gambar')}}
                                        </div>
                                    @endif
                                    <input type="text" name="gambar" class="form-control" value="{{ $makanan->gambar }}">
                                </div>

                                {{-- <div class="form-group">
                                <label for="">Isi cuplikan</label>
                                    @if($errors->has('cuplikan'))
                                        <div class="text-danger">
                                            {{ $errors->first('cuplikan')}}
                                        </div>
                                    @endif
                                    <input type="text" name="cuplikan" class="form-control" value="{{ $makanan->cuplikan }}">
                                </div>

                                
                                <div class="form-group">
                                <label for="">Deskripsi Makanan</label>
                                    @if($errors->has('des'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi')}}
                                        </div>
                                    @endif
                                    <textarea name="deskripsi" class="form-control">{{ $makanan->deskripsi }} </textarea>
                                </div> --}}

                                

                                


                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                    <a href="/makan" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@include('admin.include.footer')
                
              


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dash/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('dash/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('dash/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('dash/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>