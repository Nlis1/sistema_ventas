@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Compras</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-15">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Compras</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                   <th class="text-center">Usuario</th>
                   <th class="text-center">Producto</th>
                   <th class="text-center">Cantidad</th>
                   <th class="text-center">Precio de compra</th>
                   <th class="text-center">Total compra</th>
                   <th class="text-center">Fecha</th>
                   <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="text-center">  
                    <td>{{$item->name_user}}</td>
                    <td>{{$item->name_product}}</td>
                    <td>{{$item->amount}}</td>  
                    <td>${{$item->price_compra}}</td>  
                    <td>${{$item->price_compra * $item->amount}}</td>  
                    <td>{{$item->created_at}}</td>  
                    <td>
                      <a href="{{route('compras.edit', $item->id)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="{{route('compras.destroy', $item->id)}}" method="POST" class="delete-form">
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

