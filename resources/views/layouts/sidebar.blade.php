<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Home</span></a></li>
    <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Mi Perfil</span></a></li> -->
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Usuario</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      
        <li><a href="">Usuario Web</a></li>
        <li><a href="{{url('usuario/usuario-movil')}}">Usuario Movil</a></li>
        <li><a href="{{url('usuario/login')}}">Login</a></li>
        <li><a href="{{url('usuario/empleador')}}">Empleador</a></li>
        <li><a href="{{url('usuario/empleado')}}">Empleado</a></li>
        <li><a href="{{url('usuario/ubicacion')}}">Ubicacion</a></li>
        
        
        
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Trabajo</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <!-- <li><a href="#">Respaldos</a></li>
        <li><a href="#">Trabajadores</a></li> -->
        <li><a href="{{url('trabajo/area')}}">Areas</a></li>
        <li><a href="{{url('trabajo/especialidad')}}">Especialidades</a></li>
        <li><a href="{{url('trabajo/objeto')}}">Objetos</a></li>
        <li><a href="{{url('trabajo/servicio')}}">Servicios</a></li>
        <li><a href="{{url('trabajo/solicitud-contrato')}}">Solicitud de Contrato</a></li>
        <li><a href="{{url('trabajo/contrato')}}">Contrato</a></li>
        
        
        
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Respaldo</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('respaldo/solicitud-respaldo')}}">Solicitud Respaldo</a></li>
        
      </ul>
    </li>
    <!-- <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Ajustes</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#">Areas de Trabajo</a></li>
        <li><a href="#">Especialidades</a></li>
        <li><a href="#">Tipo de Publicaciones</a></li>
      </ul>
    </li> -->
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>