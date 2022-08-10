<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoriasTareas;

class categoriasControler extends Controller
{
    public function index()
    {
        $datosCategoriasAll=categoriasTareas::all();
        return view('contenidoCat.categorias',['arrayCategorias'=> $datosCategoriasAll]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'input_titulo_cat'=>'required|min:3',
            'input_color_cat'=> 'required|max:7',
        ]);


        $objCategoria= new categoriasTareas();
        $objCategoria->titulo_categoria=$request->input_titulo_cat;
        $objCategoria->color_categoria=$request->input_color_cat;

        $objCategoria->save();

        return redirect()->route('cat.index')->with('success','Guardado Exitosamente New Categoria Alexander');
    }

    public function show($id)
    {
        $idDatos=categoriasTareas::find($id);
        return view('contenidoCat.actualizarCat',['ArrayIdActualizarCat'=>$idDatos]);
    }

    public function update(Request $request, $id)
    {
        $idDatoUpdate=categoriasTareas::find($id);

        $idDatoUpdate->titulo_categoria=$request->input_titulo_update_cat;
        $idDatoUpdate->save();
        return redirect()->route('cat.index')->with('success','Actualizada Correctamente categoria');
    }

    public function destroy($idEliminarr)
    {
        $idDatosEliminar=categoriasTareas::find($idEliminarr);
        $idNombre=$idDatosEliminar->titulo_categoria;
        $idDatosEliminar->delete();
        return redirect('/cat')->with('success','Delete Exitosamente  Categoria: '.$idNombre);
    }
}
