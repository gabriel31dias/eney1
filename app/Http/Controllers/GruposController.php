<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Grupo;

class GruposController extends Controller
{
    private $grupos;
    public function __construct(Grupo $grupos){
      $this->grupos = $grupos;
    }

    public function index(){
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;

        return view('grupos',['user'=>$user , 'username'=>$username,'iduser' => $iduser]);
    }

    public function save(Request $req){
       $req =  $req->all();
       $grupo = $this->grupos->create($req);

       return   $grupo;

    }

    public function list(){
      $iduser = Auth::user()->id;
      $grupos = $this->grupos->where('ID_USER',$iduser)->get();
     return response()->json($grupos);
    }


}
