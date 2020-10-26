<?php

namespace App\Observers;

use App\Venda;
use DB;
use App\Client;

class VendaObserver
{
    /**
     * Handle the venda "created" event.
     *
     * @param  \App\Venda  $venda
     * @return void
     */
    public function created(Venda $venda)
    {
        $client = new Client();
        $verifi_cli = DB::table('clients')->where('TELEFONE', $venda->numerotelefone)->first();
        if(isset($verifi_cli->id)){
            $client =  $client->create(['ID_USER'=> $venda->ID_USER ,'NOMECLIENTE'=> $venda->nomecliente,'TELEFONE'=>  $venda->numerotelefone,'EMAIL'=> "teste"]);
        }
        $settemp = DB::table('temps')->insert( ['value' =>  "venda inserida"]);
        //criar envio de email----
 //$venda->email
    }

    /**
     * Handle the venda "updated" event.
     *
     * @param  \App\Venda  $venda
     * @return void
     */
    public function updated(Venda $venda)
    {
        //
    }

    /**
     * Handle the venda "deleted" event.
     *
     * @param  \App\Venda  $venda
     * @return void
     */
    public function deleted(Venda $venda)
    {
        //
    }

    /**
     * Handle the venda "restored" event.
     *
     * @param  \App\Venda  $venda
     * @return void
     */
    public function restored(Venda $venda)
    {
        //
    }

    /**
     * Handle the venda "force deleted" event.
     *
     * @param  \App\Venda  $venda
     * @return void
     */
    public function forceDeleted(Venda $venda)
    {
        //
    }
}
