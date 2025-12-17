@extends('frontend.layouts.main')

@section('titulo', $titulo)

@section('contenido')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Login</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="current">Login</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="login section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <div class="auth-container" data-aos="fade-in" data-aos-delay="200">

              <!-- Login Form -->
              <div class="auth-form login-form active">
                <div class="form-header">
                  <h3>Bienvenido de vuelta</h3>
                  <p>Inicia sesion con tu cuenta</p>
                </div>

                <form class="auth-form-content" method="post" action="{{route('loguear')}}">
                    @csrf
                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email" required="" autocomplete="email">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control"  name="password"  id="password" placeholder="Password" required="" autocomplete="current-password">
                    <span class="password-toggle">
                      <i class="bi bi-eye"></i>
                    </span>
                  </div>

                  <div class="form-options mb-4">
                    <div class="remember-me">
                      <input type="checkbox" id="rememberLogin">
                      <label for="rememberLogin">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Olvidaste la contraseña?</a>
                  </div>

                  <button type="submit" class="auth-btn primary-btn mb-3">
                    Iniciar Sesion
                    <i class="bi bi-arrow-right"></i>
                  </button>

                  <div class="switch-form">
                    <span>Don't have an account?</span>
                    <a href="{{route('register')}}" type="button" class="switch-btn" data-target="register">Crear cuenta</a>
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
          </div>
        </div>

      </div>

    </section><!-- /Login Section -->

  </main>

@endsection