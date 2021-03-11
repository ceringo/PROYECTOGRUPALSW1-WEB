<div class="form-group {{ $errors->has('latitud_empleador') ? 'has-error' : ''}}">
    <label for="latitud_empleador" class="control-label">{{ 'Latitud Empleador' }}</label>
    <input class="form-control" name="latitud_empleador" type="text" id="latitud_empleador" value="{{ isset($solicitudcontrato->latitud_empleador) ? $solicitudcontrato->latitud_empleador : ''}}" required>
    {!! $errors->first('latitud_empleador', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitud_empleador') ? 'has-error' : ''}}">
    <label for="longitud_empleador" class="control-label">{{ 'Longitud Empleador' }}</label>
    <input class="form-control" name="longitud_empleador" type="text" id="longitud_empleador" value="{{ isset($solicitudcontrato->longitud_empleador) ? $solicitudcontrato->longitud_empleador : ''}}" >
    {!! $errors->first('longitud_empleador', '<p class="help-block">:message</p>') !!}
</div>
<!--<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($solicitudcontrato->fecha) ? $solicitudcontrato->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>-->
<!--<div class="form-group {{ $errors->has('estado_solicitud') ? 'has-error' : ''}}">
    <label for="estado_solicitud" class="control-label">{{ 'Estado Solicitud' }}</label>
    <input class="form-control" name="estado_solicitud" type="text" id="estado_solicitud" value="{{ isset($solicitudcontrato->estado_solicitud) ? $solicitudcontrato->estado_solicitud : ''}}" >
    {!! $errors->first('estado_solicitud', '<p class="help-block">:message</p>') !!}
</div>-->
<div class="form-group {{ $errors->has('id_empleador') ? 'has-error' : ''}}">
    <label for="id_empleador" class="control-label">{{ 'Id Empleador' }}</label>
    <select id="id_empleador" name="id_empleador" class="form-control" required>
                           @foreach($empleadores as $empleador)
                           <option value="{{ $empleador->id }}">{{ $empleador->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_empleador', '<p class="help-block">:message</p>') !!}
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

<!--<div class="form-group {{ $errors->has('id_empleador') ? 'has-error' : ''}}">
    <label for="id_empleador" class="control-label">{{ 'Id Empleador' }}</label>
    <input class="form-control" name="id_empleador" type="number" id="id_empleador" value="{{ isset($solicitudcontrato->id_empleador) ? $solicitudcontrato->id_empleador : ''}}" >
    {!! $errors->first('id_empleador', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_servicio') ? 'has-error' : ''}}">
    <label for="id_servicio" class="control-label">{{ 'Id Servicio' }}</label>
    <input class="form-control" name="id_servicio" type="number" id="id_servicio" value="{{ isset($solicitudcontrato->id_servicio) ? $solicitudcontrato->id_servicio : ''}}" >
    {!! $errors->first('id_servicio', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
