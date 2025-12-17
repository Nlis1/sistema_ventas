@extends('admin.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h>
    </div><!-- End Page Title -->

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title">Administrar Usuarios</h5>
              <p>Administrar las cuentas y roles de usuarios.</p>

              <!-- Table with stripped rows -->
              <a  href="{{route('users.create')}}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Agregar nuevo usuario </a>
              <table class="table datatable">
                <thead>
                  <tr>
                   <th class="text-center">Email</th>
                   <th class="text-center">Nombre</th>
                   <th class="text-center">Rol</th>
                   <th class="text-center">Cambio Contraseña</th>
                   <th class="text-center">Activo</th>
                   <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody id="tbody-users">
                  @include('modules.users.tbody')
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@include('admin.modules.users.modal_cambiar_password');

@endsection

@push('scripts')
    <script>

      function recargar_tbody(){
        $.ajax({
          type: 'GET',
          url: "{{route('users.tbody')}}",
          success: function (respuesta){
            console.log(respuesta);
          }
        })
      }

      function cambiar_estado(id, estado){
        $.ajax({
          type: "GET",
          url: "admin/users/cambiar-estado/" + id + "/" + estado,
          success: function(respuesta){
            if(respuesta == 1){
               Swal.fire({
                  title: "Exito!",
                  icon: "success",
                  text: "Cambio de estado exitoso!",
                  confirmButtonText: 'Aceptar',
                  draggable: true
                });
              recargar_tbody();
            }else{
                 Swal.fire({
                  title: "Fallo!",
                  icon: "error",
                  text: "No se llevo a cabo el cambio!",
                  confirmButtonText: 'Aceptar',
                  draggable: true
                });
              }
          }
        });
      }

      function agregar_id_usuario(id){
        $('#id_user').val(id);
      }

      function cambio_password(){
        let id= $('#id_user').val();
        let password = $('#password').val();

        $.ajax({
          type: 'GET',
          url: "admin/users/cambiar-password/" + id + "/" + password,
          success: function(respuesta){
            console.log(respuesta)
            if(respuesta == 1){
              Swal.fire({
                  title: "Exito!",
                  icon: "success",
                  text: "Cambio de contraseña exitoso!",
                  confirmButtonText: 'Aceptar',
                  draggable: true
                });
              $('#frmPassword')[0].reset();
            }else{
                  Swal.fire({
                  title: "Fallo!",
                  icon: "error",
                  text: "No se llevo a cabo el cambio!",
                  confirmButtonText: 'Aceptar',
                  draggable: true
                });
            }
          }

        });

        return false
      }

      $(document).ready(function(){
        $('.form-check-input').on("change", function(){
          let id=$(this).attr("id");
          let estado = $(this).is(":checked") ? 1 : 0;
          cambiar_estado(id,estado);
        });
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

