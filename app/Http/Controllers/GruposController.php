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
        $tipo_op = Auth::user()->tipo_op;
        $user = Auth::user()->email;
        $codeloja =  Auth::user()->codigo_estabelecimento;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        return view('grupos',['user'=>$user , 'username'=>$username,'iduser' => $iduser ,'tipo_op'=> $tipo_op,"codeloja"=>$codeloja]);
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


    public function delete($id){
      $iduser = Auth::user()->id;
      $grupos = $this->grupos->find($id);
      $grupos = $grupos->delete();

      return redirect()->route('grupos');
    }

    public function updateindex($id){
     
      return view('grupoupdate',[]);
    }

    public function item($idgrupo){
      $grupos = $this->grupos->find($idgrupo);
      return response()->json($grupos);
    }

    public function searchbynamegrupo($nomegrupo){
      $iduser = Auth::user()->id;
      $getgrupo = $this->grupos->where('ID_USER',$iduser)->where('NOME_GRUPO', 'like', '%' . $nomegrupo . '%')->get();
      return response()->json($getgrupo);
    }

    public function update(Request $req){
      $getgrupo = $this->grupos->find($req->id);
      $getgrupo =  $getgrupo->update($req->all());
      return response()->json($getgrupo);
    }

    








}
