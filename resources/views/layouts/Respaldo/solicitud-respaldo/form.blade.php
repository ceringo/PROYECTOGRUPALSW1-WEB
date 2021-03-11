<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="text" id="foto" value="{{ isset($solicitudrespaldo->foto) ? $solicitudrespaldo->foto : ''}}" required>
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('curriculum') ? 'has-error' : ''}}">
    <label for="curriculum" class="control-label">{{ 'Curriculum' }}</label>
    <input class="form-control" name="curriculum" type="text" id="curriculum" value="{{ isset($solicitudrespaldo->curriculum) ? $solicitudrespaldo->curriculum : ''}}" required>
    {!! $errors->first('curriculum', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('antecedentes_penales') ? 'has-error' : ''}}">
    <label for="antecedentes_penales" class="control-label">{{ 'Antecedentes Penales' }}</label>
    <input class="form-control" name="antecedentes_penales" type="text" id="antecedentes_penales" value="{{ isset($solicitudrespaldo->antecedentes_penales) ? $solicitudrespaldo->antecedentes_penales : ''}}" required>
    {!! $errors->first('antecedentes_penales', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('foto_ci') ? 'has-error' : ''}}">
    <label for="foto_ci" class="control-label">{{ 'Foto Ci' }}</label>
    <input class="form-control" name="foto_ci" type="text" id="foto_ci" value="{{ isset($solicitudrespaldo->foto_ci) ? $solicitudrespaldo->foto_ci : ''}}" required>
    {!! $errors->first('foto_ci', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_solicitud') ? 'has-error' : ''}}">
    <label for="fecha_solicitud" class="control-label">{{ 'Fecha Solicitud' }}</label>
    <input class="form-control" name="fecha_solicitud" type="date" id="fecha_solicitud" value="{{ isset($solicitudrespaldo->fecha_solicitud) ? $solicitudrespaldo->fecha_solicitud : ''}}" >
    {!! $errors->first('fecha_solicitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('latitud') ? 'has-error' : ''}}">
    <label for="latitud" class="control-label">{{ 'Latitud' }}</label>
    <input class="form-control" name="latitud" type="text" id="latitud" value="{{ isset($solicitudrespaldo->latitud) ? $solicitudrespaldo->latitud : ''}}" required>
    {!! $errors->first('latitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitud') ? 'has-error' : ''}}">
    <label for="longitud" class="control-label">{{ 'Longitud' }}</label>
    <input class="form-control" name="longitud" type="text" id="longitud" value="{{ isset($solicitudrespaldo->longitud) ? $solicitudrespaldo->longitud : ''}}" required>
    {!! $errors->first('longitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="text" id="estado" value="{{ isset($solicitudrespaldo->estado) ? $solicitudrespaldo->estado : ''}}" required>
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
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
<!--<div class="form-group {{ $errors->has('id_servicio') ? 'has-error' : ''}}">
    <label for="id_servicio" class="control-label">{{ 'Id Servicio' }}</label>
    <input class="form-control" name="id_servicio" type="number" id="id_servicio" value="{{ isset($solicitudrespaldo->id_servicio) ? $solicitudrespaldo->id_servicio : ''}}" >
    {!! $errors->first('id_servicio', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
