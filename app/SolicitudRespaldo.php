<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudRespaldo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitud_respaldos';

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
    protected $fillable = ['foto', 'curriculum', 'antecedentes_penales', 'foto_ci', 'fecha_solicitud', 'latitud', 'longitud', 'estado', 'id_servicio'];

    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }
    
}
