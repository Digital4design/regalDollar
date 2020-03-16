<?php
return [
    'client_id' => env('PAYPAL_CLIENT', 'AfzgVTRJ96iUpODF3Pq10ZpzVYRylV5n01-Gx1G0Ap7h5evP7U1tJoAul96LlY3wWiie5l7LeOKJzWJs'),
    'secret' => env('PAYPAL_SECRET', 'ECS7AgNy6NntLnGK0btIy_9nKiwiCl_rS6BQM6t4aLyhPjqfRok77JJDxI_9WcYtReBxKhpqz6HJ2gwt'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', ''),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR',
    ),
];
