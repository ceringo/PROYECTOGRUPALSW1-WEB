<?php

namespace App\Http\Controllers\Trabajo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Especialidad;
use App\Area;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
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
            $especialidad = Especialidad::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('id_area', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $especialidad = Especialidad::latest()->paginate($perPage);
        }

        return view('layouts/Trabajo.especialidad.index', compact('especialidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $areas = Area::get();
        //$idUsuarioMovil= UsuarioMovil::where('id_login','=',$idLogin)->value('id');

        //dd($areas);
        return view('layouts/Trabajo.especialidad.create')->with('areas', $areas);
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
			'nombre' => 'required',
			'descripcion' => 'required'
		]);
        $requestData = $request->all();
        
        Especialidad::create($requestData);

        return redirect('trabajo/especialidad')->with('flash_message', 'Especialidad added!');
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
        $especialidad = Especialidad::findOrFail($id);

        return view('layouts/Trabajo.especialidad.show', compact('especialidad'));
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
        $areas = Area::get();
        
        // Solucion Trucha
        $especialidad = Especialidad::findOrFail($id);


        return view('layouts/Trabajo.especialidad.edit', compact('especialidad'))->with('areas', $areas);
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
			'nombre' => 'required',
			'descripcion' => 'required'
		]);
        $requestData = $request->all();
        
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($requestData);

        return redirect('trabajo/especialidad')->with('flash_message', 'Especialidad updated!');
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
        Especialidad::destroy($id);

        return redirect('trabajo/especialidad')->with('flash_message', 'Especialidad deleted!');
    }
}
