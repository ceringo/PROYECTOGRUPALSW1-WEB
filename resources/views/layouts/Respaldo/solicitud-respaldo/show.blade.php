@extends('layouts.app')

@section('content')
     <div class="row">
         <div class="col-md-9">
             <div class="box box-primary box-gris">
                 <div class="box-header with-border my-box-header">
                    <div class="card-header">SolicitudRespaldo {{ $solicitudrespaldo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/respaldo/solicitud-respaldo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/respaldo/solicitud-respaldo/' . $solicitudrespaldo->id . '/edit') }}" title="Edit SolicitudRespaldo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('respaldo/solicitudrespaldo' . '/' . $solicitudrespaldo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SolicitudRespaldo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $solicitudrespaldo->id }}</td>
                                    </tr>
                                    <tr><th> Foto </th><td> {{ $solicitudrespaldo->foto }} </td></tr><tr><th> Curriculum </th><td> {{ $solicitudrespaldo->curriculum }} </td></tr><tr><th> Antecedentes Penales </th><td> {{ $solicitudrespaldo->antecedentes_penales }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
