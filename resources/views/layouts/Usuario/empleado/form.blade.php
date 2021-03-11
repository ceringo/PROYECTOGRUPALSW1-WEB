<div class="form-group {{ $errors->has('calificacion_empleado') ? 'has-error' : ''}}">
    <label for="calificacion_empleado" class="control-label">{{ 'Calificacion Empleado' }}</label>
    <input class="form-control" name="calificacion_empleado" type="number" id="calificacion_empleado" value="{{ isset($empleado->calificacion_empleado) ? $empleado->calificacion_empleado : ''}}" >
    {!! $errors->first('calificacion_empleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado_respaldo') ? 'has-error' : ''}}">
    <label for="estado_respaldo" class="control-label">{{ 'Estado Respaldo' }}</label>
    <input class="form-control" name="estado_respaldo" type="text" id="estado_respaldo" value="{{ isset($empleado->estado_respaldo) ? $empleado->estado_respaldo : ''}}" >
    {!! $errors->first('estado_respaldo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_usuario_movil') ? 'has-error' : ''}}">
    <label for="id_usuario_movil" class="control-label">{{ 'Id Usuario Movil' }}</label>
    <input class="form-control" name="id_usuario_movil" type="number" id="id_usuario_movil" value="{{ isset($empleado->id_usuario_movil) ? $empleado->id_usuario_movil : ''}}" >
    {!! $errors->first('id_usuario_movil', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
