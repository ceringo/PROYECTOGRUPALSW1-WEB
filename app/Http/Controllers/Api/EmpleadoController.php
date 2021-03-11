<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Servicio;
use App\Empleado;
use App\Empleador;
use App\Contrato;

use App\SolicitudContrato;

use App\Especialidad;


use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //-------------------------------Flujo LOGIN---------------------------
    //cambio

    public function habilitarDeshabilitarEmpleado(Request $request){
    
        $this->validate($request, [
            'id_usuario_movil' => 'required',
            'accion' => 'required'
           ]);

$idUsuario=$request->input('id_usuario_movil');
$accion = $request->input('accion');


$empleado=Empleado::where('id_usuario_movil','=',$idUsuario)->get();

if($accion == "empleado"){
    $empleado[0]->estado="1";
            }
if($accion == "empleador"){
    $empleado[0]->estado="0";
}

         $empleado[0]->save();

         return response()->json(['data' => []]);
    

    
    }

    //------------------------------------------------------------------------------------------------------
    

    //-------------------------------Flujo MIS SERVICIOS---------------------------


    /*Para entrar a crear el servicio  - 
    Devuelve una lista de areas con su respectivas especialidades*/

    public function servicioComplemento(Request $request){
         
          
        $areas = DB::table('areas as a')
           ->select('a.*')            
           ->orderBy('a.id', 'desc')
           ->get();

           for($i = 0; $i < count($areas); ++$i) {
                  $arr[] =
                   array(
                     "id"=>$areas[$i]->id,
                     "nombre"=> $areas[$i]->nombre,
                     "ListaEspecialidad" =>DB::table('especialidads as es')
                                ->where('es.id_area',$areas[$i]->id)
                                ->select('es.id','es.nombre')
                                ->orderBy('es.id', 'desc')
                                ->get()
                    );
                  
           }        
           return response()->json(array('data' => $arr), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
               JSON_UNESCAPED_UNICODE);
   }

   /*Crea el servicio con los datos - para eso requiere :
   nombre_especialidad
   id_usuario_movil
   descripcion
   precio_estandar*/

   public function crearServicio(Request $request){


    $this->validate($request, [
        'nombre_especialidad' => 'required',
        'id_usuario_movil' => 'required',
        'descripcion' => 'required',
        'precio_estandar' => 'required'

    ]);

  

    $id_usuario_movil=$request->input('id_usuario_movil');


    $nombre_especialidad=$request->input('nombre_especialidad');


    $idespecialidad= Especialidad::where(['nombre' => $nombre_especialidad])->value('id');


    $id_empleado= Empleado::where(['id_usuario_movil' => $id_usuario_movil])->value('id');

    //dd($id_empleado);
    //descripcion', 'precio_estandar', 'estado_servicio', 'estado', 'nombre_especialidad', 'id_empleado'];

    $servicio = new Servicio;
    $servicio->descripcion = $request->descripcion;
    $servicio->precio_estandar= $request->precio_estandar;
    $servicio->estado_servicio= "1";
    $servicio->estado = "1";
    $servicio->id_especialidad = $idespecialidad;
    $servicio->id_empleado = $id_empleado;
    $servicio->save();

    
    //enviar la lista


    $listaServicios = DB::table('servicios as a')
    ->join('empleados as em','a.id_empleado','=','em.id')
    ->join('especialidads as esp','a.id_especialidad','=','esp.id')
    ->where('em.id_usuario_movil','=',$id_usuario_movil)
    ->select('a.id','a.descripcion','a.precio_estandar','a.estado_servicio','esp.nombre')->get();
    

    return response()->json(array('data' => $listaServicios), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);

   }


   /* lista todos los servicios del usuario -
    Para eso se requiere el :
    id de usuario movil*/
   public function listarServicio(Request $request){

    $this->validate($request, [
        'id_usuario_movil' => 'required'

    ]);

    $id_usuario_movil=$request->input('id_usuario_movil');

    $listaServicios = DB::table('servicios as a')
    ->join('empleados as em','a.id_empleado','=','em.id')
    ->join('especialidads as esp','a.id_especialidad','=','esp.id')
    ->where('em.id_usuario_movil','=',$id_usuario_movil)
    ->select('a.id','a.descripcion','a.precio_estandar','a.estado_servicio','esp.nombre')->get();
    

    return response()->json(array('data' => $listaServicios), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);


   }

   /*Envia el id de servicio y aqui lo desabilito o habilito no importa el origen
   para ello se requiere:
   id_servicio
   */
   public function desabilitarServicio(Request $request){

    $this->validate($request, [
        'id_servicio' => 'required'

    ]);

    $idServicio = $request->input('id_servicio');

     $servicios = Servicio::where('id','=',$idServicio)->get();
     //dd($servicio);
     //$servicio->estado_servicio="0";
     //$servicio->save();

     //$post = App\Post::find(1);

     $valor=$servicios[0]->estado_servicio;

     if($valor == "0"){
     
        $servicios[0]->estado_servicio="1";
     
     }else{
        $servicios[0]->estado_servicio="0";
     }

     $servicios[0]->save();


     return response()->json(['data' => []]);

   }


   /*Desabilita o habilita de acuerdo a la bandera (habilitar - desabilitar)todos los servicios pero para ello se requiere 
   los siguientes datos:
   id_usuario_movil
   bandera
   */
   public function allDesabilitarServicios(Request $request){

    $this->validate($request, [
        'id_usuario_movil' => 'required',
        'bandera' => 'required'

    ]);

    $id_usuario_movil = $request->input('id_usuario_movil'); 
    //dd($id_usuario_movil);

    //$servicios = Empleado::join('servicios as se','empleados.id','=','se.id_empleado')->where('empleados.id_usuario_movil','=',$id_usuario_movil)->select('se.*')->get();

    $servicios = Servicio::join('empleados as em','servicios.id_empleado','=','em.id')->where('em.id_usuario_movil','=',$id_usuario_movil)->select('servicios.*')->get();
    //dd($servicios);




    if($request->bandera=="habilitar"){


        for ($i = 0; $i < count($servicios); ++$i){
            $servicios[$i]->estado_servicio="1";
            $servicios[$i]->save();
        }

    }else{

        for ($i = 0; $i < count($servicios); ++$i){
            $servicios[$i]->estado_servicio="0";
            $servicios[$i]->save();
        }

    }

    


    return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    


   }

   //------------------------------------------------------------------------------------------------------

   //-------------------------------Flujo MIS CONTRATO---------------------------

   public function listaDeSolicitudesParaContrato(Request $request){
    $this->validate($request, [
        'id_usuario_movil' => 'required'
    ]);
    $id_usuario = $request->input('id_usuario_movil');
    $id_empleado = Empleado::where('id_usuario_movil','=',$id_usuario)->value('id');
    
    $listaTrabajadores=Empleador::join('solicitud_contratos as solcont','empleadors.id','=','solcont.id_empleador')
                                    ->join('usuario_movils as us','empleadors.id_usuario_movil','=','us.id')
                                    ->join('logins as log','us.id_login','=','log.id')
                                    ->join('servicios as se','solcont.id_servicio','=','se.id')
                                    ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                    ->where('se.id_empleado','=',$id_empleado)
                                    ->where('solcont.estado','=','1')
                                    ->where('se.estado','=',"1")
                                    ->where('solcont.estado_solicitud','=',"enespera")
                                    ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleadors.id as id_empleador','calificacion_empleador','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')
                                    ->get();
    if($listaTrabajadores==null){
        return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
    return response()->json(array('data' => $listaTrabajadores), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
   }

   public function listaDeMisContrato(Request $request){
    $this->validate($request, [
        'id_usuario_movil' => 'required'
    ]);
    $id_usuario = $request->input('id_usuario_movil');
    $id_empleado = Empleado::where('id_usuario_movil','=',$id_usuario)->value('id');
    
    $listaTrabajadores=Empleador::join('solicitud_contratos as solcont','empleadors.id','=','solcont.id_empleador')
                                    ->join('usuario_movils as us','empleadors.id_usuario_movil','=','us.id')
                                    ->join('logins as log','us.id_login','=','log.id')
                                    ->join('servicios as se','solcont.id_servicio','=','se.id')
                                    ->join('especialidads as espe','se.id_especialidad','=','espe.id')
                                    ->join('contratos as cont','solcont.id','=','cont.id_solicitud_contrato')
                                    ->where('se.id_empleado','=',$id_empleado)
                                    ->where('solcont.estado','=','1')
                                    ->where('se.estado','=',"1")
                                    ->where('solcont.estado_solicitud','=',"aceptado")
                                    ->where('cont.estado_contrato','=','aceptado')
                                    ->where('cont.estado','=','1')
                                    ->select('us.*','solcont.id as id_solicitud_contrato','solcont.*','empleadors.id as id_empleador','empleadors.calificacion_empleador','espe.id as id_servicio','se.descripcion','se.precio_estandar','espe.nombre as especialidad','log.correo')
                                    ->get();
    if($listaTrabajadores==null){
        return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
    return response()->json(array('data' => $listaTrabajadores), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
   }


   //esta mal por que esto tiene que ir a contrato si es empleado
   public function rechazarSolicitud(Request $request){


    $this->validate($request, [
    
        'id_solicitud_contrato' => 'required'
        
    ]);

    $solicitud_contrato = SolicitudContrato::where('id','=',$request->id_solicitud_contrato)->get();
        $solicitud_contrato[0]->estado_solicitud='rechazado';
        $solicitud_contrato[0]->estado='0';
        $solicitud_contrato[0]->save();

        
        return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);

}

//Finaliza el contrato

public function finalizarContrato(Request $request){
    $this->validate($request, [
        'id_servicio' => 'required'
    ]);

    $contrato= Contrato::where('id_servicio','=',$request->id_servicio)->get();

    $contrato[0]->estado_contrato='finalizado';
        $contrato[0]->estado='0';
        $contrato[0]->save();

    $idContrato= Contrato::where('id_servicio','=',$request->id_servicio)->value('id');

    $solicitud_contrato= SolicitudContrato::join('contratos as cont','solicitud_contratos.id','=','cont.id_solicitud_contrato')->where('cont.id','=',$idContrato)->get();
    $solicitud_contrato[0]->estado='0';
    $solicitud_contrato[0]->save();




return response()->json(array('data' => []), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }    






  


  
   //------------------------------------------------------------------------------------------------------


}