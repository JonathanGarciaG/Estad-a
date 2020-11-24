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
        $usuario = DB::table('usuarios')->join('personas', 'usuarios.id_persona', '=', 'personas.id')->join('roles', 'usuarios.id_rol', '=', 'roles.id')->join('direcciones','direcciones.id_persona','=','personas.id')->select('usuarios.*', 'personas.nombre as nombre_persona', 'personas.apellido_p', 'personas.apellido_m', 'personas.cargo', 'personas.ruta_foto', 'direcciones.id as id_direccion', 'roles.nombre as nombre_rol')->where('usuarios.nombre','=',$request->usuario)->where('usuarios.contraseña','=',$request->contrasena)->get()->toArray();
        
        //$usuario[0]->nombre;
        if(isset($usuario[0])){
            $request->session()->put('data',$usuario);
            return redirect('index');
        }else{
            return redirect('login');
        }

    }

    public function getuser()
    {
        return session('data')[0]->id;
    }

    //metodo para salir de la sesion
    public function salir()
    {
        session()->forget('data');
        return redirect('login');
    }

    public function getRegistrosDashboardAdmin(){
        $datos = [0,0,0,0];
        //$informacion = DB::table('solicitudes')->join('historials', 'historials.id_solicitud', '=', 'solicitudes.id')->join('prioridades', 'prioridades.id', '=', 'solicitudes.s_id_prioridad')->join('servicios', 'servicios.id', '=', 'solicitudes.s_id_servicio')->join('colonias', 'colonias.id', '=', 'solicitudes.s_id_colonia')->join('direcciones', 'direcciones.id', '=', 'servicios.id_direccion')->join('personas', 'personas.id', '=', 'direcciones.id_persona')->select(DB::raw('solicitudes.*, historials.created_at as ultima, historials.descripcion, servicios.nombre as servicio, prioridades.nombre as prioridad, colonias.codigo_postal as codigo_p, colonias.nombre as colonia, direcciones.nombre as nombre_direccion, personas.nombre as nombre_director, personas.apellido_p as apellido_p_director, personas.apellido_m as apellido_m_director'))->where('historials.id_solicitud','=',$id)->orderBy('historials.created_at', 'desc')->limit(1)->get()->toArray();
        $informacion = DB::table('usuarios')->select(DB::raw('usuarios.*, count(*) as numero'))->get()->toArray();
        $datos[0] = $informacion[0]->numero;
        $informacion = DB::table('personas')->select(DB::raw('personas.*, count(*) as numero'))->get()->toArray();
        $datos[1] = $informacion[0]->numero;
        $informacion = DB::table('direcciones')->select(DB::raw('direcciones.*, count(*) as numero'))->get()->toArray();
        $datos[2] = $informacion[0]->numero;
        $informacion = DB::table('servicios')->select(DB::raw('servicios.*, count(*) as numero'))->get()->toArray();
        $datos[3] = $informacion[0]->numero;

        return $datos;
    }

    public function getUltimos(){
        $datos = DB::table('usuarios')->join('personas', 'usuarios.id_persona', '=', 'personas.id')->join('roles', 'usuarios.id_rol', '=', 'roles.id')->select('usuarios.*', 'personas.nombre as nombre_persona', 'personas.apellido_p', 'personas.apellido_m', 'personas.cargo', 'personas.ruta_foto', 'roles.nombre as nombre_rol')->orderBy('created_at')->get();
    }
}
