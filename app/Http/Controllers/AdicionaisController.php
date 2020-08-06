<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Adicional;
use App\adicionado;

class AdicionaisController extends Controller
{
    //

    private $adicionais ;
    private $adicionados;
    public function __construct(Adicional $ad,adicionado $adicionados){
        
        $this->adicionais = $ad;
        $this->adicionados = $adicionados;

    }

    public function index(){
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        return view('adicionais',['user'=>$user , 'username' => $username,'iduser' => $iduser,'tipo_op'=> $tipo_op ]);
    }

    public function list(){
        $iduser = Auth::user()->id;
        // $adicionais = $this->adicionais->where('ID_USER', $iduser )->get();
        $adicionais = $this->adicionais->with('produto')->where('ID_USER',$iduser )->get();
      // $adicionais = $this->adicionais->with('produto')->get();
         return response()->json($adicionais);
    }



    public function save(Request $req){
      $req = $req->all();
      $adici = $this->adicionais;
      $adici = $adici->create($req);
      return $adici;
    }

    public function delete($id){
      $adicional =  $this->adicionais->find($id);
      $adicionados = $this->adicionados->where('ID_ADICIONAL',$id);
      $adicionados = $adicionados->delete();
      $adicional  = $adicional->delete();
      return redirect()->route('adicionais');
    }

    public function item($idadicional){
      $adicional =  $this->adicionais->find($idadicional);
      return response()->json( $adicional);
    }

    public function update(Request $req){
       $getidproduto = $req->ID_PRODUTO;
       $getnomeproduto = $req->ADICIONAL;
       $getpreco =  $req->PRECO;
       $adicionais =  $this->adicionais->find($getidproduto);
       $adicionais->ADICIONAL =  $getnomeproduto;
       $adicionais->PRECO =  $getpreco;
       $adicionais->update();
       return  $adicionais;
    }


    


}
