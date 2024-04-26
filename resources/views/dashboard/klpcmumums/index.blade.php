@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"><a href="/dashboard/klpcmumums/create" class="btn btn-success">Tambah data</a></h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    {{-- <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div> --}}
    <div class="" style="margin-right: 5px">
    <form action="" method="">
      <div class="input-group mb-3">
        <select class="form-select form-select-sm" name="dpjp_id" aria-label="Small select example">
          <option value="">- pilih Dokter -</option>
          @foreach ($dpjps as $dpjp)
              <option value="{{ $dpjp->id }}" {{ (old('dpjp_id',$dpjp_id) == $dpjp->id ? "selected":"") }}>{{ $dpjp->dokter }}</option>
          @endforeach
      </select>
        <button class="btn btn-outline-secondary" type="submit" >Cari</button>
      </div>
    </form>
  </div>
    <form action="" method="">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
        <button class="btn btn-outline-secondary" type="submit" >Cari</button>
      </div>
    </form>
  </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2>KLPCM UMUM</h2>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="/dashboard/klpcmumum/cetak{{ request()->filled('dpjp_id') ? '?dpjp_id='.trim(request('dpjp_id')) : '' }}" target="_blank" class="btn btn-success">Cetak</a>
  </div>
</div>
@if (session()->has('success'))
    
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
    
@endif

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
        <th scope="col" rowspan="2" colspan="3">Action</th>
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
        <td>{{ ($klpcms->currentPage()-1) * $klpcms->perPage() + $loop->iteration }}</td>
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
        <td>
          <form action="/dashboard/klpcmumums/carabayar/{{ $klpcm->id }}" method="post" class="d-inline">
            @csrf
            <input type="text" hidden value="bpjs" name="cara_bayar">
            <button class="badge bg-success border-0" >umum</button>
          </form>
        </td>
        <td>
          <a class="badge bg-warning text-decoration-none" href="/dashboard/klpcmumums/{{ $klpcm->id }}/edit">Edit</a>
        </td>
        <td>
          <form action="/dashboard/klpcmumums/{{ $klpcm->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm(' Are you sure ?');">Del</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $klpcms->links() }}
@endsection