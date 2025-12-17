@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Proveedor</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar Nuevo Proveedor</h5>
                <form action="{{route('proveedores.store')}}" method="POST">
                    @csrf
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>

                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>

                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>

                    <label for="cp">CP</label>
                    <input type="text" class="form-control" name="cp" id="cp" required>

                    <label for="sitio_web">Sitio Web</label>
                    <input type="text" class="form-control" name="sitio_web" id="sitio_web" required>

                    <label for="notas">Notas</label>
                    <textarea name="notas" id="notas" class="form-control"></textarea>

                    <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    <a href="{{route('proveedores')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

