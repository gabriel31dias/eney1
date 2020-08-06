<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Adicional;
use App\Produto;
use Illuminate\Support\Facades\Auth;



use App\adicionado;

////Adicionais adicionados ao produto//////

class AdicionadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $adicionais;
    private $adicionado;
    private $produto;

    public function __construct(Adicional $adicionais,adicionado $adicionado,Produto $produto){
      $this->adicionais = $adicionais; 
      $this->adicionado = $adicionado;
      $this->produto = $produto;
    }


    public function index($idproduto)
    {
        $produto = $this->produto->find($idproduto);
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        return view('add_adicional',['user'=>$user , 'username' => $username,'iduser' => $iduser,'tipo_op'=> $tipo_op,'nomeproduto'=>  $produto->NOME_PRODUTO,'produto'=> $produto]);
    }

    public function adicionados($idproduto){
      
        $produto = $this->adicionado->with('adicionais')->where('ID_PRODUTO',$idproduto)->get();
       // $getidadicional =  $produto->adicional;
       
       return response()->json(     $produto );
    }

    public function addadicionalaoproduto($idproduto,$idadicional){
        $get_adicionados = $this->adicionado;
        $get_adicionados = $get_adicionados->where('ID_ADICIONAL',$idadicional)->where('ID_PRODUTO',$idproduto)->first();
    
        if(isset($get_adicionados->id)){
            throw new \Exception("failed"); //Se ja tiver cadastrado o adicional nesse produto
        }else{
            $adicionado = $this->adicionado->create([
                'ID_ADICIONAL'=>$idadicional,
                'ID_PRODUTO'=>$idproduto
               ]);
               return  $adicionado;
        }
    }


    public function getadicionais($idproduto){
        
        $produto = $this->adicionado->where('ID_PRODUTO',$idproduto)->get();
       // $getidadicional =  $produto->adicional;
       
       return response()->json( $produto );
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\adicionado  $adicionado
     * @return \Illuminate\Http\Response
     */
    public function show(adicionado $adicionado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adicionado  $adicionado
     * @return \Illuminate\Http\Response
     */
    public function edit(adicionado $adicionado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adicionado  $adicionado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adicionado $adicionado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adicionado  $adicionado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idproduto)
    {
     $getadd = $this->adicionado->find($id);
     $getadd = $getadd->delete();
     return redirect('/adicionaisindex/'.$idproduto);
    }
}
