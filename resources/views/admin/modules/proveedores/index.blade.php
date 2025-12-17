@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Proveedores</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Proveedores</h5>

              <!-- Table with stripped rows -->
              <a  href="{{route('proveedores.create')}}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Agregar nuevos proveedores </a>
              <table class="table datatable">
                <thead>
                  <tr>
                   <th class="text-center">Nombre </th>
                   <th class="text-center">Telefono</th>
                   <th class="text-center">Email</th>
                   <th class="text-center">CP</th>
                   <th class="text-center">Sitio web</th>
                   <th class="text-center">Nota</th>
                   <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr class="text-center">  
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>  
                    <td>{{$item->cp}}</td>  
                    <td>{{$item->sitio_web}}</td>  
                    <td>{{$item->notas}}</td>  
                    <td>
                      <a href="{{route('proveedores.edit', $item->id)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="{{route('proveedores.destroy', $item->id)}}" method="POST" class="delete-form">
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

