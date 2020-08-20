<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_habitacion extends Model
{
    protected $table ='moneda';
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre'];


    
}