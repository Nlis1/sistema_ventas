@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pedidos</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Pedidos</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                   <th>Codigo del Pedido</th>
                   <th>Total </th>
                   <th>Subtotal </th>
                   <th>Iva</th>
                   <th>Estado</th>
                   <th>Direccion</th>
                   <th>Ciudad</th>
                   <th>Pais</th>
                   <th>Usuario</th>
                   <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                  <tr>  
                    <td>{{$item->code_order}}</td>
                    <td>{{$item->total}}</td>
                    <td>{{$item->subtotal}}</td>
                    <td>{{$item->iva}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->adress}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->country}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>  
                      <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="" method="POST" class="delete-form">
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

