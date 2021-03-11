<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'objetos';

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
    protected $fillable = ['nombre', 'id_area'];

    public function especialidad()
    {
        return $this->belongsTo('App\Area');
    }
    
}
