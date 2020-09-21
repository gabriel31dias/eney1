<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\VendaController;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $vendas;
    public function __construct(VendaController $venda)
    {
        $this->vendas =  $venda;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        $vendasnaoaprovadas = $this->vendas->listvendasnaoaprovadas();
        var_dump($vendasnaoaprovadas);
        return view('homeapp',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'tipo_op'=> $tipo_op,'vendasnaoaprovadas'=> $vendasnaoaprovadas]);
    }

    public function openloja(){
        $getcodeloja = Auth::user()->codigo_estabelecimento;
        return response()->json($getcodeloja);
    }

    public function sair(){
        Auth::logout();
        return redirect("/login");
    }
}
