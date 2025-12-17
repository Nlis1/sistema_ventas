@extends('frontend.layouts.main')

@section('titulo', 'Carrito')

@section('contenido')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Cart</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="current">Cart</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="cart-items">
              <div class="cart-header d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <h5>Producto</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Precio</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Cantidad</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Total</h5>
                  </div>
                </div>
              </div>


              <div class="cart-item" id="product-cart">
            
               
              </div>
          
              <div class="cart-actions">
                <div class="row">
                  <div class="col-lg-6 mb-3 mb-lg-0">
                  </div>
                  <div class="col-lg-6 text-md-end">
                    <button class="btn btn-outline-heading me-2">
                      <i class="bi bi-arrow-clockwise"></i> Actualizar carrito
                    </button>
                    <button class="btn btn-outline-remove">
                      <i class="bi bi-trash"></i> Vaciar carrito
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" id="resumen-cart" data-aos="fade-up" data-aos-delay="300">
        
          </div>
        </div>

      </div>

    </section><!-- /Cart Section -->

  </main>
    
@endsection
