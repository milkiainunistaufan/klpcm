<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">RSKB HASTA HUSADA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboards') ? 'active' : '' }}" aria-current="page" href="/dashboards">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          </ul>
          <hr>
          <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/klpcmumums*') ? 'active' : '' }}" href="/dashboard/klpcmumums">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              LKPCM UMUM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/klpcmbpjs*') ? 'active' : '' }}" href="/dashboard/klpcmbpjs">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              LKPCM BPJS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/laporanklpcm*') ? 'active' : '' }}" href="/dashboard/laporanklpcm">
              <svg class="bi"><use xlink:href="#graph-up"/></svg>
              Laporan LKPCM
            </a>
          </li>
        </ul>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/pengembalian*') ? 'active' : '' }}" href="/dashboard/pengembalian">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Pengembalian
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#graph-up"/></svg>
              Selesai di RM
            </a>
          </li> --}}
        </ul>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/dpjp*') ? 'active' : '' }}" href="/dashboard/dpjp">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Data DPJP
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/ruang*') ? 'active' : '' }}" href="/dashboard/ruang">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Data Ruang
            </a>
          </li>
          <hr>
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button class="nav-link d-flex align-items-center gap-2 active" aria-current="page">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign Out
              </button>
            </form>
          </li>
          </ul>
      </div>
    </div>
  </div>