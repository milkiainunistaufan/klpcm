<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KLPCM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/sign-in.css">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    
<main class="form-signin w-100 m-auto">
  @if(Session::Has('status'))
  
  <div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
  </div>
  @endif

  @if(Session()->has('LoginError'))
  
  <div class="alert alert-danger" role="alert">
    Login Gagal
  </div>
  @endif

  <form action="/login" method="post">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center">KLPCM</h1>

    <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="username" value="{{ old('username') }}" required autofocus>
      <label for="username">Username</label>
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
  <small class="d-block mt-3 text-center">Not Registered ? <a href="/register">Register Now!</a></small>
  <p class="mt-3 mb-3 text-body-secondary">&copy; Kowalsky</p>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
