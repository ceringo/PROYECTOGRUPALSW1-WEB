<?php

namespace App\Http\Controllers\Trabajo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Servicio;
use App\Especialidad;
use App\Empleado;


use Illuminate\Http\Request;

class ServicioController extends Controller
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
            $servicio = Servicio::where('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('precio_estandar', 'LIKE', "%$keyword%")
                ->orWhere('estado_servicio', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_especialidad', 'LIKE', "%$keyword%")
                ->orWhere('id_s', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $servicio = Servicio::latest()->paginate($perPage);
        }

        return view('layouts/Trabajo.servicio.index', compact('servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $especialidades = Especialidad::get();
       

        $empleados = Empleado::join('usuario_movils as us','id_usuario_movil','=','us.id')->where('us.estado','=',"1")->select('us.nombre','empleados.id')->get();

//        dd($empleados);
        
        return view('layouts/Trabajo.servicio.create')->with('especialidades', $especialidades)->with('empleados', $empleados);
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
        $this->validate($request, [
			'descripcion' => 'required'
        ]);
        
        //$requestData = $request->all();
        
        $servicio = new Servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio_estandar = $request->precio_estandar;
        $servicio->estado_servicio = "1";
        $servicio->estado = "1";
        $servicio->id_especialidad = $request->id_especialidad;
        $servicio->id_empleado = $request->id_empleado;
        $servicio->save();


        //Servicio::create($requestData);

        return redirect('trabajo/servicio')->with('flash_message', 'Servicio added!');
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
        $servicio = Servicio::findOrFail($id);


        return view('layouts/Trabajo.servicio.show', compact('servicio'));
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
        $servicio = Servicio::findOrFail($id);

        //Solucion Trucha
        $especialidades = Especialidad::get();
        $empleados = Empleado::join('usuario_movils as us','id_usuario_movil','=','us.id')->where('us.estado','=',"1")->select('us.nombre','empleados.id')->get();
        //

        return view('layouts/Trabajo.servicio.edit', compact('servicio'))->with('especialidades', $especialidades)->with('empleados', $empleados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'descripcion' => 'required'
		]);
        $requestData = $request->all();
        
        $servicio = Servicio::findOrFail($id);
        $servicio->update($requestData);

        return redirect('trabajo/servicio')->with('flash_message', 'Servicio updated!');
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
        Servicio::destroy($id);

        return redirect('trabajo/servicio')->with('flash_message', 'Servicio deleted!');
    }
}
