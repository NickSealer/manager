<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'NINJA') }}</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="d-flex" id="wrapper">
      <div class="border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
          <div class="icon-bar">
            <a href="{{ route('admin.products.index') }}" data-toggle="tooltip" data-placement="right" title="Principal" class="logo"><img class="img-responsive img-fluid" src="/img/logo.png" alt="img_logo"></a>
            <a href="{{ route('admin.users.index') }}" data-toggle="tooltip" data-placement="right" title="Usuarios"><i class="fas fa-users"></i></a>
            <a href="{{ route('admin.products.index') }}" data-toggle="tooltip" data-placement="right" title="Productos"><i class="fas fa-box-open"></i></a>
            <a href="{{ route('admin.pages.index') }}" data-toggle="tooltip" data-placement="right" title="Páginas"><i class="fas fa-copy"></i></a>
            <a href="{{ route('admin.locations.index') }}" data-toggle="tooltip" data-placement="right" title="Localizaciones"><i class="fas fa-map-marked-alt"></i></a>
            <a href="{{ route('admin.articles.index') }}" data-toggle="tooltip" data-placement="right" title="Artículos"><i class="fas fa-newspaper"></i></a>
            <a href="{{ route('admin.categories.index') }}" data-toggle="tooltip" data-placement="right" title="Categorías"><i class="fas fa-clipboard-list"></i></a>
            <a href="{{ route('admin.links.index') }}" data-toggle="tooltip" data-placement="right" title="Enlaces"><i class="fas fa-link"></i></a>
            <a href="{{ route('admin.slider.index') }}" data-toggle="tooltip" data-placement="right" title="Sliders y banners"><i class="fas fa-sliders-h"></i></a>
            <a href="{{ route('admin.admin.docs') }}" data-toggle="tooltip" data-placement="right" title="Docs"><i class="far fa-question-circle"></i></a>


            <div class="logout icon-bar">
              <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="right" title="Cerrar sesión">
                <i class="fa fa-power-off"></i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="sidebar-header ml-auto">
              <div class="user-info p-2 mr-3">
                <span class="user-name"><strong>{{ Auth::user()->name }}</strong></span>
                <span><small class="user-role text-muted">{{ Auth::user()->role }}</small></span>
              </div>
              <div class="user-pic">
                <img class="img-responsive rounded-circle" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
              </div>
            </div>
          </div>
        </nav>
        <div class="container-fluid">
          <main class="p-2">
              @include('manager::partials.errors')
              @include('flash::message')
              @yield('content')
          </main>
        </div>
      </div>
    </div>
    <footer class="page-footer font-small pt-4 text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mt-md-0 mt-3">
            <img src="/img/logo.png" alt="img_logo" class="img-fluid">
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="col-md-6 mb-md-0 mb-3 align-middle">
            <h5 class="text-uppercase font-weight-bold">Contacto</h5>
            <p>Cra. 58b #130a-13 Bogotá, Colombia.</p>
            <p>Tel: (571) 742 2600</p>
            <p>E-Mail:info@brm.com.co</p>
          </div>
        </div>
      </div>
      <div class="footer-copyright py-3">© 2019 Copyright:
        <a href="https://www.brm.com.co/"> brm.com.co</a>
      </div>
    </footer>
  </div>
  <script src="//cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
