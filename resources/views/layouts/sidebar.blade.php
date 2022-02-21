<aside class="main-sidebar sidebar-dark-primary elevation-4" onclick="myFunction()">
    <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{ asset('../vendor/adminlte/dist/img/logo2.png') }}"
             alt="NŠ Talent"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">NŠ - TALENT</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
