<?php

namespace App\Http\Controllers\Trabajo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Objeto;
use App\Area;
use Illuminate\Http\Request;

class ObjetoController extends Controller
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
            $objeto = Objeto::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('id_objeto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $objeto = Objeto::latest()->paginate($perPage);
        }

        return view('layouts/Trabajo.objeto.index', compact('objeto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $areas = Area::get();
        return view('layouts/Trabajo.objeto.create')->with('areas', $areas);
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
			'nombre' => 'required'
		]);
        $requestData = $request->all();
        
        Objeto::create($requestData);

        return redirect('trabajo/objeto')->with('flash_message', 'Objeto added!');
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
        $objeto = Objeto::findOrFail($id);

        return view('layouts/Trabajo.objeto.show', compact('objeto'));
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
        $objeto = Objeto::findOrFail($id);

        //Solucion trucha by wily
        $areas = Especialidad::get();

        return view('layouts/Trabajo.objeto.edit', compact('objeto'));
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
			'nombre' => 'required'
		]);
        $requestData = $request->all();
        
        $objeto = Objeto::findOrFail($id);
        $objeto->update($requestData);

        return redirect('trabajo/objeto')->with('flash_message', 'Objeto updated!');
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
        Objeto::destroy($id);

        return redirect('trabajo/objeto')->with('flash_message', 'Objeto deleted!');
    }
}
