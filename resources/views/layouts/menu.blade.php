<div class="sidebar-content">
  <div class="nav-container">
    <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
      <li class=" nav-item"><a href="{{route('home')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Inicio</span></a>
      </li>
      <li class=" nav-item">
        <a href="{{route('notifications')}}">
        <i class="ft-bell"></i><span data-i18n="" class="menu-title">Notificaciones</span>
        @if (count(Auth::user()->hasnotifications) > 0)
          <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">{{count(Auth::user()->hasnotifications)}}</span>
        @endif
        </a>
      </li>
      @if (Auth::user()->rol ==  1 OR Auth::user()->rol ==  2) <!-- Piloto  O Administrador-->
        <li class="has-sub nav-item"><a href="#"><i class="fas fa-globe-americas"></i><span data-i18n="" class="menu-title">Vuelos</span></a>
          <ul class="menu-content">
            @if (Auth::user()->rol ==  1) <!-- Piloto -->
              <li><a href="{{route('vuelos_solicitudes.create')}}" class="menu-item">Reservar Avión</a></li>
              <li><a href="{{route('vuelos_salidas')}}" class="menu-item">Inicio Vuelos</a></li>
              <li><a href="{{route('vuelos_llegadas')}}" class="menu-item">Cierre Vuelos</a></li>
            @endif
            <li><a href="{{route('vuelos_solicitudes')}}" class="menu-item">Solicitudes</a></li>
            @if (Auth::user()->rol ==  2) <!-- Administrador -->
              <li><a href="{{route('vuelos.volando')}}" class="menu-item">Aviones en el aire</a></li>
            @endif
            <li><a href="{{route('vuelos.historico')}}" class="menu-item">Histórico de Vuelos</a></li>
            @if (Auth::user()->rol ==  2)
              <li><a href="{{route('vuelotipos')}}" class="menu-item">Tipos</a></li>
            @endif
            <li><a href="#" class="menu-item">Entrenamientos</a></li>
          </ul>
        </li>
      @endif
      @if (Auth::user()->rol ==  2) <!-- Administrador -->
        <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n="" class="menu-title">Pilotos</span></a>
          <ul class="menu-content">
            <li><a href="{{route('pilotos')}}" class="menu-item">Listado</a></li>
            <li><a href="{{route('pilotos.create')}}" class="menu-item">Nuevo Piloto</a></li>
          </ul>
        </li>
        <li class="has-sub nav-item"><a href="#"><i class="icon-plane"></i><span data-i18n="" class="menu-title">Aviones</span></a>
          <ul class="menu-content">
            <li><a href="{{route('airplanes')}}" class="menu-item">Listado</a></li>
            <li><a href="{{route('airplanes.create')}}" class="menu-item">Nuevo Avión</a></li>
            <li><a href="{{route('airplanes.tacometroalerta')}}" class="menu-item">Alertas</a></li>
            <li><a href="{{route('airplanemodels')}}" class="menu-item">Modelos</a></li>
            <li><a href="{{route('airplanebrands')}}" class="menu-item">Marcas</a></li>
          </ul>
        </li>
      @endif
      @if (Auth::user()->rol ==  2 OR Auth::user()->rol == 3) <!-- Administrador o Mécanico -->
        <li class="has-sub nav-item"><a href="#"><i class="fas fa-tools"></i><span data-i18n="" class="menu-title">Mantenciones</span></a>
          <ul class="menu-content">
            <li><a href="{{route('mantencion')}}" class="menu-item">Listado</a></li>
            @if (Auth::user()->rol ==  2) <!-- Administrador -->
              <li><a href="{{route('mantencion.create')}}" class="menu-item">Nueva Mantención</a></li>
              <li><a href="{{route('mantencion.historico')}}" class="menu-item">Histórico</a></li>
              <li><a href="{{route('mantencion.tipos')}}" class="menu-item">Tipos</a></li>
              <li><a href="{{route('mantencion.tarealists')}}" class="menu-item">Tareas</a></li>
            @endif
          </ul>
        </li>
      @endif
      @if (Auth::user()->rol ==  2) <!-- Administrador -->
        <li class="has-sub nav-item"><a href="#"><i class="fas fa-cogs"></i><span data-i18n="" class="menu-title">Inventario</span></a>
          <ul class="menu-content">
            <li><a href="{{route('inventario.piezas')}}" class="menu-item">Listado</a></li>
            <li><a href="{{route('inventario.piezas.create')}}" class="menu-item">Nueva Pieza</a></li>
            <li><a href="{{route('inventario.piezatipos')}}" class="menu-item">Tipos de Piezas</a></li>
            <li><a href="{{route('inventario.piezafabricantes')}}" class="menu-item">Marcas de Piezas</a></li>
          </ul>
        </li>
      @endif
      <li class="has-sub nav-item"><a href="#"><i class="icon-user"></i><span data-i18n="" class="menu-title">Mi Perfil</span></a>
        <ul class="menu-content">
          @if (Auth::user()->rol ==  1)
            <li><a href="{{route('pilotos.show',['id'=>Auth::user()->piloto->id])}}" class="menu-item">Ver Mi Perfil</a></li>
            <li><a href="{{route('pilotos.edit',['id'=>Auth::user()->piloto->id])}}" class="menu-item">Editar Mis Datos</a></li>
          @endif
          <li><a href="#" class="menu-item">Cambiar Contraseña</a></li>
          <li><a href="{{route('logout')}}" class="menu-item">Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>
    <hr>
    <div align="center" class="menu-title">
      <p>{{fullname(Auth::user()->id)}}</p>
      <p><strong>{{getUserRol(Auth::user()->id)}}</strong></p>
    </div>
  </div>
</div>