@extends('layouts.app')

@section('content')
      <div class="col-md-12">
             <div class="box box-primary col-md-12 box-gris">
 
                 <div class="box-header with-border my-box-header">    
                    <div class="card-header">Create New Empleado</div>
                    <div class="card-body">
                        <a href="{{ url('/usuario/empleado') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/usuario/empleado') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('layouts/Usuario.empleado.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        
    </div>
@endsection
