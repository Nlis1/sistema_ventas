@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Proveedor</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar Proveedor</h5>
                <form action="{{route('proveedores.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}" required>

                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$item->phone}}" required>

                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$item->email}}" required>

                    <label for="cp">CP</label>
                    <input type="text" class="form-control" name="cp" id="cp" value="{{$item->cp}}" required>

                    <label for="sitio_web">Sitio Web</label>
                    <input type="text" class="form-control" name="sitio_web" id="sitio_web" value="{{$item->sitio_web}}" required>

                    <label for="notas">Notas</label>
                    <textarea name="notas" id="notas" class="form-control">{{$item->notas}}</textarea>

                    <button class="btn btn-primary mt-3" type="submit">Actualizar</button>
                    <a href="{{route('proveedores')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

