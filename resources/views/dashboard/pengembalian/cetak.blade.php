<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>KLPCM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
<body>
  <h2 align="center" class="mt-5 mb-5">LAPORAN PENGEMBALIAN</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm border-gray-500">
          <thead>
            <tr>
              <th scope="col" >#</th>
              <th scope="col" >No RM</th>
              <th scope="col" >Pasien</th>
              <th scope="col" >Peminjam</th>
              <th scope="col" >Ruang</th>
              <th scope="col" >Tgl Pengembalian</th>
              <th scope="col" >Tgl Kembali RM</th>
              <th scope="col" >Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengembalians as $pengembalian)
            <tr>
              <td>{{ $loop->iteration }}</td>  
              <td>{{ $pengembalian->no_rm }}</td>  
              <td>{{ $pengembalian->pasien }}</td>  
              <td>{{ $pengembalian->dpjp->dokter }}</td>
              <td>{{ $pengembalian->ruang->nama_ruang }}</td>
              <td>{{ $pengembalian->tgl_pengembalian }}</td>  
              <td>{{ $pengembalian->tgl_kembali_rm }}</td>  
              <td>
                @if ($pengembalian->status == 2)
                    Belum Kembali
                @else
                    Kembali
                @endif
              </td>  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
<script type="text/javascript">
window.print();
</script>
</body>
</html>