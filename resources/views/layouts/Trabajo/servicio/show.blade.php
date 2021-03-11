@extends('layouts.app')

@section('content')
     <div class="row">
         <div class="col-md-9">
             <div class="box box-primary box-gris">
                 <div class="box-header with-border my-box-header">
                    <div class="card-header">Servicio {{ $servicio->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/trabajo/servicio') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/trabajo/servicio/' . $servicio->id . '/edit') }}" title="Edit Servicio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('trabajo/servicio' . '/' . $servicio->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Servicio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $servicio->id }}</td>
                                    </tr>
                                    <tr><th> Descripcion </th><td> {{ $servicio->descripcion }} </td></tr><tr><th> Precio Estandar </th><td> {{ $servicio->precio_estandar }} </td></tr><tr><th> Estado Servicio </th><td> {{ $servicio->estado_servicio }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
