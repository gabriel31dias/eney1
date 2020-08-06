<?php

namespace App\Http\Controllers;

use App\Forma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class FormaController extends Controller
{


    public $user;
    public $email;
    public $categoria_formas = [];
    public $codigos_nfe;
    
    private $formas;
   

    public function __construct(Forma $formas){
        //Formas padrão config----------------------
        $this->categoria_formas = ['k1'=>'Dinheiro','k2'=>'Prazo','k3'=>'Carta frete','k4'=>'Cartão de crédito','k5'=>'Ticket'];
        $this->codigos_nfe = ['k1'=>'01-Dinheiro','k2'=>'02-Cheque','k3'=>'03-Cartão Crédito',
        'k4'=>'04-Cartão de Débito', 'k5'=>'05-Crédito Loja', 
        'k7'=>'10-Vale Alimentação','k8'=>'11-Vale refeição','k9'=>'12-Vale presente','k10'=>'13-Vale combustivel',
        'k11'=>'14-Duplicata mercantil' ,'k13'=>'90-Sem pagamentos','k14'=>'99-Outros'
        ];

        $this->formas =  $formas;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tipo_op = Auth::user()->tipo_op;
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $formas =  $this->formas->all();
       
        return view('formasdepagamento',['user'=>$user , 'username' => $username,'iduser' => $iduser,'codigosnfe'=> $this->codigos_nfe,'formas'=> $formas,'tipo_op'=> $tipo_op]);
    }


    public function list($iduser){
       $formas = $this->formas->where('ID_USER',$iduser)->get();
       return response()->json( $formas );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $req = $req->all();
        $formas = $this->formas;
        $formas = $formas->create($req);

        if($formas){
            return redirect()->route('formaspg',['s'=>'true']);
        }
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
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function show(Forma $forma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function edit(Forma $forma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forma $forma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forma  $forma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $formas = $this->formas->where('id',$id);
      $formas = $formas->delete();
      return redirect()->route('formaspg',['ex'=>'true']);
    }

    public function inativa($id){
      $formas = $this->formas->where('id',$id);
      $formas = $formas->update(['STATUS'=>'false']);

    }

    public function ativa($id){
        $formas = $this->formas->where('id',$id);
        $formas = $formas->update(['STATUS'=>'true']);
    }

    
    public function inativado_ou_ativado($id){
        $formas = $this->formas->where('id',$id)->first();
        $formas = $formas->STATUS;
        return response()->json($formas);
    }


    
  
     

    
}
