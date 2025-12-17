@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Categoria</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar Nueva Categoria</h5>
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <label for="name">Nombre de categoria</label>
                    <input type="text" class="form-control" name="name" id="name" required>

                    <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    <a href="{{route('categories')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

