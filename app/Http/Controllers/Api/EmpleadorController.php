<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empleado;
use App\Empleador;
use App\Contrato;
use App\SolicitudContrato;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class EmpleadorController extends Controller
{


    //MODULO TRABAJADOR
    //-------------------------------Flujo TRABAJO--------------------------
    //cambio

    // Envia el area y las especialidades al empleador
    public function areasServicios(Request $request){
         
          
         $areas = DB::table('areas as a')
            ->select('a.*')            
            ->orderBy('a.id', 'desc')
            ->get();
 
            for($i = 0; $i < count($areas); ++$i) {
                   $arr[] =
                    array(
                      "id"=>$areas[$i]->id,
                      "nombre"=> $areas[$i]->nombre,
                      "descripcion"=> $areas[$i]->descripcion,
                      "ListaEspecialidad" =>DB::table('especialidads as es')
                                 ->where('es.id_area',$areas[$i]->id)
                                 ->select('es.id','es.nombre','es.descripcion')
                                 ->orderBy('es.id', 'desc')
                                 ->get()
                     );
                   
            }        
            return response()->json(array('data' => $arr), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);
    }

    /** muesta todo los tradajadore para ello se necesita:
     * id_especialidad
     */
    public function trabajadores(Request $request){


        $this->validate($request, [
            'id_especialidad' => 'required'
        ]);

        $id_especialidad=$request->input('id_especialidad');

        $listaTrabajadores=Empleado::join('servicios as se','empleados.id','=','se.id_empleado')
                                    ->join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                    ->join('ubicacions as ubi','us.id','=','ubi.id_usuario_movil')
                                    ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                    ->join('logins as log','us.id_login','=','log.id')
                                    ->where('se.id_especialidad','=',$id_especialidad)
                                    ->where('se.estado','=','1')
                                    ->where('se.estado_servicio','=','1')
                                    ->where('empleados.estado','=','1')
                                    ->select('us.*','ubi.*','empleados.id as id_empleado','calificacion_empleado','se.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')->get();

 

        if($listaTrabajadores==null){
            return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);

        }

        return response()->json(array('data' => $listaTrabajadores), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);


    }

        
    /** CREAR SOLICITUD DE CONTRATO PARA TRABAJO para eso enviar los datos:
     *  latitud_empleador
     *  longitud_empleador 
     *  id_usuario_movil
     *  id_servicio
     */
    public function crearSolicitudContrato(Request $request){
    
        $this->validate($request, [
			'latitud_empleador' => 'required',
            'longitud_empleador' => 'required',
            'id_usuario_movil' => 'required'
        ]);

        
        $id_empleador= Empleador::where('id_usuario_movil',$request->id_usuario_movil)->value('id');
        //dd($id_empleador);
        $solicitud_contrato = new SolicitudContrato;
        $solicitud_contrato->latitud_empleador = $request->latitud_empleador;
        $solicitud_contrato->longitud_empleador = $request->longitud_empleador;
        $solicitud_contrato->fecha=date("Y-m-d");
        $solicitud_contrato->estado_solicitud = "enespera";
        $solicitud_contrato->estado = "1";
        $solicitud_contrato->id_empleador=$id_empleador;
        $solicitud_contrato->id_servicio=$request->id_servicio;
        $solicitud_contrato->save();

        return response()->json(['data' => []]);
    }


    public function contratar(Request $request){

        $this->validate($request, [
            'id_solicitud' => 'required',
            'id_servicio' => 'required',
            'latitud_empleado' => 'required',
            'longitud_empleado' => 'required',
        ]);

        

            $contratar = new contrato;
            $contratar->fecha_inicio=date("Y-m-d");
            $contratar->fecha_fin=date("Y-m-d");
            $contratar->latitud_empleado=$request->latitud_empleado;
            $contratar->longitud_empleado=$request->longitud_empleado;
            $contratar->calificacion_empleado=0;
            $contratar->calificacion_empleador=0;
            $contratar->estado_contrato='aceptado';
            $contratar->id_solicitud_contrato=$request->id_solicitud;
            $contratar->id_servicio=$request->id_servicio;
            $contratar->estado='1';
            $contratar->save();


            $solicitud_contrato = SolicitudContrato::where('id','=',$request->id_solicitud)->get();

            $solicitud_contrato[0]->estado_solicitud='aceptado';
            $solicitud_contrato[0]->save();



            return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);

    }

    public function accionSolicitudContrato(Request $request){
        $this->validate($request, [
            'id_servicio' => 'required',
            'accion' => 'required'
        ]);
        

        if($request->accion = "debaja"){
        $solicitud_contrato = SolicitudContrato::where('id','=',$request->id_servicio)->get();
        $solicitud_contrato[0]->estado_solicitud='debaja';
        $solicitud_contrato[0]->estado='0';
        $solicitud_contrato[0]->save();
        
    }
    

    return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
        }    


   


    


    
    //Reporte

    /**
     * darbaja -> Es metodo para ver un tipo reporte de trabajos que se dan de baja... tanto
     * cuando estan en espera como cuando estan aceptados.
     */

    public function listaDeBaja(Request $request){
        $this->validate($request, [
            'id_usuario_movil' => 'required'
        ]);
    
        $id_usuario = $request->input('id_usuario_movil');
    
        $id_empleador = Empleador::where('id_usuario_movil','=',$id_usuario)->value('id');
        
        $listaTrabajadores=Empleado::join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                        ->join('logins as log','us.id_login','=','log.id')
                                        ->join('servicios as se','empleados.id','=','se.id_empleado')
                                        ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                        ->join('solicitud_contratos as solcont','se.id','=','solcont.id_servicio')
                                        ->join('contratos as cont','solcont.id','=','cont.id_solicitud_contrato')
                                        ->where('solcont.id_empleador','=',$id_empleador)
                                        ->where('solcont.estado','=','1')
                                        ->where('se.estado','=',"1")
                                        ->where('solcont.estado_solicitud','=',"debaja")
                                        ->where('cont.estado','=','1')
                                        ->select('us.*','solcont.*','empleados.id as id_empleado','empleados.calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')
                                        ->get();
    
                                        
    
        if($listaTrabajadores==null){
            return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);
    
        }
    
        return response()->json(array('data' => $listaTrabajadores), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);
    
    }

    




    


   


   
    
   


   
    
   


    //------------------------------------------------------------------------------------------------------




