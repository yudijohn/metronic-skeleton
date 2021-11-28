<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'domain' => [
        'development_prefix' => 'admin',
        'production_url' => null
    ],

    'models' => [
        'user' => yudijohn\Metronic\Models\User::class,
        'role' => yudijohn\Metronic\Models\Role::class
    ],

    'permissions' => [

        'user' => [ 'read', 'create', 'update', 'delete' ],
        'customer' => [ 'read', 'create', 'update', 'delete' ],

    ],

];
