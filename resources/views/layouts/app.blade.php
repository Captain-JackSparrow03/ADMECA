<!DOCTYPE html>
<html lang="en">
<head>
  @php use Illuminate\Support\Str; @endphp
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>ADMECA - @yield('title')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/pace.min.css') }}"/>
  <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/assets/css/animate.css') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-SfL2kV..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/assets/css/sidebar-menu.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/assets/css/app-style.css') }}"/>
</head>

<body class="bg-theme bg-theme2">
<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper" data-simplebar>
    <div class="brand-logo">
      <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/logo.png') }}" style="background:white;border-radius:50%;width:50px;" alt="logo">
        <h5 class="logo-text">ADMECA ADMIN</h5>
      </a>
    </div>

    <ul class="sidebar-menu do-nicescrol mt-4">
      <li class="sidebar-header">NAVIGATION PRINCIPALE</li>

      <li>
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('clients.index') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'clients.') ? 'active' : '' }}">
          <i class="fa-solid fa-users"></i> <span>Clients</span>
        </a>
      </li>
      <li>
        <a href="{{ route('vehicules.index') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'vehicules.') ? 'active' : '' }}">
          <i class="fa-solid fa-car-side"></i> <span>Véhicules</span>
        </a>
      </li>
      <li>
        <a href="{{ route('interventions.index') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'interventions.') ? 'active' : '' }}">
          <i class="fa-solid fa-screwdriver-wrench"></i> <span>Interventions</span>
        </a>
      </li>
      <li>
        <a href="{{ route('factures.index') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'factures.') ? 'active' : '' }}">
          <i class="fa-solid fa-file-invoice-dollar"></i> <span>Facturation</span>
        </a>
      </li>
      <li>
        <a href="{{ route('stocks.index') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'stocks.') ? 'active' : '' }}">
          <i class="fa-solid fa-boxes-stacked"></i> <span>Stocks</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Topbar -->
  <header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
      <ul class="navbar-nav mr-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link toggle-menu" href="javascript:void();"><i class="icon-menu menu-icon"></i></a>
        </li>
        <li class="nav-item">
          <form class="search-bar">
            <input type="text" class="form-control" placeholder="Recherche...">
            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
          </form>
        </li>
      </ul>

      <ul class="navbar-nav align-items-center right-nav-link">
        <li class="nav-item">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
            <span class="user-profile"><i class="fa-solid fa-user"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-item user-details">
              <div class="media">
                <div class="avatar"><i class="fa fa-user fa-2x mr-3 mt-3"></i></div>
                <div class="media-body">
                  <h6 class="mt-2 user-title">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</h6>
                  <p class="user-subtitle">{{ Auth::user()->name }}</p>
                </div>
              </div>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-white p-0 m-0 on_logout" style="text-decoration:none;">
                  <i class="icon-power mr-2"></i> Déconnexion
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <div class="clearfix"></div>

  <!-- Contenu principal -->
  <div class="content-wrapper">
    @yield('content')
  </div>

  <!-- Pied de page -->
  <footer class="footer">
    <div class="container">
      <div class="text-center">© 2025 Waitech</div>
    </div>
  </footer>

</div>

<!-- Scripts -->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.js') }}"></script>
<script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.loading-indicator.js') }}"></script>
<script src="{{ asset('admin/assets/js/app-script.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/Chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/index.js') }}"></script>
</body>@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
