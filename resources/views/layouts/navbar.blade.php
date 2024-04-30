<nav class="navbar navbar-expand-md bg-body-tertiary position-sticky sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">RSKB HASTA HUSADA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="/dashboards">Dashboard</a>
            </li>
            @endauth
          </ul>
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            @auth
                
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboards">My Dashboard</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>

              @else

              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>

              @endauth
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>