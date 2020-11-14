<?php

namespace App\Http\Controllers;

use App\solicitudes;
use DB;
use Illuminate\Http\Request;

class solicitudesController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla solicitudes
    public function index(){
        //se retornan los valores de los registros de la tabla solicitudes
    	return DB::table('solicitudes')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $solicitud = new solicitudes();
        $solicitud->p_nombre = $request->p_nombre;
        $solicitud->p_apellido_p = $request->p_apellido_p;
        $solicitud->p_apellido_m = $request->p_apellido_m;
        $solicitud->p_celular = $request->p_celular;
        $solicitud->p_fijo = $request->p_fijo;
        $solicitud->p_correo = $request->p_correo;
        $solicitud->p_id_colonia = $request->p_id_colonia;
        $solicitud->p_calle_p = $request->p_calle_p;
        $solicitud->p_calle_1 = $request->p_calle_1;
        $solicitud->p_calle_2 = $request->p_calle_2;
        $solicitud->p_numero_e = $request->p_numero_e;
        $solicitud->p_referencias = $request->p_referencias;
        $solicitud->s_descripcion = $request->s_descripcion;
        $solicitud->s_tipo = $request->s_tipo;
        $solicitud->s_id_servicio = $request->s_id_servicio;
        $solicitud->s_id_prioridad = $request->s_id_prioridad;
        $solicitud->b_solicitante = $request->b_solicitante;
        $solicitud->b_nombre = $request->b_nombre;
        $solicitud->b_apellido_p = $request->b_apellido_p;
        $solicitud->b_apellido_m = $request->b_apellido_m;
        $solicitud->b_celular = $request->b_celular;
        $solicitud->b_fijo = $request->b_fijo;
        $solicitud->b_correo = $request->b_correo;
        $solicitud->s_id_colonia = $request->s_id_colonia;
        $solicitud->s_calle_p = $request->s_calle_p;
        $solicitud->s_calle_1 = $request->s_calle_1;
        $solicitud->s_calle_2 = $request->s_calle_2;
        $solicitud->s_numero_e = $request->s_numero_e;
        $solicitud->s_referencias = $request->s_referencias;
        //se guardan los valores
        $solicitud->save();
        //se retorna la solicitud guardado
        return $solicitud;
    }

    //Metodo para actualizar solicitud
    public function update(Request $request){
        $solicitud = solicitudes::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $solicitud->p_nombre = $request->p_nombre;
        $solicitud->p_apellido_p = $request->p_apellido_p;
        $solicitud->p_apellido_m = $request->p_apellido_m;
        $solicitud->p_celular = $request->p_celular;
        $solicitud->p_fijo = $request->p_fijo;
        $solicitud->p_correo = $request->p_correo;
        $solicitud->p_id_colonia = $request->p_id_colonia;
        $solicitud->p_calle_p = $request->p_calle_p;
        $solicitud->p_calle_1 = $request->p_calle_1;
        $solicitud->p_calle_2 = $request->p_calle_2;
        $solicitud->p_numero_e = $request->p_numero_e;
        $solicitud->p_referencias = $request->p_referencias;
        $solicitud->s_descripcion = $request->s_descripcion;
        $solicitud->s_tipo = $request->s_tipo;
        $solicitud->s_id_servicio = $request->s_id_servicio;
        $solicitud->s_id_prioridad = $request->s_id_prioridad;
        $solicitud->b_solicitante = $request->b_solicitante;
        $solicitud->b_nombre = $request->b_nombre;
        $solicitud->b_apellido_p = $request->b_apellido_p;
        $solicitud->b_apellido_m = $request->b_apellido_m;
        $solicitud->b_celular = $request->b_celular;
        $solicitud->b_fijo = $request->b_fijo;
        $solicitud->b_correo = $request->b_correo;
        $solicitud->s_id_colonia = $request->s_id_colonia;
        $solicitud->s_calle_p = $request->s_calle_p;
        $solicitud->s_calle_1 = $request->s_calle_1;
        $solicitud->s_calle_2 = $request->s_calle_2;
        $solicitud->s_numero_e = $request->s_numero_e;
        $solicitud->s_referencias = $request->s_referencias;

        $solicitud->save();
    }

    public function show($id){
        $solicitud = solicitudes::find($id);
        return $solicitud;
    }

    //metodo para eliminar registro de la tabla solicitudes
    public function destroy($id)
    {
    	//se busca a la solicitud que se quiere eliminar
        $solicitud = solicitudes::find($id);
        $solicitud->delete();
    }
}
