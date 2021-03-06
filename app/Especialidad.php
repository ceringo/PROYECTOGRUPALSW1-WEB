<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'especialidads';

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
    protected $fillable = ['nombre', 'descripcion', 'id_area'];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    
}
