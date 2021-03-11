<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleador;
use Illuminate\Http\Request;

class EmpleadorController extends Controller
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
            $empleador = Empleador::where('calificacion_empleador', 'LIKE', "%$keyword%")
                ->orWhere('id_usuario_movil', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empleador = Empleador::latest()->paginate($perPage);
        }

        return view('layouts/Usuario.empleador.index', compact('empleador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts/Usuario.empleador.create');
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
        
        $requestData = $request->all();
        
        Empleador::create($requestData);

        return redirect('usuario/empleador')->with('flash_message', 'Empleador added!');
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
        $empleador = Empleador::findOrFail($id);

        return view('layouts/Usuario.empleador.show', compact('empleador'));
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
        $empleador = Empleador::findOrFail($id);

        return view('layouts/Usuario.empleador.edit', compact('empleador'));
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
        
        $requestData = $request->all();
        
        $empleador = Empleador::findOrFail($id);
        $empleador->update($requestData);

        return redirect('usuario/empleador')->with('flash_message', 'Empleador updated!');
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
        Empleador::destroy($id);

        return redirect('usuario/empleador')->with('flash_message', 'Empleador deleted!');
    }
}
