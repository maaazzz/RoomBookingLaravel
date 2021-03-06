<?php

/**
 * PayPal Setting & API Credentials
 */

return [
    // add your correct paypal credentials
    'client_id' => '',
    'secret' => '',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
