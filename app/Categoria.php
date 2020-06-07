<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categoria extends Model
{
    use SoftDeletes;

    public function roupa(){
        return $this->hasMany('App\Roupa', 'id_categoria', 'id');
    }

}
