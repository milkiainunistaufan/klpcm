@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/dokter" class="btn btn-warning">Kembali</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      
    </div>
  </div>
  <div class="col-lg-7">
    <form action="/dashboard/dpjp/{{ $dpjp->id }}" method="post">
      @csrf
      @method('put')
        <div class=" row">
          <label for="name" class="col-sm-2 col-form-label ">Dokter</label>
          <div class="col-sm-10 mb-3">
            <input type="text" name="dokter" class="form-control @error('dokter') is-invalid @enderror " id="dokter" required value="{{ old('dokter', $dpjp->dokter) }}">
          </div>
            <div class="col-sm-10 mb-3">
                <button class="btn btn-primary"> Edit </button>
            </div>
          </div>
    </form>
</div>
    
@endsection