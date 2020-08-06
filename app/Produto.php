<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //

    protected $guarded = [];

    public function adicionados(){
        return $this->hasMany(Adicionado::class,'ID_PRODUTO','id');
    }

}
