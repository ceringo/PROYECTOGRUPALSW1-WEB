<?php

namespace App\Http\Controllers\Trabajo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contrato;
use App\Empleador;
use App\Servicio;
use Illuminate\Http\Request;

class ContratoController extends Controller
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
            $contrato = Contrato::where('fecha_inicio', 'LIKE', "%$keyword%")
                ->orWhere('fecha_fin', 'LIKE', "%$keyword%")
                ->orWhere('latitud_empleado', 'LIKE', "%$keyword%")
                ->orWhere('longitud_empleado', 'LIKE', "%$keyword%")
                ->orWhere('calificacion_empleado', 'LIKE', "%$keyword%")
                ->orWhere('calificacion_empleador', 'LIKE', "%$keyword%")
                ->orWhere('estado_contrato', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_solicitud_contrato', 'LIKE', "%$keyword%")
                ->orWhere('id_servicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contrato = Contrato::latest()->paginate($perPage);
        }

        return view('layouts/Trabajo.contrato.index', compact('contrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        $solicitudes = Empleador::join('usuario_movils as us','empleadors.id_usuario_movil','=','us.id')->join('solicitud_contratos as solcont','empleadors.id','=','solcont.id_empleador')->where('solcont.estado_solicitud','=',"enespera")->select('us.*','solcont.id as id_solicitud_contrato')->get();
        //dd($empleadores);



        $servicios= Servicio::join('especialidads as esp','servicios.id_especialidad','=','esp.id')->select('servicios.*','esp.nombre')->get();
     
        return view('layouts/Trabajo.contrato.create')->with('solicitudes', $solicitudes)->with('servicios', $servicios);
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
			'latitud_empleado' => 'required',
			'longitud_empleado' => 'required',
            'estado_contrato' => 'required',
            'estado' => 'required'
		]);
        $requestData = $request->all();
        
        Contrato::create($requestData);

        return redirect('trabajo/contrato')->with('flash_message', 'Contrato added!');
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
        $contrato = Contrato::findOrFail($id);

        return view('layouts/Trabajo.contrato.show', compact('contrato'));
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
        $contrato = Contrato::findOrFail($id);

        return view('layouts/Trabajo.contrato.edit', compact('contrato'));
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
			'latitud_empleado' => 'required',
			'longitud_empleado' => 'required',
            'estado_contrato' => 'required',
            'estado' => 'required'
		]);
        $requestData = $request->all();
        
        $contrato = Contrato::findOrFail($id);
        $contrato->update($requestData);

        return redirect('trabajo/contrato')->with('flash_message', 'Contrato updated!');
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
        Contrato::destroy($id);

        return redirect('trabajo/contrato')->with('flash_message', 'Contrato deleted!');
    }
}