//prueba

public function listaGenerica(Request $request){

    $this->validate($request, [
        'id_usuario_movil' => 'required',
        'accion' => 'required',

    ]);

    $id_usuario = $request->input('id_usuario_movil');
    $accion = $request->input('accion');
    $id_empleador = Empleador::where('id_usuario_movil','=',$id_usuario)->value('id');

    //dd($id_empleador);

    if($request->accion == "enespera"){

    
    $listaTrabajadores=Empleado::join('servicios as se','empleados.id','=','se.id_empleado')
                                ->join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                ->join('logins as log','us.id_login','=','log.id')
                                ->join('solicitud_contratos as solcont','se.id','=','solcont.id_servicio')
                                ->where('se.estado','=','1')
                                ->where('solcont.id_empleador','=',$id_empleador)
                                ->where('solcont.estado_solicitud','=','enespera')
                                ->where('solcont.estado','=','1')
                                ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleados.id as id_empleado','calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')->get();


                            }

if($request->accion == "aceptado"){
// dd($id_usuario);
                            $listaTrabajadores=Empleado::join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                        ->join('logins as log','us.id_login','=','log.id')
                                        ->join('servicios as se','empleados.id','=','se.id_empleado')
                                        ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                        ->join('solicitud_contratos as solcont','se.id','=','solcont.id_servicio')
                                        ->join('contratos as cont','solcont.id','=','cont.id_solicitud_contrato')
                                        ->where('solcont.id_empleador','=',$id_empleador)
                                        ->where('solcont.estado','=','1')
                                        ->where('se.estado','=',"1")
                                        ->where('solcont.estado_solicitud','=','aceptado')
                                        ->where('cont.estado_contrato','=','aceptado')
                                        ->where('cont.estado','=','1')
                                        ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleados.id as id_empleado','empleados.calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')
                                        ->get();
                                    }
                                    if($request->accion == "rechazado"){
                                    $listaTrabajadores=Empleado::join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                        ->join('logins as log','us.id_login','=','log.id')
                                        ->join('servicios as se','empleados.id','=','se.id_empleado')
                                        ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                        ->join('solicitud_contratos as solcont','se.id','=','solcont.id_servicio')
                                        ->join('contratos as cont','solcont.id','=','cont.id_solicitud_contrato')
                                        ->where('solcont.id_empleador','=',$id_empleador)
                                        ->where('solcont.estado','=','1')
                                        ->where('se.estado','=',"1")
                                        ->where('solcont.estado_solicitud','=','aceptado')
                                        ->where('cont.estado_contrato','=','rechazado')
                                        ->where('cont.estado','=','0')
                                        ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleados.id as id_empleado','empleados.calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')
                                        ->get();
                                    }

                                    if($request->accion == "debaja"){

    //                                    dd($id_empleador);
    
                                        $listaTrabajadores=Empleado::join('servicios as se','empleados.id','=','se.id_empleado')
                                                                    ->join('usuario_movils as us','empleados.id_usuario_movil','=','us.id')
                                                                    ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                                                    ->join('logins as log','us.id_login','=','log.id')
                                                                    ->join('solicitud_contratos as solcont','se.id','=','solcont.id_servicio')
                                                                    ->where('se.estado','=','1')
                                                                    ->where('solcont.id_empleador','=',$id_empleador)
                                                                    ->where('solcont.estado_solicitud','=','debaja')
                                                                    ->where('solcont.estado','=','0')
                                                                    ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleados.id as id_empleado','calificacion_empleado','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')->get();
                                    
                                    
                                                                }

                                    
        

                                    



    if($listaTrabajadores==null){
        return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);

    }

    return response()->json(array('data' => $listaTrabajadores), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
   }






}
 