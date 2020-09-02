<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "/opcoes/save",
        "/app/addproduto",
        "/app/savevenda/",
        "/app/updatetags",
        "/grupos/update/",
        "/carrinho/saveuser/"

    ];
}
