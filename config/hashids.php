<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        \App\Models\Prueba::class => [
            'salt' => \App\Models\Prueba::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\libro::class => [
            'salt' => \App\Models\libro::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\estudiantes::class => [
            'salt' => \App\Models\estudiantes::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\asesores_academicos::class => [
            'salt' => \App\Models\asesores_academicos::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\tipo_de_usuarios::class => [
            'salt' => \App\Models\tipo_de_usuarios::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\solicitudes::class => [
            'salt' => \App\Models\solicitudes::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\empresas::class => [
            'salt' => \App\Models\empresas::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\asesores_industriales::class => [
            'salt' => \App\Models\asesores_industriales::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        \App\Models\estatus::class => [
            'salt' => \App\Models\estatus::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],
        

    ],

];
