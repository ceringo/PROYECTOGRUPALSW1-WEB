<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ubicacions';

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
    protected $fillable = ['latitud', 'longitud', 'id_usuario_movil'];

    public function usuariomovil()
    {
        return $this->belongsTo('App\UsuarioMovil');
    }
    
}
