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

    public static function countMsgmonth($codeloja){

      $loja =  DB::table('users')->where('codigo_estabelecimento',$codeloja)->whereMonth('created_at', Carbon::now()->month)->get()->count();
      return  $loja;
       // ;
    }

   
}
