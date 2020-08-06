<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adicionado extends Model
{
    protected $guarded = [];
    public function adicionais(){ ///pertence a qual add
        return $this->belongsTo(Adicional::class,'ID_ADICIONAL','id');
    }
}
