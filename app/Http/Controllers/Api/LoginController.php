<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Login;
use App\UsuarioMovil;
use App\Ubicacion;
use App\Empleador;
use App\Empleado;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $login = Login::latest()->paginate(25);

        return $login;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $login = Login::create($request->all());

        return response()->json($login, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $login = Login::findOrFail($id);

        return $login;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $login = Login::findOrFail($id);
        $login->update($request->all());

        return response()->json($login, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Login::destroy($id);

        return response()->json(null, 204);
    }



    //Desde aqui sirve





    //Metodo de logeo / retorna el usuario registrado
    public function login(Request $request){

        //$miArray = array("respuesta"=>"true");
        //return (response()->json(['data' => $miArray]));

        $this->validate($request, [
			'email' => 'required',
			'password' => 'required',
        ]);


        $email=$request->input('email');
        $password=$request->input('password');
        //$email=$_POST['email'];
        //$password=$_POST['password'];


        
        $id_login = Login::where(['correo' => $email])->where(['pasword' => $password])->value('id');
        

        
        //$id_usuario_movil= DB::table('logins')->where(['correo' => $email])->where(['pasword' => $password])->value('id_usuario_movil');

        if($id_login==null){

            return response()->json(['data' => []]);
        }

        $usuario_movil= UsuarioMovil::where(['id_login' => $id_login])->get();

        //$usuario_movil= DB::table('usuario_movils')->where(['id' => $id_usuario_movil])->get();

        //dd(response()->json($usuario_movil));
        return response()->json(['data' => $usuario_movil]);

    }

    //Metodo para registro / retorna el usuario registrado
    public function registro(Request $request)
    {

        $idLogin=null;

        $this->validate($request, [
			'nombre' => 'required',
			'apellidos' => 'required',
            'telefono' => 'required',
            'latitud' => 'required',
			'longitud' => 'required'
        ]);
        
        $email = $request->only(['correo','pasword']);

    
        Login::create($email);

        //Otra forma de llamar con select
        //$emails = Login::select('id')->where('correo', '=', "juancarlos@gmail.com")->pluck('id');
        $idLogin = Login::where('correo', '=', $request->correo)->value('id');
        
        $usuariomovil = new UsuarioMovil;
        $usuariomovil->foto = $request->foto;
        $usuariomovil->nombre = $request->nombre;
        $usuariomovil->apellidos = $request->apellidos;
        $usuariomovil->telefono = $request->telefono;
        $usuariomovil->sexo = $request->sexo;
        $usuariomovil->fecha_nacimiento = $request->fecha_nacimiento;
        $usuariomovil->fecha_registro = date("Y-m-d");
        $usuariomovil->estado = "1";
        $usuariomovil->id_login = $idLogin;
        $usuariomovil->save();


        //Crea empleado y empleador
        $idUsuarioMovil= UsuarioMovil::where('id_login','=',$idLogin)->value('id');
        
        $empleador = new Empleador;
        $empleador->calificacion_empleador=0;
        $empleador->id_usuario_movil=$idUsuarioMovil;
        $empleador->save();
        
        $empleado = new Empleado;
        $empleado->calificacion_empleado=0;
        $empleado->estado_respaldo="0";
        $empleado->estado="0";
        $empleado->id_usuario_movil=$idUsuarioMovil;
        $empleado->save();

        $ubicacion = new Ubicacion;
        $ubicacion->latitud=$request->latitud;
        $ubicacion->longitud=$request->longitud;
        $ubicacion->id_usuario_movil=$idUsuarioMovil;
        $ubicacion->save();



        $usuario_movil= UsuarioMovil::where(['id' => $idLogin])->get();

        return response()->json(['data' => $usuario_movil]);
    }

   

}
