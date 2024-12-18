<?php

require_once 'functions.php';
require_once 'get_ip.php';

$ip = getIpAddress();

if (ipFrance($ip)) {
    echo "L'adresse IP $ip est en France.";
    include './home.php';
} else {
    echo "L'adresse IP $ip n'est pas en France.";
    include './oups.php';
}

?>

