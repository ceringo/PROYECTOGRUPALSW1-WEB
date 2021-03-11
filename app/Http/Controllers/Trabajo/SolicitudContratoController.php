<?php

namespace App\Http\Controllers\Trabajo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleador;
use App\UsuarioMovil;
use App\Servicio;


use App\SolicitudContrato;
use Illuminate\Http\Request;

class SolicitudContratoController extends Controller
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
            $solicitudcontrato = SolicitudContrato::where('latitud_empleador', 'LIKE', "%$keyword%")
                ->orWhere('longitud_empleador', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('id_empleador', 'LIKE', "%$keyword%")
                ->orWhere('id_servicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $solicitudcontrato = SolicitudContrato::latest()->paginate($perPage);
        }

        return view('layouts/Trabajo.solicitud-contrato.index', compact('solicitudcontrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        $empleadores = Empleador::join('usuario_movils as us','empleadors.id_usuario_movil','=','us.id')->select('us.*','empleadors.id as id_empleador')->get();
        //dd($empleadores);
        $servicios= Servicio::join('especialidads as esp','servicios.id_especialidad','=','esp.id')->select('servicios.*','esp.nombre')->get();
     
     //   dd($servicios);
        return view('layouts/Trabajo.solicitud-contrato.create')->with('empleadores', $empleadores)->with('servicios', $servicios);
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
			'latitud_empleador' => 'required',
            'longitud_empleador' => 'required'
            
		]);
        //$requestData = $request->all();

        
        $solicitud_contrato = new SolicitudContrato;
        $solicitud_contrato->latitud_empleador = $request->latitud_empleador;
        $solicitud_contrato->longitud_empleador = $request->longitud_empleador;
        $solicitud_contrato->fecha=date("Y-m-d");
        $solicitud_contrato->estado_solicitud = "enespera";
        $solicitud_contrato->estado = "1";
        $solicitud_contrato->id_empleador=$request->id_empleador;
        $solicitud_contrato->id_servicio=$request->id_servicio;
        $solicitud_contrato->save();

        
        //SolicitudContrato::create($requestData);

        return redirect('trabajo/solicitud-contrato')->with('flash_message', 'SolicitudContrato added!');
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
        $solicitudcontrato = SolicitudContrato::findOrFail($id);

        


        return view('layouts/Trabajo.solicitud-contrato.show', compact('solicitudcontrato'));
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


        //solucion trucha
        $empleadores = Empleador::join('usuario_movils as us','empleado.id_usuario_movil','=','us.id')->select('us.*','empleador.id as id_empleador')->get();
        $servicios= Servicios::join('Especialidads as esp','servicios.id_especialidad','=','esp.id')->select('servicio.*','esp.nombre');
        
        $solicitudcontrato = SolicitudContrato::findOrFail($id);

        return view('layouts/Trabajo.solicitud-contrato.edit', compact('solicitudcontrato'))->with('empleadores', $empleadores)->with('servicios', $servicios);
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
			'latitud_empleador' => 'required',
			'longiitud_empleador' => 'required'
		]);
        $requestData = $request->all();
        
        $solicitudcontrato = SolicitudContrato::findOrFail($id);
        $solicitudcontrato->update($requestData);

        return redirect('trabajo/solicitud-contrato')->with('flash_message', 'SolicitudContrato updated!');
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
        SolicitudContrato::destroy($id);

        return redirect('trabajo/solicitud-contrato')->with('flash_message', 'SolicitudContrato deleted!');
    }
}
