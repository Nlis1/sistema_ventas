@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Productos</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-15">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Productos</h5>

              <!-- Table with stripped rows -->
              <a  href="{{route('products.create')}}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Agregar nuevos productos </a>
              <table class="table datatable">
                <thead>
                  <tr>
                   <th class="text-center">Categoria</th>
                   <th class="text-center">Proveedor</th>
                   <th class="text-center">Nombre</th>
                   <th class="text-center">Imagen</th>
                   <th class="text-center">Description</th>
                   <th class="text-center">Cantidad</th>
                   <th class="text-center">Venta</th>
                   <th class="text-center">Iva</th>
                   <th class="text-center">Compra</th>
                   <th class="text-center">Activo</th>
                   <th class="text-center">Comprar</th>
                   <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">  
                    <td>{{$item->name_category}}</td>
                    <td>{{$item->name_proveedor}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                     <img src="{{ asset('storage/'.$item->image_product) }}" alt="" width="60">
                     <a href="{{route('products.show.image', $item->image_id)}}" class="badge bg-warning text-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>  
                    <td>{{$item->description}}</td>  
                    <td>{{$item->quantity}}</td>  
                    <td>${{$item->price_venta}}</td>  
                    <td>{{$item->iva}}%</td>  
                    <td>${{$item->price_compra}}</td>  
                     <td class="text-center">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="{{$item->id}}" 
                          {{$item->activo ? 'checked' : ''}}>
                        </div>
                    </td>  
                    <td><a href="{{route('compras.create', $item->id)}}" class="btn btn-info">Comprar</a></td>  
                    <td>
                      <a href="{{route('products.edit', $item->id)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="{{route('products.destroy', $item->id)}}" method="POST" class="delete-form">
                        @csrf
                        @method("DELETE") 
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection

@push('scripts')
     <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    Swal.fire({
                        title: "¿Estas seguro?",
                        text: "Tu no puedes revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                })
            });
        </script>

    <script>
      @if (session('success'))
        Swal.fire({
          title: "Exito!",
          icon: "success",
          text: "{{session('success')}}",
          confirmButtonText: 'Aceptar',
          draggable: true
        });
      @endif

      @if (session('error'))
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "{{session('error')}}",
          confirmButtonText: 'Aceptar',
          draggable: true
        });
      @endif
    </script>
@endpush

