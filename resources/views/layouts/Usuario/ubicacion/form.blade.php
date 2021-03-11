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
<div class="form-group {{ $errors->has('id_usuario_movil') ? 'has-error' : ''}}">
    <label for="id_usuario_movil" class="control-label">{{ 'Id Usuario Movil' }}</label>
    <input class="form-control" name="id_usuario_movil" type="number" id="id_usuario_movil" value="{{ isset($ubicacion->id_usuario_movil) ? $ubicacion->id_usuario_movil : ''}}" >
    {!! $errors->first('id_usuario_movil', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
