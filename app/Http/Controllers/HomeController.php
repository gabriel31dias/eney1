<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return view('homeapp',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'tipo_op'=> $tipo_op]);
    }
}
