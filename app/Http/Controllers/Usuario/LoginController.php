<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
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
            $login = Login::where('correo', 'LIKE', "%$keyword%")
                ->orWhere('pasword', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $login = Login::latest()->paginate($perPage);
        }

        return view('layouts/Usuario.login.index', compact('login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts/Usuario.login.create');
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
        
        Login::create($requestData);

        return redirect('usuario/login')->with('flash_message', 'Login added!');
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
        $login = Login::findOrFail($id);

        return view('layouts/Usuario.login.show', compact('login'));
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
        $login = Login::findOrFail($id);

        return view('layouts/Usuario.login.edit', compact('login'));
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
        
        $login = Login::findOrFail($id);
        $login->update($requestData);

        return redirect('usuario/login')->with('flash_message', 'Login updated!');
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
        Login::destroy($id);

        return redirect('usuario/login')->with('flash_message', 'Login deleted!');
    }
}
