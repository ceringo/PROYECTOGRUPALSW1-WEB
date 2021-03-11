@extends('layouts.app')

@section('content')
   <div class="box box-primary box-gris">

    <div class="box-header">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Empleador</div>
                    <div class="card-body">
                        <a href="{{ url('/usuario/empleador/create') }}" class="btn btn-success btn-sm" title="Add New Empleador">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <div class="margin" id="botones_control">

                        <form method="GET" action="{{ url('/usuario/empleador') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Calificacion Empleador</th><th>Id Usuario Movil</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleador as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->calificacion_empleador }}</td><td>{{ $item->id_usuario_movil }}</td>
                                        <td>
                                            <a href="{{ url('/usuario/empleador/' . $item->id) }}" title="View Empleador"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/usuario/empleador/' . $item->id . '/edit') }}" title="Edit Empleador"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/usuario/empleador' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleador" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empleador->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
