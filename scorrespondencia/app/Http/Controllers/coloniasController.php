<?php

namespace App\Http\Controllers;

use App\colonias;
use DB;
use Illuminate\Http\Request;

class coloniasController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla estados
    public function index(){
        //se retornan los valores de los registros de la tabla estados
    	return DB::table('colonias')->get();
    }

    public function mostrarCP($id){
    	$colonia = colonias::find($id);
        return $colonia;
    }
}
