@extends('header')
@section('header-page')

<h1 class='text-center pt-5'>Agregar Tareas</h1>
<div class='container bg-dark w-25 p-5 my-5 rounded border shadow-lg p-1 mb-5  rounded'>
    
     <!-- Enves de poner la ruta donde se envia la info del form ej; action='tar' 
    le pongo un apodo con la funcion '->name'  (esta en otro file) -->
    <form method="POST" action="{{ route('apodoRutaGuardar')}}">

        <!-- {{-- Sirve para la seguridad, para que no se inyecte codigo sql --}} -->
        @csrf

        <!-- {{-- Nos muestra si la info enviada es correcta --}} -->
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <!-- {{-- si la info enviada del 'input_titulo' es incorrecta entre  --}} -->
        @error('input_titulo')
            <!-- por defecto laravel tiene una variable de menssage nos muestra el error en este caso
              ya que si entro en esta setencia es porque hay un error -->
            <p class="alert alert-danger">{{ $message; }}</p>
        @enderror

        
        <div class="mb-3">
        <label for="input_titulo" class="form-label text-white">Tarea</label>
        <input type="text" class="form-control" name="input_titulo" placeholder="Tarea">
        <label for="inputSelect_id_categoria" class="form-label text-white">Categoria</label>
        <select class="form-select" name="inputSelect_id_categoria">
          @foreach ($arrayCategorias as $itemCategoria)
            <option value="{{$itemCategoria->id}}" >{{$itemCategoria->titulo_categoria}}</option>
          @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-light">Agregar</button>
    </form>

</div>

<!-- <p>{ $arrayDatos }}</p> -->

{{-- <p>{{$arrayCategorias}</p> --}}

<table class="table table-dark table-striped w-50 container">

  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Tituloo</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>

  </thead>
  <tbody>

    @foreach ($arrayDatosTareas as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->titulo}}</td>
      <td>
        <!-- {{-- Nos direccionamos a la ruta 'apodoRutaActualizar' y le enviamos el ID a Actualizar --}} -->
        <a href="{{ route('apodoRutaMostrarId',['idMostrar'=>$item->id]) }}" class="btn btn-primary">Actualizar</a>
      </td>
      <td>
        <form action="{{ route('apodoRutaEliminar', ['idDelete'=>$item->id])}} " method="post">
          @csrf
          @method('Delete')
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>

</table>


@endsection
