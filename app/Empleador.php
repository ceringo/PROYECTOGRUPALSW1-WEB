<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleador extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empleadors';

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
    protected $fillable = ['calificacion_empleador', 'id_usuario_movil'];

    public function usuario_movil()
    {
        return $this->belongsTo('App\Usuario_Movil');
    }
    
}
