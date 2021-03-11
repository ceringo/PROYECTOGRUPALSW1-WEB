<?php

namespace App\Http\Controllers\Respaldo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SolicitudRespaldo;
use App\Servicio;
use Illuminate\Http\Request;

class SolicitudRespaldoController extends Controller
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
            $solicitudrespaldo = SolicitudRespaldo::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('curriculum', 'LIKE', "%$keyword%")
                ->orWhere('antecedentes_penales', 'LIKE', "%$keyword%")
                ->orWhere('foto_ci', 'LIKE', "%$keyword%")
                ->orWhere('fecha_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('latitud', 'LIKE', "%$keyword%")
                ->orWhere('longitud', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_servicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $solicitudrespaldo = SolicitudRespaldo::latest()->paginate($perPage);
        }

        return view('layouts/Respaldo.solicitud-respaldo.index', compact('solicitudrespaldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $servicios= Servicio::join('especialidads as esp','servicios.id_especialidad','=','esp.id')->select('servicios.*','esp.nombre')->get();
        
        return view('layouts/Respaldo.solicitud-respaldo.create')->with('servicios', $servicios);
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
			'foto' => 'required',
			'curriculum' => 'required',
			'antecedentes_penales' => 'required',
			'curriculum' => 'required',
			'foto_ci' => 'required',
			'latitud' => 'required',
			'longitud' => 'required',
			'estado' => 'required'
		]);
        $requestData = $request->all();
        
        SolicitudRespaldo::create($requestData);

        return redirect('respaldo/solicitud-respaldo')->with('flash_message', 'SolicitudRespaldo added!');
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
        $solicitudrespaldo = SolicitudRespaldo::findOrFail($id);

        return view('layouts/Respaldo.solicitud-respaldo.show', compact('solicitudrespaldo'));
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
        $solicitudrespaldo = SolicitudRespaldo::findOrFail($id);

        return view('layouts/Respaldo.solicitud-respaldo.edit', compact('solicitudrespaldo'));
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
			'foto' => 'required',
			'curriculum' => 'required',
			'antecedentes_penales' => 'required',
			'curriculum' => 'required',
			'foto_ci' => 'required',
			'latitud' => 'required',
			'longitud' => 'required',
			'estado' => 'required'
		]);
        $requestData = $request->all();
        
        $solicitudrespaldo = SolicitudRespaldo::findOrFail($id);
        $solicitudrespaldo->update($requestData);

        return redirect('respaldo/solicitud-respaldo')->with('flash_message', 'SolicitudRespaldo updated!');
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
        SolicitudRespaldo::destroy($id);

        return redirect('respaldo/solicitud-respaldo')->with('flash_message', 'SolicitudRespaldo deleted!');
    }
}
