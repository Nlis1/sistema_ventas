@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Usuarios</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar Usuario</h5>
                <form action="{{route('users.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$item->email}}" required>

                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}" required>

                    <label for="rol">Rol de usuario</label>
                    <select name="rol" id="rol" class="form-select">
                        <option value="">Selecciona el rol</option>
                        @if ($item->rol == 'admin')
                            <option value="admin" selected>Admin</option>
                            <option value="cajero">Cajero</option>
                        @else
                            <option value="admin" >Admin</option>
                            <option value="cajero" selected>Cajero</option>
                        @endif
                    </select>

                    <button class="btn btn-primary mt-3" type="submit">Actualizar</button>
                    <a href="{{route('users')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

