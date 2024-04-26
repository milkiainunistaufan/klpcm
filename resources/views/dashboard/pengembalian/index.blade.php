@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/pengembalian/create" class="btn btn-success">Tambah data</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="" style="margin-right: 5px">
        <form action="" method="">
          @if (request()->filled('dpjp_id'))
            <input type="text" name="dpjp_id" hidden value="{{ request('dpjp_id') }}">
          @endif
          <div class="input-group mb-3">
            <select class="form-select form-select-sm" name="status" aria-label="Small select example">
              <option value="">- pilih Status -</option>
                  <option value="1" {{ (old('status',request('status')) == 1 ? "selected":"") }}>Kembali</option>
                  <option value="2" {{ (old('status',request('status')) == 2 ? "selected":"") }}>Belum Kembali</option>
          </select>
            <button class="btn btn-outline-secondary" type="submit" >Cari</button>
          </div>
        </form>
      </div>
      <div class="" style="margin-right: 5px">
        <form action="" method="">
          @if (request()->filled('status'))
              <input type="text" name="status" value="{{ request('status') }}" hidden >
          @endif
          <div class="input-group mb-3">
            <select class="form-select form-select-sm" name="dpjp_id" aria-label="Small select example">
              <option value="">- pilih Dokter -</option>
              @foreach ($dpjps as $dpjp)
                  <option value="{{ $dpjp->id }}" {{ (old('dpjp_id',request('dpjp_id')) == $dpjp->id ? "selected":"") }}>{{ $dpjp->dokter }}</option>
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
    <h2>Data Pengembalian</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="/dashboard/pengembalians/cetak{{ request()->filled('status') && request()->filled('dpjp_id') ? '?dpjp_id='.trim(request('dpjp_id')).'&status='.trim(request('status')) : (request()->filled('status') ? '?status='.trim(request('status')) : (request()->filled('dpjp_id') ? '?dpjp_id='.trim(request('dpjp_id')) : '')) }}" target="_blank" class="btn btn-success">Cetak</a>
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
          <th scope="col" >#</th>
          <th scope="col" >No RM</th>
          <th scope="col" >Pasien</th>
          <th scope="col" >Peminjam</th>
          <th scope="col" >Ruang</th>
          <th scope="col" >Tgl Pengembalian</th>
          <th scope="col" >Tgl Kembali RM</th>
          <th scope="col" >Status</th>
          <th scope="col" colspan="2">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pengembalians as $pengembalian)
        <tr>
          <td>{{ ($pengembalians->currentPage()-1) * $pengembalians->perPage() + $loop->iteration }}</td>  
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
          <td>
            @if ($pengembalian->status == 2)
              <a class="badge bg-success text-decoration-none" href="/dashboard/pengembalian/kembali/{{ $pengembalian->id }}">kembali</a>
            @else
              <a class="badge bg-danger text-decoration-none" href="/dashboard/pengembalian/belum/{{ $pengembalian->id }}">belum</a>
            @endif
            
            <a class="badge bg-warning text-decoration-none" href="/dashboard/pengembalian/{{ $pengembalian->id }}/edit">Edit</a>
            <form action="/dashboard/pengembalian/{{ $pengembalian->id }}" method="post" class="d-inline">
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
  {{ $pengembalians->links() }}
@endsection