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
        return DB::table('solicitudes')->join('prioridades', 'solicitudes.s_id_prioridad', '=', 'prioridades.id')->select('solicitudes.*', 'prioridades.nombre as prioridad')->get();
    	//return DB::table('solicitudes')->join('prioridades', 'solicitudes.s_id_prioridad', '=', 'prioridades.id')->join('historials', 'solicitudes.id', '=', 'historials.id_solicitud')->select('solicitudes.*', 'prioridades.nombre as prioridad', 'historials.id_estado as estado')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
        $solicitud = new solicitudes();
        //Guardando los valores de la peticion
        if($request->p_nombre == '' || $request->p_apellido_p == '' || $request->p_apellido_m == ''){
            $solicitud->p_nombre = 'ANÓNIMO';
            $solicitud->p_apellido_p = 'N/A';
            $solicitud->p_apellido_m = 'N/A';
        }else{
            $solicitud->p_nombre = $request->p_nombre;
            $solicitud->p_apellido_p = $request->p_apellido_p;
            $solicitud->p_apellido_m = $request->p_apellido_m;
        }

        if ($request->p_celular == '') {
            $solicitud->p_celular = 'N/A';
        }else{
            $solicitud->p_celular = $request->p_celular;
        }
        
        if ($request->p_fijo == '') {
            $solicitud->p_fijo = 'N/A';
        }else{
            $solicitud->p_fijo = $request->p_fijo;
        }
        
        if ($request->p_correo == '') {
            $solicitud->p_correo = 'N/A';
        }else{
            $solicitud->p_correo = $request->p_correo;
        }

        if ($request->p_id_colonia == 0) {
            $solicitud->p_id_colonia = 2;
        }else{
            $solicitud->p_id_colonia = $request->p_id_colonia;
        }

        if ($request->p_calle_p == '') {
            $solicitud->p_calle_p = 'N/A';
        }else{
            $solicitud->p_calle_p = $request->p_calle_p;
        }

        if ($request->p_calle_1 == '') {
            $solicitud->p_calle_1 = 'N/A';
        }else{
            $solicitud->p_calle_1 = $request->p_calle_1;
        }

        if ($request->p_calle_2 == '') {
            $solicitud->p_calle_2 = 'N/A';
        }else{
            $solicitud->p_calle_2 = $request->p_calle_2;
        }

        if ($request->p_numero_e == '') {
            $solicitud->p_numero_e = 'N/A';
        }else{
            $solicitud->p_numero_e = $request->p_numero_e;
        }

        if ($request->p_referencias == '') {
            $solicitud->p_referencias = 'N/A';
        }else{
            $solicitud->p_referencias = $request->p_referencias;
        }    
        
        $solicitud->b_solicitante = $request->b_solicitante;

        if ($request->b_solicitante == 2) {
            $solicitud->b_nombre = $solicitud->p_nombre;
            $solicitud->b_apellido_p = $solicitud->p_apellido_p;
            $solicitud->b_apellido_m = $solicitud->p_apellido_m;
            $solicitud->b_celular = $solicitud->p_celular;
            $solicitud->b_fijo = $solicitud->p_fijo;
            $solicitud->b_correo = $solicitud->p_correo;
        }else{
            if($request->b_nombre == '' || $request->b_apellido_p == '' || $request->b_apellido_m == ''){
                $solicitud->b_nombre = 'ANÓNIMO';
                $solicitud->b_apellido_p = 'N/A';
                $solicitud->b_apellido_m = 'N/A';
            }else{
                $solicitud->b_nombre = $request->b_nombre;
                $solicitud->b_apellido_p = $request->b_apellido_p;
                $solicitud->b_apellido_m = $request->b_apellido_m;
            }

            if ($request->b_celular == '') {
                $solicitud->b_celular = 'N/A';
            }else{
                $solicitud->b_celular = $request->b_celular;
            }
            
            if ($request->b_fijo == '') {
                $solicitud->b_fijo = 'N/A';
            }else{
                $solicitud->b_fijo = $request->b_fijo;
            }
            
            if ($request->b_correo == '') {
                $solicitud->b_correo = 'N/A';
            }else{
                $solicitud->b_correo = $request->b_correo;
            }
        }
        
        if ($request->s_id_colonia == 0) {
            $solicitud->s_id_colonia = 2;
        }else{
            $solicitud->s_id_colonia = $request->s_id_colonia;
        }

        if ($request->s_calle_p == '') {
            $solicitud->s_calle_p = 'N/A';
        }else{
            $solicitud->s_calle_p = $request->s_calle_p;
        }

        if ($request->s_calle_1 == '') {
            $solicitud->s_calle_1 = 'N/A';
        }else{
            $solicitud->s_calle_1 = $request->s_calle_1;
        }

        if ($request->s_calle_2 == '') {
            $solicitud->s_calle_2 = 'N/A';
        }else{
            $solicitud->s_calle_2 = $request->s_calle_2;
        }

        if ($request->s_numero_e == '') {
            $solicitud->s_numero_e = 'N/A';
        }else{
            $solicitud->s_numero_3 = $request->s_numero_e;
        }

        if ($request->s_referencias == '') {
            $solicitud->s_referencias = 'N/A';
        }else{
            $solicitud->s_referencias = $request->s_referencias;
        }

        $solicitud->s_descripcion = $request->s_descripcion;
        $solicitud->s_tipo = $request->s_tipo;
        $solicitud->s_id_servicio = $request->s_id_servicio;
        $solicitud->s_id_prioridad = $request->s_id_prioridad;

        $solicitud->save();
        
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
        //se guardan los valores
        $solicitud->save();

        return $solicitud;
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

    //metodo para guardar archivo adjunto de la solicitud
    public function guardarArchivoAdjunto(Request $request)
    {
        //Verificando si se adjunto un archivo
        if($request->hasFile('ruta_archivo')){
            $file = $request->file('ruta_archivo');
            $tituloimagen = 'AA_'.$request->id;
            $file->move(public_path().'/assets/archivos/adjunto/', $tituloimagen);
        } 
    }

    //metodo para tomar la informacion necesaria de la peticion
    public function peticionInfo($id)
    {
        return DB::table('solicitudes')->join('historials', 'historials.id_solicitud', '=', 'solicitudes.id')->join('prioridades', 'prioridades.id', '=', 'solicitudes.s_id_prioridad')->join('servicios', 'servicios.id', '=', 'solicitudes.s_id_servicio')->join('colonias', 'colonias.id', '=', 'solicitudes.s_id_colonia')->select(DB::raw('solicitudes.*, historials.created_at as ultima, historials.descripcion, servicios.nombre as servicio, prioridades.nombre as prioridad, colonias.nombre as colonia'))->where('historials.id_solicitud','=',$id)->orderBy('historials.created_at', 'desc')->limit(1)->get()->toArray();      
    }

    public function generarAcusePDF($id){
        $informacion = DB::table('solicitudes')->join('historials', 'historials.id_solicitud', '=', 'solicitudes.id')->join('prioridades', 'prioridades.id', '=', 'solicitudes.s_id_prioridad')->join('servicios', 'servicios.id', '=', 'solicitudes.s_id_servicio')->join('colonias', 'colonias.id', '=', 'solicitudes.s_id_colonia')->join('direcciones', 'direcciones.id', '=', 'servicios.id_direccion')->join('personas', 'personas.id', '=', 'direcciones.id_persona')->select(DB::raw('solicitudes.*, historials.created_at as ultima, historials.descripcion, servicios.nombre as servicio, prioridades.nombre as prioridad, colonias.codigo_postal as codigo_p, colonias.nombre as colonia, direcciones.nombre as nombre_direccion, personas.nombre as nombre_director, personas.apellido_p as apellido_p_director, personas.apellido_m as apellido_m_director'))->where('historials.id_solicitud','=',$id)->orderBy('historials.created_at', 'desc')->limit(1)->get()->toArray();
        $pdf = \PDF::loadView('acuse', compact('informacion'));
        //$pdf = \PDF::loadView('acuse');
        return $pdf->stream('Acuse_'.$informacion[0]->id.'.pdf');
        //return $pdf->stream('Acuse_.pdf');
    }
    
}
