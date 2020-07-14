<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstabelecimentosController extends Controller
{
    
    public function index($codigoestabelecimento){

        return "o estabelecimento é".$codigoestabelecimento;
    }
}
