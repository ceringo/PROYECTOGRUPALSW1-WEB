<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudContrato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitud_contratos';

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

     //Cambiar fecha por fecha_solicitud
    protected $fillable = ['latitud_empleador', 'longitud_empleador', 'fecha', 'estado_solicitud', 'estado', 'id_empleador', 'id_servicio'];

    public function empleador()
    {
        return $this->belongsTo('App\Empleador');
    }
    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }
    
}
