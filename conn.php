<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

// $API->debug = true;

if ($API->connect('192.168.88.1', 'admin', '')) {
}
