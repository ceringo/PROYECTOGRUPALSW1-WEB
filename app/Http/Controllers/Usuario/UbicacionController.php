<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
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
            $ubicacion = Ubicacion::where('latitud', 'LIKE', "%$keyword%")
                ->orWhere('longitud', 'LIKE', "%$keyword%")
                ->orWhere('id_usuario_movil', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ubicacion = Ubicacion::latest()->paginate($perPage);
        }

        return view('layouts/Usuario.ubicacion.index', compact('ubicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts/Usuario.ubicacion.create');
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
			'latitud' => 'required',
			'longitud' => 'required'
		]);
        $requestData = $request->all();
        
        Ubicacion::create($requestData);

        return redirect('usuario/ubicacion')->with('flash_message', 'Ubicacion added!');
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
        $ubicacion = Ubicacion::findOrFail($id);

        return view('layouts/Usuario.ubicacion.show', compact('ubicacion'));
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
        $ubicacion = Ubicacion::findOrFail($id);

        return view('layouts/Usuario.ubicacion.edit', compact('ubicacion'));
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
			'latitud' => 'required',
			'longitud' => 'required'
		]);
        $requestData = $request->all();
        
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->update($requestData);

        return redirect('usuario/ubicacion')->with('flash_message', 'Ubicacion updated!');
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
        Ubicacion::destroy($id);

        return redirect('usuario/ubicacion')->with('flash_message', 'Ubicacion deleted!');
    }
}
