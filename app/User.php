<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getclient($tipoget,$codeloja){
      $loja =  DB::table('users')->where('codigo_estabelecimento',$codeloja)->value($tipoget);
      return  $loja;
    }

    public static function countMsgmMonth($codeloja){

      $countsms =  DB::table('smsenviados')->where('code_loja',$codeloja)
      ->whereMonth('created_at', Carbon::now()->format('m'))
      ->whereYear('created_at', Carbon::now()->format('Y'))->get()
      ->count();
      return  $countsms;
       // ;
    }


    public static function countMsgTotal($codeloja){

        $countsms =  DB::table('smsenviados')->where('code_loja',$codeloja)
        ->count();
        return  $countsms;
         // ;
      }

   
}
