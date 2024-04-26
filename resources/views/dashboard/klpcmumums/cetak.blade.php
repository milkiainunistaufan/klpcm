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
  <h2 align="center" class="mt-5 mb-5">KLPCM UMUM</h2>

  <div class="table-responsive small">
    <table class="table table-striped table-sm border-gray-500">
      <thead>
        <tr>
          <th scope="col" rowspan="2">#</th>
          <th scope="col" rowspan="2">Pasien</th>
          <th scope="col" rowspan="2">No RM</th>
          <th scope="col" colspan="2">Umur</th>
          <th scope="col" colspan="2">Tanggal</th>
          <th scope="col" rowspan="2">RM3</th>
          <th scope="col" rowspan="2">RM4</th>
          <th scope="col" rowspan="2">RM8A</th>
          <th scope="col" rowspan="2">RM8B</th>
          <th scope="col" rowspan="2">RM9A</th>
          <th scope="col" rowspan="2">RM9B</th>
          <th scope="col" rowspan="2">RM9C</th>
          <th scope="col" rowspan="2">RM9D</th>
          <th scope="col" rowspan="2">RM9E</th>
          <th scope="col" rowspan="2">RM9F</th>
          <th scope="col" rowspan="2">RM9G</th>
          <th scope="col" rowspan="2">RM9H</th>
          <th scope="col" rowspan="2">RM9L</th>
          <th scope="col" rowspan="2">RM15A</th>
          <th scope="col" rowspan="2">Diagnosa/Tindakan</th>
          <th scope="col" rowspan="2">DPJP</th>
          <th scope="col" rowspan="2">Cara Keluar</th>
        </tr>
        <tr>
          <td>LK</td>
          <td>PR</td>
          <td>Masuk</td>
          <td>Keluar</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($klpcms as $klpcm)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $klpcm->pasien }}</td>
          <td>{{ $klpcm->no_rm }}</td>
          @if ($klpcm->kelamin == 'lk')
          <td>{{ $klpcm->umur }} 
            @if ($klpcm->umur != 'BBL')
                th
            @endif
          </td>
          <td></td>
          @else
          <td></td>
          <td>{{ $klpcm->umur }}
            @if ($klpcm->umur != 'BBL')
                th
            @endif
          </td>
          @endif
          <td>{{ \Carbon\Carbon::parse($klpcm->tgl_masuk)->format('d - m - Y') }}</td>  
          <td>{{ \Carbon\Carbon::parse($klpcm->tgl_keluar)->format('d-m-Y') }}</td>  
          <td>{{ $klpcm->rm3 }}</td>  
          <td>{{ $klpcm->rm4 }}</td> 
          <td>{{ $klpcm->rm8a }}</td> 
          <td>{{ $klpcm->rm8b }}</td> 
          <td>{{ $klpcm->rm9a }}</td> 
          <td>{{ $klpcm->rm9b }}</td> 
          <td>{{ $klpcm->rm9c }}</td> 
          <td>{{ $klpcm->rm9d }}</td> 
          <td>{{ $klpcm->rm9e }}</td> 
          <td>{{ $klpcm->rm9f }}</td> 
          <td>{{ $klpcm->rm9g }}</td> 
          <td>{{ $klpcm->rm9h }}</td> 
          <td>{{ $klpcm->rm9l }}</td> 
          <td>{{ $klpcm->rm15a }}</td> 
          <td>{{ $klpcm->diagnosa }} ( {{ $klpcm->tindakan }} )</td> 
          <td>{{ $klpcm->dpjp->dokter }}</td> 
          <td>{{ $klpcm->cara_keluar }}</td>
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