<?php

$index_start = microtime(true);

require_once './src/check_access.php';
$goToHome = null;

$ip = getIpAddress();
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    $ipLong = convertIpV4($ip);
    $goToHome = isAllowedUserV4($ipLong);
}
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    $ipLong = convertIpV6($ip);
    $goToHome = isAllowedUserV6($ipLong);
}

if ($goToHome == true) {
    include './home.php';
}
else {
    include './invalid_ip.php';
}

$index_end = microtime(true);
$temps_execution = ($index_end - $index_start) * 1000;
echo "Le temps d'exécution de la page est de : " . number_format($temps_execution, 3, '.', '') . " ms\n";

?>
