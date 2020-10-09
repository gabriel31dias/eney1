<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
USE Carbon\Carbon;

class Produto extends Model
{
    //

    protected $guarded = [];

    public function adicionados(){
        return $this->hasMany(Adicionado::class,'ID_PRODUTO','id');
    }

    public static function verifica_tempo_promocao($codeloja,$id){
      
        $iduser =  DB::table('users')->where('codigo_estabelecimento',$codeloja)->first();
  
        
        $promoces = DB::table('produtos')->where('ID_USER',  $iduser->id )->where('id', $id)->where('PROMOCAO',true)
        ->where('DATA_INICIO_PROMOCAO', '<=' , Carbon::now())
        ->where('DATA_FINAL_PROMOCAO', '>' , Carbon::now() )
        ->first();
        var_dump($promoces);
  
        if(isset($promoces->id)){

           return true;

         }else{
             
            return false;
         }
       
          
      }

}
