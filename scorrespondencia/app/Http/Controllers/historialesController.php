<?php

namespace App\Http\Controllers;

use App\historial;
use DB;
use Illuminate\Http\Request;

class historialesController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla historial
    public function index(){
        //se retornan los valores de los registros de la tabla historial
    	return DB::table('historials')->get();
    }

    //metodo del controlador para agregar un registro de historial mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request recibido
        $historial = new historial();
        $historial->descripcion = $request->descripcion;
        $historial->id_estado = $request->id_estado;
        $historial->id_solicitud = $request->id_solicitud;
        $historial->id_usuario = $request->id_usuario;
        $historial->fecha = date("Y-m-d");

        //Verificando si se adjunto un archivo
        if($request->hasFile('ruta')){
            $file = $request->file('ruta');
            $tituloimagen = 'AA_'.$historial->fecha.'_'.$historial->descripcion;
            $file->move(public_path().'/assets/archivos/adjunto/', $tituloimagen);
        } 
        
        //se guardan los valores
        $historial->save();
        //se retorna la historial guardado
        return $historial;
    }

    //Metodo para actualizar historial
    public function update(Request $request){
        $historial = historial::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $historial->descripcion = $request->descripcion;
        $historial->id_estado = $request->id_estado;
        $historial->id_solicitud = $request->id_solicitud;
        $historial->id_usuario = $request->id_usuario;
        $historial->fecha = $request->fecha;

        $historial->save();
    }

    public function show($id){
        $historial = historial::find($id);
        return $historial;
    }

    //metodo para eliminar registro de la tabla historial
    public function destroy($id)
    {
    	//se busca a la historial que se quiere eliminar
        $historial = historial::find($id);
        $historial->delete();
    }

    public function getEstadoPeticion($id){
        return DB::table('historials')->join('estados', 'historials.id_estado', '=', 'estados.id')->select('historials.*', 'estados.nombre as estado')->where('historials.id_solicitud','=',$id)->orderBy('historials.created_at', 'desc')->limit(1)->get()->toArray();
    }

    public function getHistorial($id){
        return DB::table('historials')->join('estados', 'historials.id_estado', '=', 'estados.id')->select('historials.*', 'estados.nombre as estado')->where('historials.id_solicitud','=',$id)->orderBy('historials.created_at', 'desc')->get()->toArray();
    }
}
