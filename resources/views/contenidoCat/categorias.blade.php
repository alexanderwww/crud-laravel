
@extends('header')
@section('header-page')

<h1 class='text-center pt-5'>Agregar Categorias</h1>
<div class='container bg-dark w-25 p-5 my-5 rounded border shadow-lg p-1 mb-5  rounded'>
  

    <form method="POST" action="{{route('cat.store')}}">
                <!-- {{-- Sirve para la seguridad, para que no se inyecte codigo sql --}} -->
        @csrf

        <!-- {{-- Nos muestra si la info enviada es correcta --}} -->
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <!-- {{-- si la info enviada del 'input_titulo' es incorrecta entre  --}} -->
        @error('input_titulo_cat')
            <!-- {{-- por defecto laravel tiene una variable de menssage nos muestra el error en este caso
              ya que si entro en esta setencia es porque hay un error --}} -->
            <p class="alert alert-danger">{{ $message; }}</p>
        @enderror
        
        <div class="mb-3">
        <label for="input_titulo_" class="form-label text-white">Categoria</label>
        <input type="text" class="form-control" name="input_titulo_cat" placeholder="Categoria">
        </div>
        <div class="mb-3">
            <label for="input_color_cat" class="form-label text-white">Color</label>
            <input type="color" class="form-control form-control-color" value="#000" name="input_color_cat">    
        </div>
        <button type="submit" class="btn btn-light">Agregar</button>
        
    </form>
</div>

<p>{{ $arrayCategorias }}</p>

<table class="table w-50 container">

  <thead style="background-color:#222; color:#fff">

    <tr>
      <th scope="col">#</th>
      <th scope="col">CategoriaT</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>

  </thead>
  <tbody>

    @foreach ($arrayCategorias as $item)
    <tr style="background-color: {{$item->color_categoria}}">
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->titulo_categoria}}</td>
      <td>
        <!-- {{-- Nos direccionamos a la ruta 'cat.update' y le enviamos el ID a Actualizar para que muestre la info a update --}} -->
        <a href="{{ route('cat.show',['cat'=>$item->id]) }}" class="btn btn-primary">Actualizar</a>
      </td>
      <td>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Eliminar
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseas Eliminar Esta Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Al Eliminar esta categoria se eliminaran todas las Tareas relacionadas con la Categoria
                <br>
                <div>
                  <form>
                    <div class="mb-3">
                      <label class="form-label">ID</label>
                      <input type="text" class="form-control" placeholder="Categoria" value="{{$item->id}}" readonly>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Categoria</label>
                      <input type="text" class="form-control" placeholder="Categoria" value="{{$item->titulo_categoria}}" readonly>
                    </div>
                  </form>
                  </div>
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="{{ route('cat.destroy', ['cat'=>$item->id]) }} " method="post">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="Delete" class="btn btn-danger" >
                  </form>
              </div>
            </div>
          </div>
        </div>

      </td>
    </tr>
    @endforeach

  </tbody>

</table>




<p>Validacion de form <a href="https://www.youtube.com/watch?v=Aqp3oHiy_R4">Link</a></p>



Para poner templates, 1ro se ocupa poner el link del file con: extends('ruta'),
luego con: section('ElContenidoQuesevaALlamar'), y cerramos la etiqueta con endsection
ESTO ES CODIGO BLADE, 
NOTA: PARA PODER LLAMAR A UNA SECTION SE OCUPA MARCAR 1RO,
CON; yield('NombreQueLevamosAdarParaLocalizarlo')


@endsection



