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

    
<main class="form-registration w-100 m-auto">
  <form action="/register" method="post">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Registration KLPCM</h1>
    <div class="form-floating">
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Name" required value="{{ old('name') }}">
      <label for="name">Name</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name='username' placeholder="username" required value="{{ old('username') }}">
      <label for="username">username</label>
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name='email' placeholder="name@example.com" required value="{{ old('email') }}">
      <label for="email">Email</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name='password' placeholder="Password" required>
      <label for="Password">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="btn btn-primary w-100 py-2 mt-3" id="add" name='add' type="submit">Sign up</button>
  </form>
  <small class="d-block mt-3 text-center">I Have Account? <a href="/login">Login Now!</a></small>
  <p class="mt-3 mb-3 text-body-secondary">&copy; Kowalsky</p>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
