@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/klpcmumums" class="btn btn-warning">Kembali</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="col-lg-7">
      <form action="/dashboard/klpcmumums" method="post">
        @csrf
          <div class=" row">
            <input type="text" name="cara_bayar" hidden class="form-control " id="cara_bayar" required value="umum">
            <label for="pasien" class="col-sm-2 col-form-label ">Pasien</label>
            <div class="col-sm-10 mb-3">
              <input type="text" name="pasien" class="form-control @error('pasien') is-invalid @enderror " id="pasien" required value="{{ old('pasien') }}">
            </div>
            <label for="no_rm" class="col-sm-2 col-form-label">No RM</label>
            <div class="col-sm-10 mb-3">
              <input type="text" name="no_rm" class="form-control @error('no_rm') is-invalid @enderror" id="no_rm" required value="{{ old('no_rm') }}">
            </div>
            <label for="umur" class="col-sm-2 col-form-label">Umur</label>
            <div class="col-sm-10 mb-3">
              <input type="text" name="umur" class="form-control @error('umur') is-invalid @enderror" id="umur" required value="{{ old('umur') }}">
            </div>
            <label for="kelamin" class="col-sm-2 col-form-label">Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="kelamin" id="kelamin" value="lk">
                        <label class="form-check-label" for="kelamin">Laki - laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="pr">
                        <label class="form-check-label" for="kelamin">Perempuan</label>
                    </div>
                </div>
            <label for="tgl_masuk" class="col-sm-2 col-form-label">Tgl Masuk</label>
            <div class="col-sm-10 mb-3">
              <input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" required value="{{ old('tgl_masuk') }}">
                @error('tgl_masuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label for="tgl_keluar" class="col-sm-2 col-form-label">Tgl Keluar</label>
            <div class="col-sm-10 mb-3">
              <input type="date" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror" id="tgl_keluar" required value="{{ old('tgl_keluar') }}">
            </div>
            <label for="rm3" class="col-sm-2 col-form-label">RM3</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm3" id="rm3" value="0">
                        <label class="form-check-label" for="rm3">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm3" id="rm3" value="1">
                        <label class="form-check-label" for="rm3">Tidak</label>
                    </div>
                </div>
            <label for="rm4" class="col-sm-2 col-form-label">RM4</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm4" id="rm4" value="0">
                        <label class="form-check-label" for="rm4">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm4" id="rm4" value="1">
                        <label class="form-check-label" for="rm4">Tidak</label>
                    </div>
                </div>
            <label for="rm8a" class="col-sm-2 col-form-label">RM8A</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm8a" id="rm8a" value="0">
                        <label class="form-check-label" for="rm8a">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm8a" id="rm8a" value="1">
                        <label class="form-check-label" for="rm8a">Tidak</label>
                    </div>
                </div>
            <label for="rm8b" class="col-sm-2 col-form-label">RM8B</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm8b" id="rm8b" value="0">
                        <label class="form-check-label" for="rm8b">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm8b" id="rm8b" value="1">
                        <label class="form-check-label" for="rm8b">Tidak</label>
                    </div>
                </div>
            <label for="rm9a" class="col-sm-2 col-form-label">RM9A</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9a" id="rm9a" value="0">
                        <label class="form-check-label" for="rm9a">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9a" id="rm9a" value="1">
                        <label class="form-check-label" for="rm9a">Tidak</label>
                    </div>
                </div>
            <label for="rm9b" class="col-sm-2 col-form-label">RM9B</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9b" id="rm9b" value="0">
                        <label class="form-check-label" for="rm9b">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9b" id="rm9b" value="1">
                        <label class="form-check-label" for="rm9b">Tidak</label>
                    </div>
                </div>
            <label for="rm9c" class="col-sm-2 col-form-label">RM9C</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9c" id="rm9c" value="0">
                        <label class="form-check-label" for="rm9c">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9c" id="rm9c" value="1">
                        <label class="form-check-label" for="rm9c">Tidak</label>
                    </div>
                </div>
            <label for="rm9d" class="col-sm-2 col-form-label">RM9D</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9d" id="rm9c" value="0">
                        <label class="form-check-label" for="rm9d">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9d" id="rm9c" value="1">
                        <label class="form-check-label" for="rm9d">Tidak</label>
                    </div>
                </div>
            <label for="rm9e" class="col-sm-2 col-form-label">RM9E</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9e" id="rm9e" value="0">
                        <label class="form-check-label" for="rm9e">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9e" id="rm9e" value="1">
                        <label class="form-check-label" for="rm9e">Tidak</label>
                    </div>
                </div>
            <label for="rm9f" class="col-sm-2 col-form-label">RM9F</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9f" id="rm9f" value="0">
                        <label class="form-check-label" for="rm9f">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9f" id="rm9f" value="1">
                        <label class="form-check-label" for="rm9f">Tidak</label>
                    </div>
                </div>
            <label for="rm9g" class="col-sm-2 col-form-label">RM9G</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9g" id="rm9g" value="0">
                        <label class="form-check-label" for="rm9g">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9g" id="rm9g" value="1">
                        <label class="form-check-label" for="rm9g">Tidak</label>
                    </div>
                </div>
            <label for="rm9h" class="col-sm-2 col-form-label">RM9H</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9h" id="rm9h" value="0">
                        <label class="form-check-label" for="rm9h">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9d" id="rm9h" value="1">
                        <label class="form-check-label" for="rm9d">Tidak</label>
                    </div>
                </div>
            <label for="rm9l" class="col-sm-2 col-form-label">RM9L</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm9l" id="rm9l" value="0">
                        <label class="form-check-label" for="rm9l">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm9l" id="rm9l" value="1">
                        <label class="form-check-label" for="rm9l">Tidak</label>
                    </div>
                </div>
            <label for="rm15a" class="col-sm-2 col-form-label">RM15A</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="rm15a" id="rm15a" value="0">
                        <label class="form-check-label" for="rm15a">Lengkap</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rm15a" id="rm15a" value="1">
                        <label class="form-check-label" for="rm15a">Tidak</label>
                    </div>
                </div>
                <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                <div class="col-sm-10 mb-3">
                    <input type="text" name="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" required value="{{ old('diagnosa') }}">
                </div>
                <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
                <div class="col-sm-10 mb-3">
                    <input type="text" name="tindakan" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" required value="{{ old('tindakan') }}">
                </div>
                <label for="dpjp_id" class="col-sm-2 col-form-label">DPJP</label>
                <div class="col-sm-10 mb-3">
                    <select class="form-select form-select-sm" name="dpjp_id" aria-label="Small select example">
                        @foreach ($dpjps as $dpjp)
                            <option value="{{ $dpjp->id }}" selected>{{ $dpjp->dokter }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="cara_keluar" class="col-sm-2 col-form-label">Cara Keluar Pasien</label>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm" name="cara_keluar" aria-label="Small select example">
                        <option value="Sembuh" selected>Sembuh</option>
                        <option value="Rujuk">Rujuk</option>
                        <option value="ASP">APS</option>
                        <option value="Meniggal">Meninggal</option>
                    </select>
                </div>
                <div class="col-sm-10 mb-3">
                    <button class="btn btn-primary"> tambah </button>
                </div>
            </div>
      </form>
  </div>
    
@endsection