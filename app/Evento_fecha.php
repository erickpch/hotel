<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento_fecha extends Model
{
    protected $table ='evento_fecha';
    protected $primaryKey = 'id';    
    protected $fillable = ['nro_evento', 'nro_pedido', 'fecha'];

}