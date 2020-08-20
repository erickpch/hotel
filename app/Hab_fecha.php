<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hab_fecha extends Model
{
    protected $table ='hab_fecha';
    protected $primaryKey = 'id';    
    
    protected $fillable = ['nro_hab', 'nro_pedido', 'fecha'];

}