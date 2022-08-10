<?php

use Illuminate\Support\Facades\Route;

// ES IMPORTANTE PONER LA RUTA PARA PODER LLAMAR A LA CLASES Y FUNCIONES
use App\Http\Controllers\tareas_controler;

use App\Http\Controllers\categoriasControler;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/inicio', function () {
    return view('index');
});

// creo dirreccion 'tar' donde va estar el file tareas
Route::get('/tar', function(){
    return view('contenido/tareas');
});


// Primero recibimos un llamada POST de la ruta '/tar' y despues
// llamamos a la clase 'tareas_controler' y a su funcion 
// la funcion '->name()' es para ponerle un apodo a la ruta, esto ayuda a que si le
// quiero cambiar la direccion de '/tar' , no este en todos los archivos cambiando la ruta
// Es como un identificador enves por la ruta , se indetifica por el apodo asi puedo 
// cambiar la ruta sin que afecte
Route::post('/tar', [tareas_controler::class, 'guardar'])->name('apodoRutaGuardar');


// GET (en laravel) al entra a la page llama a la funcion 'mostrarAll' de la clase tareas_controller
// que muestra todos los datos de la BDD 
Route::get('/tar', [tareas_controler::class, 'mostrarAll'])->name('apodoRutaMostrar');


// Al llamar a este rutaa se ocupa un ID (que la viene en los item)
// Lo que hacemos es darle un ID a la funcion 'mostrarID', y la funcion
// busca los datos del ID que le dimos para mostrarlo en la page y poder actualizar
Route::get('/tar/{idMostrar}', [tareas_controler::class, 'mostrarId'])->name('apodoRutaMostrarId');

// PATCH es para actualizar un objeto 
Route::patch('/tar/{idUpdate}', [tareas_controler::class, 'actualizarId'])->name('apodoRutaActualizarId');

Route::delete('tar/{idDelete}',[tareas_controler::class,'eliminarId'])->name('apodoRutaEliminar');

// ----------------------------------------------------Categorias 

// Route::get('/cat', function () {
//     return view('contenidoCat/categorias');
// });


Route::resource('/cat', categoriasControler::class);
