@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Imagen</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar imagen de producto</h5>
                <form action="{{route('products.update.image', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="image">Selecciona la nueva imagen</label>
                    <input type="file" name="image" id="image" class="form-control">

                    <button class="btn btn-warning mt-3" type="submit">Actualizar Imagen</button>
                    <a href="{{route('products')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

