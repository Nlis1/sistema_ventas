  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route("home")}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Ventas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route("sales-new")}}">
              <i class="bi bi-circle"></i><span>Vender producto</span>
            </a>
          </li>
          <li>
            <a href="{{route('detail-sale')}}">
              <i class="bi bi-circle"></i><span>Consultar ventas</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('categories')}}">
          <i class="fa-solid fa-list"></i>
          <span>Categorias</span>
        </a>
      </li><!-- End Profile Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('orders')}}">
          <i class="fa-solid fa-list"></i>
          <span>Pedidos</span>
        </a>
      </li>

     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route("products")}}">
              <i class="bi bi-circle"></i><span>Administrar productos</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Reporte Productos</span>
            </a>
          </li>
        </ul>
      </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('compras')}}">
          <i class="bi bi-envelope"></i>
          <span>Compras</span>
        </a>
      </li><!-

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('proveedores')}}">
          <i class="bi bi-envelope"></i>
          <span>Proveedores</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users')}}">
            <i class="fa-solid fa-users"></i>
          <span>Usuarios</span>
        </a>
      </li><!-- End Register Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->