<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_habitacion extends Model
{
    protected $table ='tipo_habitacion';
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre'];


    
}