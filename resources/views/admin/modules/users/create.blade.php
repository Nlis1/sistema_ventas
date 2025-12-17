@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Usuarios</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar Nuevo Usuario</h5>
                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>

                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>

                    <label for="password">Cambiar contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>

                    <label for="rol">Rol de usuario</label>
                    <select name="rol" id="rol" class="form-select">
                        <option value="">Selecciona el rol</option>
                        <option value="admin">Admin</option>
                        <option value="cajero">Cajero</option>
                    </select>

                    <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    <a href="{{route('users')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

