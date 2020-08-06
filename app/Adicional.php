<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    protected $guarded = [];
    protected $table = 'adicionais';

  public function produto(){
        return $this->belongsTo(Produto::class,'ADICIONAL','id');
  }

  

}
