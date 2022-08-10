@extends('header')
@section('header-page')

{{-- Rutas Patch, delete, get, post laravel --}}
{{-- https://www.youtube.com/watch?v=0vBsjIAcor4 --}}

<h1 class='text-center pt-5'>Actualizar Tareas</h1>
<div class='container bg-dark w-25 p-5 my-5 rounded border shadow-lg p-1 mb-5  rounded'>
    
    {{-- Enves de poner la ruta donde se envia la info del form ej; action='tar' 
    le pongo un apodo con la funcion '->name'  (esta en otro file)
      --}}
    <form method="POST" action="{{ route('apodoRutaActualizarId', ['idUpdate'=>$arrayDatosId->id]) }}">
        @method('patch')
        {{-- Sirve para la seguridad, para que no se inyecte codigo sql --}}
        @csrf

        {{-- si la info enviada del 'input_titulo' es incorrecta entre  --}}
        @error('input_titulo_update')
            {{-- por defecto laravel tiene una variable de menssage nos muestra el error en este caso
              ya que si entro en esta setencia es porque hay un error --}}
            <p class="alert alert-danger">{{ $message; }}</p>
        @enderror

        
        <div class="mb-3">
        <label for="input_titulo" class="form-label text-white">Tarea</label>
        <input type="text" class="form-control" name="input_titulo_update" placeholder="Tarea" value="{{ $arrayDatosId->titulo}}">
        </div>
        <button type="submit" class="btn btn-light">Actualizar</button>
    </form>
</div>

@endsection