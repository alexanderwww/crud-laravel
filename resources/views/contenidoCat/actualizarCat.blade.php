@extends('header')
@section('header-page')

<h1 class='text-center pt-5'>Actualizar Categoria</h1>
<div class='container bg-dark w-25 p-5 my-5 rounded border shadow-lg p-1 mb-5  rounded'>
    
    <form method="POST" action="{{ route('cat.update', ['cat'=>$ArrayIdActualizarCat->id]) }}">
        @method('patch')
        @csrf

        {{-- si la info enviada del 'input_titulo' es incorrecta entre  --}}
        @error('input_titulo_update_cat')
            {{-- por defecto laravel tiene una variable de menssage nos muestra el error en este caso
              ya que si entro en esta setencia es porque hay un error --}}
            <p class="alert alert-danger">{{ $message; }}</p>
        @enderror

        
        <div class="mb-3">
        <label for="input_titulo" class="form-label text-white">Actualizar Categoria</label>
        <input type="text" class="form-control" name="input_titulo_update_cat" placeholder="Tarea" value="{{ $ArrayIdActualizarCat->titulo_categoria}}">
        </div>
        <button type="submit" class="btn btn-light">Actualizar</button>
    </form>

    @if ($tareasDiarias->MostrarAllTareas->count()>0)
        <H1>Tiene Tareas Esta categoria</H1>

        FALLA CURSO NO ENTENDIMIENTO DE LA RELACIONES DE TABLAS, FALLA EN OBTENCIOS DE tareasDiarias QUE TIENEN LA MISMA CATEGORIA,
        LA FUNCION MostrarAllTareas NO CONECTA CON LA BDD

    @else
        <H1>Noo Tiene Tareas Esta categoria</H1>        
    @endif

</div>

@endsection