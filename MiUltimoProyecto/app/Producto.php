<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";//especificar tabla pero solo si la tabla tiene el nombre en plural pero tambian jala si es en singular
    protected $fillable = ['nombre','img','stock','codigo'];

}
