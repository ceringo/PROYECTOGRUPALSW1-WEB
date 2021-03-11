<div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
    <label for="fecha_inicio" class="control-label">{{ 'Fecha Inicio' }}</label>
    <input class="form-control" name="fecha_inicio" type="date" id="fecha_inicio" value="{{ isset($contrato->fecha_inicio) ? $contrato->fecha_inicio : ''}}" >
    {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
    <label for="fecha_fin" class="control-label">{{ 'Fecha Fin' }}</label>
    <input class="form-control" name="fecha_fin" type="date" id="fecha_fin" value="{{ isset($contrato->fecha_fin) ? $contrato->fecha_fin : ''}}" >
    {!! $errors->first('fecha_fin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('latitud_empleado') ? 'has-error' : ''}}">
    <label for="latitud_empleado" class="control-label">{{ 'Latitud Empleado' }}</label>
    <input class="form-control" name="latitud_empleado" type="text" id="latitud_empleado" value="{{ isset($contrato->latitud_empleado) ? $contrato->latitud_empleado : ''}}" required>
    {!! $errors->first('latitud_empleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitud_empleado') ? 'has-error' : ''}}">
    <label for="longitud_empleado" class="control-label">{{ 'Longitud Empleado' }}</label>
    <input class="form-control" name="longitud_empleado" type="text" id="longitud_empleado" value="{{ isset($contrato->longitud_empleado) ? $contrato->longitud_empleado : ''}}" required>
    {!! $errors->first('longitud_empleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('calificacion_empleado') ? 'has-error' : ''}}">
    <label for="calificacion_empleado" class="control-label">{{ 'Calificacion Empleado' }}</label>
    <input class="form-control" name="calificacion_empleado" type="number" id="calificacion_empleado" value="{{ isset($contrato->calificacion_empleado) ? $contrato->calificacion_empleado : ''}}" >
    {!! $errors->first('calificacion_empleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('calificacion_empleador') ? 'has-error' : ''}}">
    <label for="calificacion_empleador" class="control-label">{{ 'Calificacion Empleador' }}</label>
    <input class="form-control" name="calificacion_empleador" type="number" id="calificacion_empleador" value="{{ isset($contrato->calificacion_empleador) ? $contrato->calificacion_empleador : ''}}" >
    {!! $errors->first('calificacion_empleador', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado_contrato') ? 'has-error' : ''}}">
    <label for="estado_contrato" class="control-label">{{ 'Estado Contrato' }}</label>
    <input class="form-control" name="estado_contrato" type="text" id="estado_contrato" value="{{ isset($contrato->estado_contrato) ? $contrato->estado_contrato : ''}}" required>
   {!! $errors->first('estado_contrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado_contrato') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="text" id="estado" value="{{ isset($contrato->estado) ? $contrato->estado : ''}}" required>
   {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_solicitud_contrato') ? 'has-error' : ''}}">
    <label for="id_solicitud_contrato" class="control-label">{{ 'Id Contrato' }}</label>
    <select id="id_solicitud_contrato" name="id_solicitud_contrato" class="form-control" required>
                           @foreach($solicitudes as $solicitud)
                           <option value="{{ $solicitud->id_solicitud_contrato }}">{{ $solicitud->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_solicitud_contrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_servicio') ? 'has-error' : ''}}">
    <label for="id_servicio" class="control-label">{{ 'Id Servicio' }}</label>
    <select id="id_servicio" name="id_servicio" class="form-control" required>
                           @foreach($servicios as $servicio)
                           <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_servicio', '<p class="help-block">:message</p>') !!}
</div>

<!--<div class="form-group {{ $errors->has('id_solicitud_contrato') ? 'has-error' : ''}}">
    <label for="id_solicitud_contrato" class="control-label">{{ 'Id Solicitud Contrato' }}</label>
    <input class="form-control" name="id_solicitud_contrato" type="number" id="id_solicitud_contrato" value="{{ isset($contrato->id_solicitud_contrato) ? $contrato->id_solicitud_contrato : ''}}" >
    {!! $errors->first('id_solicitud_contrato', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_servicio') ? 'has-error' : ''}}">
    <label for="id_servicio" class="control-label">{{ 'Id Servicio' }}</label>
    <input class="form-control" name="id_servicio" type="number" id="id_servicio" value="{{ isset($contrato->id_servicio) ? $contrato->id_servicio : ''}}" >
    {!! $errors->first('id_servicio', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
