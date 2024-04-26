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
            <td>{{ $dpjp->klpcms->sum('rm3') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm4') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm8a') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm8b') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9a') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9b') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9c') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9d') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9e') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9f') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9g') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9h') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm9l') }}</td>
            <td>{{ $dpjp->klpcms->sum('rm15a') }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection