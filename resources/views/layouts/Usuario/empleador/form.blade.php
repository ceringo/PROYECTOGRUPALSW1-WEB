<div class="form-group {{ $errors->has('calificacion_empleador') ? 'has-error' : ''}}">
    <label for="calificacion_empleador" class="control-label">{{ 'Calificacion Empleador' }}</label>
    <input class="form-control" name="calificacion_empleador" type="number" id="calificacion_empleador" value="{{ isset($empleador->calificacion_empleador) ? $empleador->calificacion_empleador : ''}}" >
    {!! $errors->first('calificacion_empleador', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_usuario_movil') ? 'has-error' : ''}}">
    <label for="id_usuario_movil" class="control-label">{{ 'Id Usuario Movil' }}</label>
    <input class="form-control" name="id_usuario_movil" type="number" id="id_usuario_movil" value="{{ isset($empleador->id_usuario_movil) ? $empleador->id_usuario_movil : ''}}" >
    {!! $errors->first('id_usuario_movil', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
