@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><a href="/dashboard/ruang/create" class="btn btn-success">Tambah data</a></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <form action="" method="">
        <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit" >Cari</button>
        </div>
      </form>
    </div>
  </div>
  
  <h2>Data Ruang</h2>
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
          <th scope="col" >Ruang</th>
          <th scope="col" colspan="2">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ruangs as $ruang)
        <tr>
          <td>{{ $loop->iteration }}</td>  
          <td>{{ $ruang->nama_ruang }}</td>  
          <td>
            <a class="badge bg-warning text-decoration-none" href="/dashboard/ruang/{{ $ruang->id }}/edit">Edit</a>
            {{-- <form action="/dashboard/ruang/{{ $ruang->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm(' Are you sure ?');">Del</button>
            </form> --}}
          </td> 
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $ruangs->links() }}
@endsection