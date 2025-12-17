@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Compra</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edicion de: {{$item->name_product}}</h5>
                <form action="{{route('compras.update', $item->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <input type="text" id="product_id" name="product_id"  value="{{$item->product_id}}" hidden>

                    <label for="amount">Cantidad del producto</label>
                    <input type="text" name="amount" class="form-control" id="amount" value="{{$item->amount}}">

                    <label for="price_compra">Precio de compra</label>
                    <input name="price_compra" id="price_compra" class="form-control" value="{{$item->price_compra}}">

                    <button class="btn btn-warning mt-3" type="submit">Actualizar compra</button>
                    <a href="{{route('compras')}}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

