<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UsuarioMovil;
use App\Login;
use App\Empleador;
use App\Empleado;
use App\Ubicacion;

use Illuminate\Http\Request;

class UsuarioMovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $usuariomovil = UsuarioMovil::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('apellidos', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('sexo', 'LIKE', "%$keyword%")
                ->orWhere('fecha_nacimiento', 'LIKE', "%$keyword%")
                ->orWhere('fecha_registro', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_login', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $usuariomovil = UsuarioMovil::latest()->paginate($perPage);
        }

        return view('layouts/Usuario.usuario-movil.index', compact('usuariomovil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts/Usuario.usuario-movil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
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
        //dd($idLogin);
        

        $usuariomovil = new UsuarioMovil;
        $usuariomovil->foto = $request->foto;
        $usuariomovil->nombre = $request->nombre;
        $usuariomovil->apellidos = $request->apellidos;
        $usuariomovil->telefono = $request->telefono;
        $usuariomovil->sexo = $request->sexo;
        $usuariomovil->fecha_nacimiento = $request->fecha_nacimiento;
        $usuariomovil->fecha_registro = date("Y-m-d");
        $usuariomovil->estado = '1';
        $usuariomovil->id_login = $idLogin;
        $usuariomovil->save();

        $idUsuarioMovil= UsuarioMovil::where('id_login','=',$idLogin)->value('id');

        //dd($idUsuarioMovil);
        $empleador = new Empleador;
        $empleador->calificacion_empleador=0;
        $empleador->id_usuario_movil=$idUsuarioMovil;
        $empleador->save();

        
        $empleado = new Empleado;
        $empleado->calificacion_empleado=0;
        $empleado->estado_respaldo='0';
        $empleado->id_usuario_movil=$idUsuarioMovil;
        $empleado->save();

        $ubicacion = new Ubicacion;
        $ubicacion->latitud=$request->latitud;
        $ubicacion->longitud=$request->longitud;
        $ubicacion->id_usuario_movil=$idUsuarioMovil;
        $ubicacion->save();


        return redirect('usuario/usuario-movil')->with('flash_message', 'UsuarioMovil added!');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $usuariomovil = UsuarioMovil::findOrFail($id);

        return view('layouts/Usuario.usuario-movil.show', compact('usuariomovil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

    public function edit($id)
    {
        $usuariomovil = UsuarioMovil::findOrFail($id);

        return view('layouts/Usuario.usuario-movil.edit', compact('usuariomovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */



     //Update y destroy no funciona
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'nombre' => 'required',
			'apellidos' => 'required',
			'telefono' => 'required'
		]);
        $requestData = $request->all();
        
        $usuariomovil = UsuarioMovil::findOrFail($id);
        $usuariomovil->update($requestData);

        return redirect('usuario/usuario-movil')->with('flash_message', 'UsuarioMovil updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        UsuarioMovil::destroy($id);

        return redirect('usuario/usuario-movil')->with('flash_message', 'UsuarioMovil deleted!');
    }
}
