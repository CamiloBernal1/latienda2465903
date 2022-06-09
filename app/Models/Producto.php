<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Relacion de producto con marca

    public function categoria(){
        return $this->belongsTo(Categoria::class); 
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
