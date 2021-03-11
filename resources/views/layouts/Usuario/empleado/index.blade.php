@extends('layouts.app')

@section('content')
   <div class="box box-primary box-gris">

    <div class="box-header">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Empleado</div>
                    <div class="card-body">
                        <a href="{{ url('/usuario/empleado/create') }}" class="btn btn-success btn-sm" title="Add New Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <div class="margin" id="botones_control">

                        <form method="GET" action="{{ url('/usuario/empleado') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Calificacion Empleado</th><th>Estado Respaldo</th><th>Id Usuario Movil</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleado as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->calificacion_empleado }}</td><td>{{ $item->estado_respaldo }}</td><td>{{ $item->id_usuario_movil }}</td>
                                        <td>
                                            <a href="{{ url('/usuario/empleado/' . $item->id) }}" title="View Empleado"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/usuario/empleado/' . $item->id . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/usuario/empleado' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empleado->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
