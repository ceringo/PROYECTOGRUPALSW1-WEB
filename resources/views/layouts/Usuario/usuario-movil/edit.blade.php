@extends('layouts.app')

@section('content')
    <div class="col-md-9">
             <div class="box box-primary col-md-12 box-gris">
 
                 <div class="box-header with-border my-box-header">  
                    <div class="card-header">Edit UsuarioMovil #{{ $usuariomovil->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/usuario/usuario-movil') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/usuario/usuario-movil/' . $usuariomovil->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('layouts/Usuario.usuario-movil.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
      
    </div>
@endsection
