<?php

namespace App\Observers;

use App\Venda;
use DB;

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
        //

        $getvalue = json_encode($venda);
        $settemp = DB::table('temps')->insert( ['value' =>  "venda inserida"]);



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
