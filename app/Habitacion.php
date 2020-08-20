<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table ='habitacion';
    protected $primaryKey = 'nro_habitacion';
    public $timestamps = false;
    protected $fillable = ['tipo', 'precio', 'capacidad', 'dormitorios', 'baños', 'dimension', 'descripcion', 'link_imagen'];

}
