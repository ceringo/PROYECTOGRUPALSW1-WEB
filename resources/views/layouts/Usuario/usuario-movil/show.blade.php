@extends('layouts.app')

@section('content')
     <div class="row">
         <div class="col-md-9">
             <div class="box box-primary box-gris">
                 <div class="box-header with-border my-box-header">
                    <div class="card-header">UsuarioMovil {{ $usuariomovil->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/usuario/usuario-movil') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/usuario/usuario-movil/' . $usuariomovil->id . '/edit') }}" title="Edit UsuarioMovil"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('usuario/usuariomovil' . '/' . $usuariomovil->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete UsuarioMovil" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $usuariomovil->id }}</td>
                                    </tr>
                                    <tr><th> Foto </th><td> {{ $usuariomovil->foto }} </td></tr><tr><th> Nombre </th><td> {{ $usuariomovil->nombre }} </td></tr><tr><th> Apellidos </th><td> {{ $usuariomovil->apellidos }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
