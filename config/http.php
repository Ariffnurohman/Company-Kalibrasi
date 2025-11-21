<?php

return [

    'middleware' => [

        'aliases' => [

            'role' => \App\Http\Middleware\CheckRole::class,

            // tambahkan ini
            'is_admin' => \App\Http\Middleware\IsAdmin::class,


        ],

    ],

];