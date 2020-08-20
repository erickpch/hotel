<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table ='moneda';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'cambio'];


    
}
