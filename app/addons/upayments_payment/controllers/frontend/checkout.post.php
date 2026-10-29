<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

// Only run on checkout page
if ($mode == 'checkout') {

    // Call your API
    $response = fn_upayments_get_api();

    if(!empty($response)) {
        // Log to verify it runs
        error_log(PHP_EOL.date('d.m.Y h:i:s') . " payment_methods - checkout ".$response['whitelabeled'].' -- CURL DATA '. 'hello 3' , 3, "upayments.log");

        Registry::set('upay_methods', $response);

        // Assign to template (available in all .tpl files)
        Tygh::$app['view']->assign('upay_methods', $response);
    }
}
