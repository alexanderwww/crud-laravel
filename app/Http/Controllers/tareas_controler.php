<?php

namespace App\Http\Controllers;

use App\Models\categoriasTareas;

use Illuminate\Http\Request;

// ES IMPORTANTE PONER LA RUTA , PARA USAr su CLASE ,
// EL ARCHIVO Model\tareasDiarias es el que conecta con la Bdd
use App\Models\tareasDiarias;

// Este archivo solo es un controlador, se puede poner esta clase en el 
// archivo donde van las rutas (web), pero no se va a ver bien es mejor crear un
// archivo donde solo este el codigo Y ESTE ES

class tareas_controler extends Controller
{
    public function mostrarAll(){
        // Para HACER un consulta nose ocupa crear un objeto 'new tareasDiarias'
        // solo cuando se valla a modificar la baseDD 
        $datosBdd=tareasDiarias::all();
        $datosCategorias=categoriasTareas::all();
        // creamos un array que tiene los datos de la variable $datosBdd
        //y enviamos ese array a la dirrecion que le pasemos, y en el html descromprimimos la info
        return view('contenido/tareas',['arrayDatosTareas'=> $datosBdd],['arrayCategorias'=>$datosCategorias]);
    }

    public function guardar(Request $request){
        // validamos con la funtion 'validate'
        $request->validate([
            'input_titulo'=>'required|min:3'
        ]);

        // creamos un objeto
        $conexControler=new tareasDiarias;
        // 'titulo' es el nombre de la columna de la base datos
        // Dice, el 'titulo' es igual al input de la page , (antes lo validamos para enviarlo a la bdd)
        $conexControler->titulo=$request->input_titulo;
        $conexControler->Id_categoria=$request->inputSelect_id_categoria;
        // Y lo guardamos en la Bdd
        $conexControler->save();
        
        //Lo que hace: Al enviar la info del form nos envia a la misma pagina, hay 2 metodos una es 
        // por la direccion normal 'redirect('/tar')' y el otro es por apodos de rutas que
        //  es la mas recomendable por si cambia la direccion
        // Y el 'with' dice nos direcciona con un mensaje si todo sale bien, solo mostramos el ms en la page con html
        return redirect()->route('apodoRutaGuardar')->with('success','Guarda exitosamente en la baseDD Kevin');

    }

    public function mostrarId($id){
        // buscamos el ID en la base de datos y lo almacenamos en una variable
        $datoId=tareasDiarias::find($id);
        // luego direccionamos a la page actualizar, con un array de los datos del ID que se quiere update
        return view('contenido/actualizar',['arrayDatosId'=> $datoId]);
    }

    public function actualizarId(Request $request ,$idUpdate){
        $datoId=tareasDiarias::find($idUpdate);
        $request->validate([
            'input_titulo_update'=>'required|min:3'
        ]);
        $datoId->titulo=$request->input_titulo_update;
        $datoId->save();
        
        // 'redirect' se interpreta como carga una pagina, lo que significa que carga todas las funcion 
        // como si fuera la 1re vez que entramos en the page 
        // return redirect('/tar')->with('success','Actualizada Correctamente');

        // Otra formar 
        return redirect()->route('apodoRutaMostrar')->with('success','Actualizada Correctamente222');


    }

    public function eliminarId($idEliminar){
        $datoId=tareasDiarias::find($idEliminar);
        $datoId->delete();
        return redirect('/tar')->with('success','Delete Correctamente');
    }

}

