<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temp;

class TempController extends Controller
{

    private $temp;
    
    public function __construct(Temp $temp)
    {
        $this->temp = $temp ;
    }

    public function settemp(){
      
        

    }


}
