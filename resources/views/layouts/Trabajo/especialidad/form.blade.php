<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($especialidad->nombre) ? $especialidad->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($especialidad->descripcion) ? $especialidad->descripcion : ''}}" required>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('id_area') ? 'has-error' : ''}}">
    <label for="id_area" class="control-label">{{ 'Id Area' }}</label>
    <select id="id_area" name="id_area" class="form-control" required>
                           @foreach($areas as $area)
                           <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                           @endforeach
                  </select> 
                  {!! $errors->first('id_area', '<p class="help-block">:message</p>') !!}
</div>

<!--<div class="form-group {{ $errors->has('id_area') ? 'has-error' : ''}}">
    <label for="id_area" class="control-label">{{ 'Id Area' }}</label>
    <input class="form-control" name="id_area" type="number" id="id_area" value="{{ isset($especialidad->id_area) ? $especialidad->id_area : ''}}" >
    {!! $errors->first('id_area', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
