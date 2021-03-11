<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contratos';

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
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'latitud_empleado', 'longitud_empleado', 'calificacion_empleado', 'calificacion_empleador', 'estado_contrato', 'estado', 'id_solicitud_contrato', 'id_servicio'];

    public function solicitud_contrato()
    {
        return $this->belongsTo('App\SolicitudContrato');
    }
    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }
    
}
