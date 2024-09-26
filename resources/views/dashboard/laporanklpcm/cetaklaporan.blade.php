@php
use Carbon\Carbon;
@endphp
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
    <h2 align="center" class="mt-5">LAPORAN KLPCM</h2>
<div class="table-responsive small">
    <table class="table table-striped table-sm border-gray-500">
      <thead>
        <tr>
          <th scope="col" rowspan="2">#</th>
          <th scope="col" rowspan="2">Dokter</th>
          <th scope="col" rowspan="2">jumlah DRM</th>
          <th scope="col" rowspan="2">Lengkap</th>
          <th scope="col" rowspan="2">Tidak Lengkap</th>
          <th scope="col" colspan="2">Presentase</th>
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
        </tr>
        <tr>
          <td>Lengkap</td>
          <td>Tidak</td>
        </tr>
      </thead>
      <tbody>
      @foreach ($dpjps as $dpjp)
        @php
      // Get the start and end of the current month using Carbon
          $currentMonthStart = Carbon::now()->startOfMonth();
          $currentMonthEnd = Carbon::now()->endOfMonth();

                if (request('date_start') && request('date_end')) {
                    $filteredKlpcms = $dpjp->klpcms->filter(function ($klpcm) {
                      return $klpcm->tgl_keluar >= request('date_start') && $klpcm->tgl_keluar <= request('date_end');
                    });
                } else {
                  $filteredKlpcms = $dpjp->klpcms->filter(function ($klpcm) use ($currentMonthStart, $currentMonthEnd) {
                      return $klpcm->tgl_keluar >= $currentMonthStart && $klpcm->tgl_keluar <= $currentMonthEnd;
                  });
                }
                  
              
              $sumRm3 = $filteredKlpcms->sum('rm3');
              $sumRm4 = $filteredKlpcms->sum('rm4');
              $sumRm8a = $filteredKlpcms->sum('rm8a');
              $sumRm8b = $filteredKlpcms->sum('rm8b');
              $sumRm9a = $filteredKlpcms->sum('rm9a');
              $sumRm9b = $filteredKlpcms->sum('rm9b');
              $sumRm9c = $filteredKlpcms->sum('rm9c');
              $sumRm9d = $filteredKlpcms->sum('rm9d');
              $sumRm9e = $filteredKlpcms->sum('rm9e');
              $sumRm9f = $filteredKlpcms->sum('rm9f');
              $sumRm9g = $filteredKlpcms->sum('rm9g');
              $sumRm9h = $filteredKlpcms->sum('rm9h');
              $sumRm9l = $filteredKlpcms->sum('rm9l');
              $sumRm15a = $filteredKlpcms->sum('rm15a');
          @endphp
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $dpjp->dokter }}</td>
              <td>{{ $dpjp->klpcms_count  }}</td>
              <td>{{ $dpjp->klpcm_count  }}</td>
              <td>{{ $dpjp->klpcmtidaklengkap_count  }}</td>
              <td>
                {{-- {{ $dpjp->klpcm_count == 0 ? 0 : round($dpjp->klpcm_count/$dpjp->klpcms_count*100, 2) }}%</td> --}}
                @if($dpjp->klpcms_count != 0)
                {{ round($dpjp->klpcm_count/$dpjp->klpcms_count*100, 2) }}
                @else
                  0
                @endif
                %
              <td>
                {{-- {{ $dpjp->klpcmtidaklengkap_count == 0 ? 0 : round($dpjp->klpcmtidaklengkap_count/$dpjp->klpcms_count*100, 2) }} --}}
                @if($dpjp->klpcms_count != 0)
                  {{ round(($dpjp->klpcmtidaklengkap_count/$dpjp->klpcms_count)*100, 2) }}
                @else
                  0
                @endif
                %</td>
                <td>{{ $sumRm3 }}</td>
                <td>{{ $sumRm4 }}</td>
                <td>{{ $sumRm8a }}</td>
                <td>{{ $sumRm8b }}</td>
                <td>{{ $sumRm9a }}</td>
                <td>{{ $sumRm9b }}</td>
                <td>{{ $sumRm9c }}</td>
                <td>{{ $sumRm9d }}</td>
                <td>{{ $sumRm9e }}</td>
                <td>{{ $sumRm9f }}</td>
                <td>{{ $sumRm9g }}</td>
                <td>{{ $sumRm9h }}</td>
                <td>{{ $sumRm9l }}</td>
                <td>{{ $sumRm15a }}</td>
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