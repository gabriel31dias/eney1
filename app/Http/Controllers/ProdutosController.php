<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Produto;

class ProdutosController extends Controller
{
    //
    private $user;
    private $email;
    private $produtos;

    
    public function __construct(Produto $produtos){
        $this->produtos = $produtos;
   
    }


    public function index(){

        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        

        return view('produtos',['user'=>$user , 'username' => $username,'iduser' => $iduser]);
    }

    public function save(Request $req){
        $req = $req->all();
        $produtos = $this->produtos->create($req);

       return $produtos;
    }

    public function list(){
       $iduser = Auth::user()->id;
       $pro =  $this->produtos->where('ID_USER',$iduser)->get();

       return response()->json($pro);
    }

    public function editview($id){
    

        $user = Auth::user()->email;
        $username = Auth::user()->name;

        $getproduto = $this->produtos->find($id);


        return view('produtosedit',['user'=>$user , 'username' => $username,'produto'=>$getproduto]);

    }

    public function img($id){
        $produ = $this->produtos->find($id);
        $produimg = $produ;
      
        return view('img',['img'=> $produimg]);
    }


}
