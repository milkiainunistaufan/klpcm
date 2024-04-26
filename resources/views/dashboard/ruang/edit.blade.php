@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/ruang" class="btn btn-warning">Kembali</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      
    </div>
  </div>
  <div class="col-lg-7">
    <form action="/dashboard/ruang/{{ $ruang->id }}" method="post">
      @csrf
      @method('put')
        <div class=" row">
          <label for="nama_ruang" class="col-sm-2 col-form-label ">Nama Ruang</label>
          <div class="col-sm-10 mb-3">
            <input type="text" name="nama_ruang" class="form-control @error('ruang') is-invalid @enderror " id="nama_ruang" required value="{{ old('nama_ruang',$ruang->nama_ruang) }}">
          </div>
            <div class="col-sm-10 mb-3">
                <button class="btn btn-primary"> edit </button>
            </div>
          </div>
    </form>
</div>
    
@endsection