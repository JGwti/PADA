<nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <a href="#">Brand</a>
            </div>
        </div>

        <li><a href="{{route('pacientes.index')}}">Administrar pacientes</a></li>
        @can('check-admin')
            <li><a href="{{route('usuarios.index')}}">Administrar usuarios</a></li>
        @endcan
        <li><a href="{{route('remision_estudiantes.index')}}">Administrar remision estudiantes</a></li>

       {{-- <li class="dropdown">
            <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
            <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <div class="dropdown-header">Dropdown heading</div>
                <li><a href="#pictures">Pictures</a></li>
                <li><a href="#videos">Videeos</a></li>
                <li><a href="#books">Books</a></li>
                <li><a href="#art">Art</a></li>
                <li><a href="#awards">Awards</a></li>
            </ul>
        </li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#followme">Follow me</a></li>--}}
    </ul>
</nav>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
</div>

