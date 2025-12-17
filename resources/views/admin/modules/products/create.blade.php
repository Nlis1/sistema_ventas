@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Productos</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar un nuevo producto</h5>
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="category_id">Categorias</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">Selecciona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <label for="proveedor_id">Proveedor</label>
                    <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                        @endforeach
                    </select>

                    <label for="name">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" id="name" required>

                    <label for="description">Descripcion del producto</label>
                    <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>

                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image"><br>

                    <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    <a href="" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

