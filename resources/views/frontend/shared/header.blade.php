 <header id="header" class="header sticky-top">

    <!-- Main Header -->
    <div class="main-header">
      <div class="container-fluid container-xl">
        <div class="d-flex py-3 align-items-center justify-content-between">

          <!-- Logo -->
          <a href="#" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">NiceShop</h1>
          </a>

          <!-- Search -->
          <form class="search-form desktop-search-form">
            <div class="input-group">
              <input type="text" class="form-control" id="texto" placeholder="Busca los productos">
              <button class="btn" type="submit" onclick="Buscador(event)">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>

          <!-- Actions -->
          <div class="header-actions d-flex align-items-center justify-content-end">

            <!-- Mobile Search Toggle -->
            <button class="header-action-btn mobile-search-toggle d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
              <i class="bi bi-search"></i>
            </button>

            <!-- Account -->
            <div class="dropdown account-dropdown">
              <button class="header-action-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
              </button>
              <div class="dropdown-menu">
                <div class="dropdown-header">
                  <h6>@auth
                     <span>Bienvenid@, {{ Auth::user()->name }}</span>
                    @endauth</h6>
                  <p class="mb-0">Access account &amp; manage orders</p>
                </div>
                <div class="dropdown-body">
                  <a class="dropdown-item d-flex align-items-center" href="{{route('account')}}">
                    <i class="bi bi-person-circle me-2"></i>
                    <span>Mi Perfil</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{route('account')}}">
                    <i class="bi bi-bag-check me-2"></i>
                    <span>Mis Pedidos</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{route('account')}}">
                    <i class="bi bi-heart me-2"></i>
                    <span>Mis Favoritos</span>
                  </a>
                </div>
          
                <div class="dropdown-footer">
                @guest
                  <li>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Iniciar sesión</a>
                    <a href="{{route('register')}}" class="btn btn-outline-primary w-100">Register</a>
                  </li>
                @endguest

                @auth
                  <li><a href="{{ route('logout') }}" class="btn btn-outline-primary w-100">Cerrar sesión</a></li>
                @endauth 
                </div>
              </div>
            </div>

            <!-- Wishlist -->
            <a href="account.html" class="header-action-btn d-none d-md-block">
              <i class="bi bi-heart"></i>
              <span class="badge">0</span>
            </a>

            <!-- Cart -->
            <a href="{{route('cart')}}" class="header-action-btn">
              <i class="bi bi-cart3"></i>
              <span class="badge" id="cart-count">0</span>
            </a>

            <!-- Mobile Navigation Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <div class="header-nav">
      <div class="container-fluid container-xl position-relative">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{route('home')}}" class="active">Home</a></li>
            <!-- Products Mega Menu 1 -->
            <li class="products-megamenu-1"><a href="{{route('category')}}"><span>Categorias</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
        
              <!-- Products Mega Menu 1 Desktop View -->
              <div class="desktop-megamenu">

                <div class="megamenu-tabs">
                  <ul class="nav nav-tabs" id="productMegaMenuTabs" role="tablist">
                    <li class="nav-item " role="presentation">
                      <button class="nav-link active" id="category-tab" data-bs-toggle="tab" data-bs-target="#category-content-1862" type="button" aria-selected="true" role="tab">Categories</button>
                    </li>
                  </ul>
                </div>

                <!-- Tabs Content -->
                <div class="megamenu-content tab-content">
               
                  <!-- Categories Tab -->
                  <div class="tab-pane fade show active" id="category-content-1862" role="tabpanel" aria-labelledby="category-tab">
                    <div class="category-grid" >
                        <div class="category-column">
                           <ul id="listar-categories-header">

                          </ul>
                        </div>
                    </div>
                  </div>

                </div>

              </div><!-- End Products Mega Menu 1 Desktop View -->

            </li><!-- End Products Mega Menu 1 -->
            <!-- Products Mega Menu 2 -->
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>

          </ul>
        </nav>
      </div>
    </div>

    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
      <div class="container">
        <form class="search-form">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products">
            <button class="btn" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

  </header>
