<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Token length
    |--------------------------------------------------------------------------
    |
    | Here you may specify the length of the token that is generated. Shorter
    | tokens are great for keeping links friendlier, but allow for more chance
    | of brute-forcing an existing token.
    |
    */

    'length' => 10,

    /*
    |--------------------------------------------------------------------------
    | Token lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specifiy the number of minutes you wish the autologin token
    | to remain active.
    |
    */

    'lifetime' => 131400,

    /*
    |--------------------------------------------------------------------------
    | Token usage
    |--------------------------------------------------------------------------
    |
    | Indicate whether each time the token is used while it is valid, the count
    | on the column should be incremented. Be sure to disable this if you use
    | the next option, removing used tokens.
    |
    */

    'count' => false,

    /*
    |--------------------------------------------------------------------------
    | Destroy expired/used tokens
    |--------------------------------------------------------------------------
    |
    | If this value is set to true when a token is generated all expired tokens
    | will be removed from storage.
    |
    */

    'remove_expired' => false,

    /*
    |--------------------------------------------------------------------------
    | AutologinInterface provider
    |--------------------------------------------------------------------------
    |
    | Here you may specify the class which implements AutologinInterface
    | for the purpose of creating, reading and deleting autologin tokens. By
    | default, we have a nice Eloquent one ready for you. Be sure to publish
    | and run the package migration as well.
    |
    */

    'autologin_provider' => Watson\Autologin\Providers\EloquentAutologinProvider::class,

    /*
    |--------------------------------------------------------------------------
    | AuthenticationInterface provider
    |--------------------------------------------------------------------------
    |
    | Here you may specify the class which implements AuthenticateInterface
    | for the purpose of logging in a user once the token they have provided
    | has been validated. By default, we've got the Laravel Auth provider. You
    | can also use 'Watson\Autologin\Providers\SentryAuthenticationProvider' if
    | you're using Sentry, otherwise use your own implementation.
    |
    */

    'authentication_provider' => Watson\Autologin\Providers\AuthAuthenticationProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Route name
    |--------------------------------------------------------------------------
    |
    | Here you may specify the name of the route you'd like to use so that
    | the correct path can be generated for tokens.
    |
    */

    'route_name' => 'autologin',

];
