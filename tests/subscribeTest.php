<?php
require_once(__DIR__.'/../lib/autoloader.php');

$pubnub = new \Pubnub\Pubnub( 'demo', 'demo', false , false, false );
$pubnub->subscribe(array(
    'channel'  => 'testChannel',
    'callback' => function($message) {
        $fp = fopen('subscribeOut.txt', 'w');
        fwrite($fp, serialize($message));
        fclose($fp);
        exit;
    }
));