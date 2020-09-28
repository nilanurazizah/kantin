<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>PDF Makanan</h4>
		<h6><a target="_blank" href=""></a></h5>
	</center>

	<div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Makanan</th>
                  <th>Harga</th>
                  <th>Stok Makanan</th>
                  <th>Gambar</th>
                  {{-- <th>Action</th> --}}
                </tr>
              </thead>
              
              <tbody>
                @foreach ($makanan as $u)
                <tr>
                  <th scope="row">{{ $u->id_makanan }}</th>
                  <td>{{ $u->nama }}</td>
                  <td>{{ $u->harga }}</td>
                  <td>{{ $u->status }}</td>

                  <td><img src="{{ asset('assets/gambar_makanan/'. $u->gambar) }}" alt="{{ $u->gambar }}" width="30%" height="30%"></td>

                  {{-- <td><a class="btn btn-primary " href="/edit/{{ $u->id}}">edit</a>
                  <a class="btn btn-danger" href="/hapus/{{ $u->id }}">delete</a></td> --}}
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>

    </div>

</body>
</html>