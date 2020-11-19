<?php

namespace App\Http\Controllers;

use App\usuarios;
use DB;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla usuarios
    public function index(){
    	//se obtienen los registros de usuarios junto con los datos de persona y rol que nos interesan
    	return DB::table('usuarios')->join('personas', 'usuarios.id_persona', '=', 'personas.id')->join('roles', 'usuarios.id_rol', '=', 'roles.id')->select('usuarios.*', 'personas.nombre as nombre_persona', 'personas.apellido_p', 'personas.apellido_m', 'personas.cargo', 'personas.ruta_foto', 'roles.nombre as nombre_rol')->get();
    	//return DB::table('usuarios')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request recibido
        $usuario = new usuarios();
        $usuario->nombre = $request->nombre;
        $usuario->contraseña = $request->contraseña;
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;
       
        //se guardan los valores
        $usuario->save();
        //se retorna la usuario guardado
        return $usuario;
    }

    //Metodo para actualizar usuario
    public function update(Request $request){
        $usuario = usuarios::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $usuario->nombre = $request->nombre;
        $usuario->contraseña = $request->contraseña;
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;

        $usuario->save();
    }

    public function show($id){
        $usuario = usuarios::find($id);
        return $usuario;
    }

    //metodo para eliminar registro de la tabla usuarios
    public function destroy($id)
    {
    	//se busca al usuario que se quiere eliminar
        $usuario = usuarios::find($id);
        $usuario->delete();
    }

    //metodo para acceder mediante el login
    public function acceder(Request $request)
    {
        //se busca al usuario que se quiere eliminar
        return $usuario = DB::table('usuarios')->join('personas', 'usuarios.id_persona', '=', 'personas.id')->join('roles', 'usuarios.id_rol', '=', 'roles.id')->select('usuarios.*', 'personas.nombre as nombre_persona', 'personas.apellido_p', 'personas.apellido_m', 'personas.cargo', 'personas.ruta_foto', 'roles.nombre as nombre_rol')->where('usuarios.nombre','=',$request->usuario)->where('usuarios.contraseña','=',$request->contrasena)->get()->toArray();
        
        if($usuario!=null){
            $request->session()->put('data',$usuario);
            redirect('index');
        }else{
            redirect('login');
        }

    }
}
