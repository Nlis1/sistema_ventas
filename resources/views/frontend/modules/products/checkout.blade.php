@extends('frontend.layouts.main')

@section('titulo', $titulo)

@section('contenido')
     <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Checkout</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Checkout</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Checkout Section -->
    <section id="checkout" class="checkout section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-7">
            <!-- Checkout Form -->
            <div class="checkout-container" data-aos="fade-up">
              <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Shipping Address -->
                <div class="checkout-section" id="shipping-address">
                  <div class="section-header">
                    <div class="section-number">2</div>
                    <h3>Direccion de envio</h3>
                  </div>
                  <div class="section-content">
                    <div class="form-group">
                      <label for="address">Direccion</label>
                      <input type="text" class="form-control" name="adress" id="adress" placeholder="Direccion" required="">
                    </div>
                    <div class="row">
                      <div class="col-md-8 form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Ciudad" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="country">Pais</label>
                      <select class="form-select" id="country" name="country" required="">
                        <option value="">Seleccion tu pais</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Peru">Peru</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Argentina">Argentina</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Order Review -->
                <div class="checkout-section" id="order-review">
                  <div class="section-header">
                    <div class="section-number">4</div>
                    <h3>Revisar &amp; Realizar Orden</h3>
                  </div>
                  <div class="section-content">
                    <div class="form-check terms-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms" required="">
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                      </label>
                    </div>
                    <div class="success-message d-none">Your order has been placed successfully! Thank you for your purchase.</div>
                    <div class="place-order-container">
                      <button type="submit" class="btn btn-primary place-order-btn">
                      Realizar pedido
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-5">
            <!-- Order Summary -->
            <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
              <div class="order-summary-header">
                <h3>Resumen del pedido</h3>
              </div>

              <div class="order-summary-content">
                @foreach ($cart['items'] as $item)
                <div class="order-items">
                  <div class="order-item">"
                    <div class="order-item-image">
                      <img src="{{ asset('storage/'.$item['image']) }}" alt="Product" class="img-fluid">
                    </div>
                    <div class="order-item-details">
                      <h4>{{$item['name']}}</h4>
                      <div class="order-item-price">
                        <span class="quantity">x{{$item['quantity']}}</span>
                        <span class="price">${{$item['price']}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach


                <div class="order-totals" >
                  <div class="order-subtotal d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span>${{$cart['subtotal']}}</span>
                  </div>
                  <div class="order-tax d-flex justify-content-between">
                    <span>Iva</span>
                    <span>${{$cart['iva']}}</span>
                  </div>
                  <div class="order-total d-flex justify-content-between">
                    <span>Total</span>
                    <span>${{$cart['total']}}</span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Checkout Section -->

  </main>

@endsection