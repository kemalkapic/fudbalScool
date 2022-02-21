<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NŠ Talent - Cazin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body id="body" class="sidebar-mini sidebar-closed sidebar-collapse" onload="onload()">
<div class="wrapper" >
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" onclick="myFunction()"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <li class="user-header bg-primary">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Aktivan od {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Odjava
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" onclick="closeIfOpen()">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2022 <a href="https://www.facebook.com/ns.talent" target="_blank">Nogometna škola Talent</a>.</strong> Sva prava pridržana.
    </footer>
</div>
<script type="text/javascript">
     function onload() {
         $('.sidebar-mini').removeClass('sidebar-open');
         $('.sidebar-mini').addClass('sidebar-closed sidebar-collapse');    
    }
    function myFunction() {
      var body = document.getElementById("body");
      if(body.className.includes("sidebar-open")){
         $('.sidebar-mini').removeClass('sidebar-open');
         $('.sidebar-mini').addClass('sidebar-closed sidebar-collapse');
      }else{
         $('.sidebar-mini').addClass('sidebar-open');
         $('.sidebar-mini').removeClass('sidebar-closed sidebar-collapse');
      }   
    }
    function closeIfOpen() {
      var body = document.getElementById("body");
      if(body.className.includes("sidebar-open")){
         $('.sidebar-mini').removeClass('sidebar-open');
         $('.sidebar-mini').addClass('sidebar-closed sidebar-collapse');
      }
    }
</script>
@yield('third_party_scripts')


</body>
</html>
