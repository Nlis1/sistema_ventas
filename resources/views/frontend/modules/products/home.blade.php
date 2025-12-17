@extends('frontend.layouts.main')

@section('titulo', $titulo)

@section('contenido')
  <main class="main">


    <!-- Best Sellers Section -->
    <section id="best-sellers" class="best-sellers section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Productos</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5" id="listar-products">
       
          <!-- End Product 1 -->

        </div>
      </div>

    </section><!-- /Best Sellers Section -->
  </main>


@endsection

