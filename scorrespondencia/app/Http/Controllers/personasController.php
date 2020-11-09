<?php

namespace App\Http\Controllers;

use App\personas;
use DB;
use Illuminate\Http\Request;

class personasController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla personas
    public function index(){
        //se retornan los valores de los usuarios exceptuando el del super user
    	return DB::table('personas')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $persona = new personas();
        $persona->nombre = $request->nombre;
        $persona->apellido_p = $request->apellido_p;
        $persona->apellido_m = $request->apellido_m;
        $persona->cargo = $request->cargo;
        //Verificando si se tiene una imagen
        if($request->hasFile('ruta')){
            $file = $request->file('ruta');
            $tituloimagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/avatars/', $tituloimagen);
            $persona->ruta_foto = "/assets/images/avatars/".$tituloimagen;
        }
        else{//si no tiene se asigna una imagen por defecto
            $persona->ruta_foto = '/assets/images/avatars/1.jpg';
        }
        //se guardan los valores
        $persona->save();
        //se retorna la persona guardado
        return $persona;
    }

    //Metodo para actualizar persona
    public function update(Request $request){
        $persona = personas::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $persona->nombre = $request->nombre;
        $persona->apellido_p = $request->apellido_p;
        $persona->apellido_m = $request->apellido_m;
        $persona->cargo = $request->cargo;
        //Verificando si se tiene una imagen
        if($request->hasFile('foto_ruta')){
            $file = $request->file('foto_ruta');
            $tituloimagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/avatars/', $tituloimagen);
            $persona->ruta_foto = "/assets/images/avatars/".$tituloimagen;
        }

        $persona->save();
    }

    public function show($id){
        $persona = personas::find($id);
        return $persona;
    }

    //metodo para eliminar registro de la tabla personas
    public function destroy($id)
    {
    	//se busca a la persona que se quiere eliminar
        $persona = personas::find($id);
        $persona->delete();
    }
}
