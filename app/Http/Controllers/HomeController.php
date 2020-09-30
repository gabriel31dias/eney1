<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\VendaController;
use App\Smsenviado;
use App\Venda;
use Carbon\Carbon;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $vendas;
    private $clisms;
    public function __construct(Venda $venda, User $sms)
    {
        $this->vendas =  $venda;
        $this->clisms = $sms;///Pega clientes e seus sms enviados
        $this->clisms = $this->clisms->where('tipo_user', 1);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $codeloja =  Auth::user()->codigo_estabelecimento;
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        $vendasaguardando = $this->vendas->where('statuspvenda_pg',null)->whereDate('created_at', Carbon::today())->get();
        $vendasnaoaprovadas = $this->vendas->where('statuspvenda_pg',false)->whereDate('created_at', Carbon::today())->get();
        $vendasaprovadas = $this->vendas->where('statuspvenda_pg',true)->whereDate('created_at', Carbon::today())->get();
        $getclientes_sms = $this->clisms->paginate(15);
        $roole = Auth::user()->tipo_user;//3 para admin

        return view('homeapp',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'tipo_op'=> $tipo_op,'vendasaguardando'=> $vendasaguardando,'vendasnaoaprovadas'=>$vendasnaoaprovadas,'vendasaprovadas'=>$vendasaprovadas,"codeloja"=>$codeloja, "roole"=>$roole,"clients_sms"=>$getclientes_sms ]);
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
