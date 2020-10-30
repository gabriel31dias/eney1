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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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
      
       

      

       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check())
        {
          
        } else{
            return redirect()->route('site');
        }
       
        $gg = Session::get('success');
        $codeloja =  Auth::user()->codigo_estabelecimento;
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        $get_total = DB::table('metrics')->where('ID_USER',  $iduser)->first();
        $get_total_access =  isset($get_total->totalaccess) ? $get_total->totalaccess : '';
        $get_total_likes = isset($get_total->totallikes) ? $get_total->totallikes : '';
        $get_total_vendas =  $this->vendas->where('statuspvenda_pg',true)->where("ID_USER", $iduser)->count();
        $get_total_clients = DB::table('clients')->where('ID_USER', $iduser)->count();
        var_dump($get_total_likes);
        $vendasaguardando = $this->vendas->where('statuspvenda_pg',null)->where("ID_USER", $iduser)->whereDate('created_at', Carbon::today())->paginate(10);
        $vendasnaoaprovadas = $this->vendas->where('statuspvenda_pg',false)->where("ID_USER", $iduser)->whereDate('created_at', Carbon::today())->paginate(10);
        $vendasaprovadas = $this->vendas->where('statuspvenda_pg',true)->where("ID_USER", $iduser)->whereDate('created_at', Carbon::today())->paginate(10);
        $getclientes_sms = $this->clisms->paginate(15);
        $roole = Auth::user()->tipo_user ;//3 para admin

        if($gg){

            $this->clisms = DB::table('users')->where('tipo_user', 1)->where('nome_estabelecimento', 'like', '%' . $gg . '%')->paginate(1);
              
        }

        return view('homeapp',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'tipo_op'=> $tipo_op,'vendasaguardando'=> $vendasaguardando,'vendasnaoaprovadas'=>$vendasnaoaprovadas,
        'vendasaprovadas'=>$vendasaprovadas,"codeloja"=>$codeloja, "roole"=>$roole,"clients_sms"=>$getclientes_sms,
        'gg'=>$gg, 'get_total_vendas'=> $get_total_vendas, 'get_total_clients'=>$get_total_clients, 'get_total_access'=>$get_total_access, 'get_total_likes'=> $get_total_likes  ]);
    }

    public function openloja(){
        $getcodeloja = Auth::user()->codigo_estabelecimento;
        return response()->json($getcodeloja);
    }

    public function sair(){
        Auth::logout();
        return redirect("/login");
    }

    public function searchclisms($cliname){
        
        
        return redirect()->back()->with('success', 'Resultado de '.$cliname);   
    }

    public function site(){
        
        return view('site',[]);
    }
}
