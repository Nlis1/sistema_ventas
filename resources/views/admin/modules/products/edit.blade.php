@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Productos</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar Producto</h5>
                <form action="{{route('products.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="category_id">Categorias</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">Selecciona una categoria</option>
                        @foreach ($categories as $category)
                            @if ($item->category_id == $category->id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="proveedor_id">Proveedor</label>
                    <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            @if ($item->proveedor_id == $proveedor->id)
                                <option selected value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                            @else
                                <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="name">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}" required>

                    <label for="description">Descripcion del producto</label>
                    <textarea name="description" id="description" cols="20" rows="5" class="form-control"> {{$item->description}}</textarea>

                    <label for="price_venta">Precio de ventas</label>
                    <input type="text" id="price_venta" name="price_venta" class="form-control" value="{{$item->price_venta}}" required>

                    <button class="btn btn-warning mt-3" type="submit">Actualizar</button>
                    <a href="{{route('products')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

