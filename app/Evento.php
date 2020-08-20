<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table ='evento';
    protected $primaryKey = 'nro_salon';
    public $timestamps = false;
    protected $fillable = ['nombre', 'precio', 'descripcion', 'link_imagen'];

}
