<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table ='factura';
    protected $primaryKey = 'nro';
    protected $fillable = ['pedido', 'nombre', 'nit','direccion','codigo_postal','costo','iva','total','estado'];

}