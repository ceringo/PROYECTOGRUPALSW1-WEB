<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'precio_estandar', 'estado_servicio', 'estado', 'id_especialidad', 'id_empleado'];

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }
    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
    
}
