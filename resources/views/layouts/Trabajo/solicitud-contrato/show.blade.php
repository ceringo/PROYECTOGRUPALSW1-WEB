@extends('layouts.app')

@section('content')
     <div class="row">
         <div class="col-md-9">
             <div class="box box-primary box-gris">
                 <div class="box-header with-border my-box-header">
                    <div class="card-header">SolicitudContrato {{ $solicitudcontrato->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/trabajo/solicitud-contrato') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/trabajo/solicitud-contrato/' . $solicitudcontrato->id . '/edit') }}" title="Edit SolicitudContrato"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('trabajo/solicitudcontrato' . '/' . $solicitudcontrato->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SolicitudContrato" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $solicitudcontrato->id }}</td>
                                    </tr>
                                    <tr><th> Latitud Empleador </th><td> {{ $solicitudcontrato->latitud_empleador }} </td></tr><tr><th> Longitud Empleador </th><td> {{ $solicitudcontrato->longitud_empleador }} </td></tr><tr><th> Fecha </th><td> {{ $solicitudcontrato->fecha }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
