@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/pengembalian" class="btn btn-warning">Kembali</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="col-lg-7">
      <form action="/dashboard/pengembalian/{{ $pengembalian->id }}" method="post">
        @csrf
        @method('put')
          <div class=" row">
            <input type="text" name="status" hidden class="form-control " id="status" required value="2">
            <label for="no_rm" class="col-sm-3 col-form-label">No RM</label>
            <div class="col-sm-7 mb-3">
                <input type="text" name="no_rm" class="form-control @error('no_rm') is-invalid @enderror" id="no_rm" required value="{{ old('no_rm',$pengembalian->no_rm) }}">
            </div>
            <label for="pasien" class="col-sm-3 col-form-label ">Pasien</label>
            <div class="col-sm-7 mb-3">
              <input type="text" name="pasien" class="form-control @error('pasien') is-invalid @enderror " id="pasien" required value="{{ old('pasien',$pengembalian->pasien) }}">
            </div>
            <label for="kelamin" class="col-sm-3 col-form-label">Kelamin</label>
                <div class="col-sm-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{ (old('kelamin', $pengembalian->kelamin) == 'lk' ? "checked":"") }} type="radio" name="kelamin" id="kelamin" value="lk">
                        <label class="form-check-label" for="kelamin">Laki - laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{ (old('kelamin', $pengembalian->kelamin) == 'pr' ? "checked":"") }} type="radio" name="kelamin" id="kelamin" value="pr">
                        <label class="form-check-label" for="kelamin">Perempuan</label>
                    </div>
                </div>
            <label for="dpjp_id" class="col-sm-3 col-form-label">Peminjam</label>
                <div class="col-sm-7 mb-3">
                    <select class="form-select form-select-sm" name="dpjp_id" aria-label="Small select example">
                        @foreach ($dpjps as $dpjp)
                        <option value="{{ $dpjp->id }}" {{ (old('dpjp_id',$pengembalian->dpjp_id) == $dpjp->id ? "selected":"") }}>{{ $dpjp->dokter }}</option>
                        @endforeach
                    </select>
                </div>
            <label for="ruang_id" class="col-sm-3 col-form-label">Ruang Pengembalian</label>
                <div class="col-sm-7">
                    <select class="form-select form-select-sm" name="ruang_id" aria-label="Small select example">
                        @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang->id }}" {{ (old('ruang_id',$pengembalian->ruang_id) == $ruang->id ? "selected":"") }}>{{ $ruang->nama_ruang }}</option>  
                        @endforeach
                        
                    </select>
                </div>
            <label for="tgl_pengembalian" class="col-sm-3 col-form-label">Tgl Pengembalian</label>
            <div class="col-sm-7 mb-3">
              <input type="date" name="tgl_pengembalian" class="form-control @error('tgl_pengembalian') is-invalid @enderror" id="tgl_pengembalian" required value="{{ old('tgl_pengembalian',$pengembalian->tgl_pengembalian) }}">
                @error('tgl_pengembalian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label for="tgl_kembali_rm" class="col-sm-3 col-form-label">Tgl Kembali RM</label>
            <div class="col-sm-7 mb-3">
              <input type="date" name="tgl_kembali_rm" class="form-control @error('tgl_kembali_rm') is-invalid @enderror" id="tgl_kembali_rm" required value="{{ old('tgl_kembali_rm',$pengembalian->tgl_kembali_rm) }}">
            </div>
                <div class="col-sm-7 mb-3">
                    <button class="btn btn-primary"> edit </button>
                </div>
            </div>
      </form>
  </div>
    
@endsection