<div class="form-group {{ $errors->has('latitud') ? 'has-error' : ''}}">
    <label for="latitud" class="control-label">{{ 'Latitud' }}</label>
    <input class="form-control" name="latitud" type="text" id="latitud" value="{{ isset($ubicacion->latitud) ? $ubicacion->latitud : ''}}" required>
    {!! $errors->first('latitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitud') ? 'has-error' : ''}}">
    <label for="longitud" class="control-label">{{ 'Longitud' }}</label>
    <input class="form-control" name="longitud" type="text" id="longitud" value="{{ isset($ubicacion->longitud) ? $ubicacion->longitud : ''}}" required>
    {!! $errors->first('longitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="text" id="foto" value="{{ isset($usuariomovil->foto) ? $usuariomovil->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($usuariomovil->nombre) ? $usuariomovil->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
    <label for="apellidos" class="control-label">{{ 'Apellidos' }}</label>
    <input class="form-control" name="apellidos" type="text" id="apellidos" value="{{ isset($usuariomovil->apellidos) ? $usuariomovil->apellidos : ''}}" required>
    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    <label for="correo" class="control-label">{{ 'Correo' }}</label>
    <input class="form-control" name="correo" type="email" id="correo" value="{{ isset($login->correo) ? $login->correo : ''}}" >
    {!! $errors->first('correo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pasword') ? 'has-error' : ''}}">
    <label for="pasword" class="control-label">{{ 'Pasword' }}</label>
    <input class="form-control" name="pasword" type="password" id="pasword" >
    {!! $errors->first('pasword', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
    <input class="form-control" name="telefono" type="text" id="telefono" value="{{ isset($usuariomovil->telefono) ? $usuariomovil->telefono : ''}}" required>
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
    <label for="sexo" class="control-label">{{ 'Sexo' }}</label>
    <select name="sexo" class="form-control" id="sexo" >
    @foreach (json_decode('{"masculino":"Masculino","femenino":"Femenino"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($usuariomovil->sexo) && $usuariomovil->sexo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('sexo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
    <label for="fecha_nacimiento" class="control-label">{{ 'Fecha Nacimiento' }}</label>
    <input class="form-control" name="fecha_nacimiento" type="date" id="fecha_nacimiento" value="{{ isset($usuariomovil->fecha_nacimiento) ? $usuariomovil->fecha_nacimiento : ''}}" >
    {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
</div>
<!--<input type="date" name="fecha_registro" id="fecha_registro"  value="<?php echo date("Y-m-d");?>">
<input type="text" name="estado" id="estado" value="1">-->
<!--<div class="form-group {{ $errors->has('fecha_registro') ? 'has-error' : ''}}">
    <label for="fecha_registro" class="control-label">{{ 'Fecha Registro' }}</label>
    <input class="form-control" name="fecha_registro" type="date" id="fecha_registro" value="{{ isset($usuariomovil->fecha_registro) ? $usuariomovil->fecha_registro : ''}}" >
    {!! $errors->first('fecha_registro', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="text" id="estado" value="{{ isset($usuariomovil->estado) ? $usuariomovil->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_login') ? 'has-error' : ''}}">
    <label for="id_login" class="control-label">{{ 'Id Login' }}</label>
    <input class="form-control" name="id_login" type="number" id="id_login" value="{{ isset($usuariomovil->id_login) ? $usuariomovil->id_login : ''}}" >
    {!! $errors->first('id_login', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
