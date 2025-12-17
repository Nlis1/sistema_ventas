@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar Compras</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Compra nueva de:  {{$item->name}}</h5>
                <form action="{{route('compras.store')}}" method="POST">
                    @csrf
                    <input type="text" value="{{$item->id}}" id="id" name="id" hidden>

                    <label for="amount">Cantidad del producto</label>
                    <input type="text" name="amount" class="form-control" id="amount">

                    <label for="price_compra">Precio de compra</label>
                    <input name="price_compra" id="price_compra" class="form-control">

                    <button class="btn btn-primary mt-3" type="submit">Comprar</button>
                    <a href="" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

