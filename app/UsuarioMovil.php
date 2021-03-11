<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioMovil extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario_movils';

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
    protected $fillable = ['foto', 'nombre', 'apellidos', 'telefono', 'sexo', 'fecha_nacimiento', 'fecha_registro', 'estado', 'id_login'];

    public function login()
    {
        return $this->belongsTo('App\Login');
    }
    
}
