<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;

class AberturaFechamentoController extends Controller
{
    //

    private $users;

    public function __construct(User $user){
        $this->users = $user;
    }

    public function abreloja($iduser){
      $users = $this->users->where('id',$iduser);
      $users = $users->update(['status_at'=>'true']);
      return redirect()->route('home',[]);
    }

    public function fechaloja($iduser){
        $users = $this->users->where('id',$iduser);
        $users = $users->update(['status_at'=>'false']);
        return redirect()->route('home',[]);
    }
}
