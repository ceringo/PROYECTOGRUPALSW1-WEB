<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Especialidad;
use App\Servicio;
use App\Objeto;
use App\Ubicacion;
use App\Empleado;

use Illuminate\Http\Request;

class IaController extends Controller
{

    // te bota la lista de trabajadores mas su especialidad que toca de acuerdo al objeto
    public function iaBusqueda(Request $request){

        $this->validate($request, [
            'objeto' => 'required'
        ]);

        $objeto=$request->input('objeto');
        $idUsuario=$request->input('id_usuario_movil');

        $id_area = Objeto::where(['nombre' => $objeto])->value('id_area');

        if($id_area==null){
            return response()->json(['data' => []]);
        }


        $listaTrabajadores=Empleado::join('servicios as se','empleados.id','=','se.id_empleado')->
                                    join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')->
                                    join('ubicacions as ubi','us.id','=','ubi.id_usuario_movil')->
                                    join('logins as log','us.id_login','=','log.id')->
                                    join('especialidads as espe','se.id_especialidad','=','espe.id')->
                                    join('areas as are','espe.id_area','=','are.id')->                        
                                    where('are.id','=',$id_area)->
                                    where('empleados.estado','=','1')->
                                    where('se.estado_servicio','=','1')->
                                    where('se.estado','=','1')->
                                    select('us.*','ubi.*','empleados.id as id_empleado','calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')->get();

        //dd($listaTrabajadores);

        return response()->json(['data' => $listaTrabajadores]);

    }

    //Ubicacion
    public function ubicacion(Request $request){

        $this->validate($request, [
            'id_usuario_movil' => 'required',
            'latitud' => 'required',
            'longitud' => 'required'
    
        ]);

        $id_usuario_movil=$request->id_usuario_movil;

        $ubicacion = ubicacion::join('usuario_movils as us','ubicacions.id_usuario_movil','=','us.id')->
                    where('us.id','=',$id_usuario_movil)->get();

    
        $ubicacion[0]->latitud=$request->latitud;
        $ubicacion[0]->longitud=$request->longitud;

        $ubicacion[0]->save();

        return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }  



}