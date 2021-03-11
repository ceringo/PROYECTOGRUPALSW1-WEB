<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($servicio->descripcion) ? $servicio->descripcion : ''}}" required>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precio_estandar') ? 'has-error' : ''}}">
    <label for="precio_estandar" class="control-label">{{ 'Precio Estandar' }}</label>
    <input class="form-control" name="precio_estandar" type="number" id="precio_estandar" value="{{ isset($servicio->precio_estandar) ? $servicio->precio_estandar : ''}}" >
    {!! $errors->first('precio_estandar', '<p class="help-block">:message</p>') !!}
</div>
<!--<div class="form-group {{ $errors->has('estado_servicio') ? 'has-error' : ''}}">
    <label for="estado_servicio" class="control-label">{{ 'Estado Servicio' }}</label>
    <input class="form-control" name="estado_servicio" type="text" id="estado_servicio" value="{{ isset($servicio->estado_servicio) ? $servicio->estado_servicio : ''}}" >
    {!! $errors->first('estado_servicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="text" id="estado" value="{{ isset($servicio->estado) ? $servicio->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>-->

<div class="form-group {{ $errors->has('id_especialidad') ? 'has-error' : ''}}">
    <label for="id_especialidad" class="control-label">{{ 'Id Especialidad' }}</label>
    <select id="id_especialidad" name="id_especialidad" class="form-control" required>
                           @foreach($especialidades as $especialidad)
                           <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_especialidad', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('id_empleado') ? 'has-error' : ''}}">
    <label for="id_empleado" class="control-label">{{ 'Id Empleado' }}</label>
    <select id="id_empleado" name="id_empleado" class="form-control" required>
                           @foreach($empleados as $empleado)
                           <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_empleado', '<p class="help-block">:message</p>') !!}
</div>
<!--<div class="form-group {{ $errors->has('id_especialidad') ? 'has-error' : ''}}">
    <label for="id_especialidad" class="control-label">{{ 'Id Especialidad' }}</label>
    <input class="form-control" name="id_especialidad" type="number" id="id_especialidad" value="{{ isset($servicio->id_especialidad) ? $servicio->id_especialidad : ''}}" >
    {!! $errors->first('id_especialidad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_empleado') ? 'has-error' : ''}}">
    <label for="id_empleado" class="control-label">{{ 'Id Empleado' }}</label>
    <input class="form-control" name="id_empleado" type="number" id="id_empleado" value="{{ isset($servicio->id_empleado) ? $servicio->id_empleado : ''}}" >
    {!! $errors->first('id_empleado', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
