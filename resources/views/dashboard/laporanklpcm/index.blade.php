@php
use Carbon\Carbon;
@endphp
@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div></div>
    <div class="btn-toolbar mb-2 mb-md-0">
      {{-- <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div> --}}
        <form action="">
          <div class="date" style="display: flex;">
          <input type="date" class="form-control form-row" name="date_start" id="date_start" value="{{ request('date_start') }}">
          <input type="date" class="form-control form-row" name="date_end" id="date_end" value="{{ request('date_end') }}">
          <button type="submit" class=" btn btn-primary align-items-end">tampilkan</button>
          </div>
      </form>
    </div>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>LAPORAN KLPCM</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="/dashboard/laporanklpcm/cetaklaporan{{ request()->filled('date_start') && request()->filled('date_end') ? '?date_start='.trim(request('date_start')).'&date_end='.trim(request('date_end')) : '' }}" target="_blank" class="btn btn-success">Cetak</a>
    </div>
  </div>

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
@endsection