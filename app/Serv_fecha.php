<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serv_fecha extends Model
{
    protected $table ='serv_fecha';
    protected $primaryKey = 'id';    
    protected $fillable = ['nro_serv', 'nro_pedido', 'cantidad','fecha'];

}