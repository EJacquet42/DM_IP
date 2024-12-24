<?php

require_once 'get_ip.php';
require_once 'ip_functions.php';

$ip = getIpAddress();

if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    $ipType = "IPv4";
} elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    $ipType = "IPv6";
} else {
    $ipType = "Inconnue";
}

echo "L'adresse IP détectée est de type $ipType.<br>";

if (ipFrance($ip)) {
    echo "L'adresse IP $ip est en France.";
    include './home.php';
} else {
    echo "L'adresse IP $ip n'est pas en France.";
    include './ip_invalide.php';
}
?>


