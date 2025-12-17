@extends('frontend.layouts.main')

@section('titulo', $titulo)

@section('contenido')
 <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Register</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="current">Register</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="register section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="registration-form-wrapper">
              <div class="form-header text-center">
                <h2>Crea tu usuario</h2>
                <p>Crea tu cuenta y compra con nosotros</p>
              </div>

              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <form action="{{route('store')}}" method="POST" >
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="fullName" name="name" placeholder="Full Name" required="" autocomplete="name">
                      <label for="fullName">Nombres </label>
                    </div>

                     <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Last Name" required="" autocomplete="name">
                      <label for="fullName">Apellidos</label>
                    </div>

                     <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" required="" autocomplete="name">
                      <label for="fullName">Telefono</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="" autocomplete="email">
                      <label for="email">Correo</label>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" minlength="8" autocomplete="new-password">
                          <label for="password">Contraseña</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required="" minlength="8" autocomplete="new-password">
                          <label for="confirmPassword">Repetir Contraseña</label>
                        </div>
                      </div>
                    </div>

                    <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" id="termsCheck" name="termsCheck" required="">
                      <label class="form-check-label" for="termsCheck">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                      </label>
                    </div>

                    <div class="d-grid mb-4">
                      <button type="submit" class="btn btn-register">Crear cuenta</button>
                    </div>

                    <div class="login-link text-center">
                      <p>Already have an account? <a href="#">Sign in</a></p>
                    </div>
                  </form>
                   <div>
                        @if ($errors->any())
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        @endif
                    </div>
                </div>
              </div>

              <div class="decorative-elements">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
                <div class="square square-1"></div>
                <div class="square square-2"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Register Section -->

  </main>
  @endsection

