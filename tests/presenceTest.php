<?php
require_once(__DIR__.'/../lib/autoloader.php');

$pubnub = new \Pubnub\Pubnub( 'demo', 'demo', false , false, false );
$pubnub->presence(array(
    'channel'  => 'testChannel',
    'callback' => function($message) {
        $fp = fopen('presenceOut.txt', 'w');
        fwrite($fp, serialize($message));
        fclose($fp);
        exit;
    }
));
?>
