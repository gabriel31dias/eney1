<?php

namespace App\Http\Controllers;

use App\Entregadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EntregadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $entregadores;
    

    public function __construct(Entregadores $entregadores){
        $this->entregadores = $entregadores;


    }


    public function index()
    {

        $codeloja =  Auth::user()->codigo_estabelecimento;
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        $roole = Auth::user()->tipo_user ;//3 para admin
        $codeloja =  Auth::user()->codigo_estabelecimento;
        
        return view('entregadores',['user'=>$user , 'username' => $username,'iduser' => $iduser, 
        'tipo_op'=> $tipo_op, 'codeloja'=>$codeloja ]);
        
    }

    
    public function create(Request $req)
    {
       $savepro =  $this->entregadores->create($req->all());
       return $savepro;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function list()
    {
       $entregadores =  $this->entregadores->all();

       return response()->json( $entregadores);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entregadores  $entregadores
     * @return \Illuminate\Http\Response
     */
    public function show(Entregadores $entregadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entregadores  $entregadores
     * @return \Illuminate\Http\Response
     */
    public function edit(Entregadores $entregadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entregadores  $entregadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entregadores $entregadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entregadores  $entregadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $getitem =  $this->entregadores->find($id);
        return   $getitem->delete();
        
    }
}
