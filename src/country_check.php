<?php

require_once 'db_connection.php';
require_once 'get_convert_ip.php';

function checkCountryV4($ipLong) {
    global $db;

    $query = $db->prepare('SELECT country_code FROM ip2location WHERE ip_from <= :ip AND ip_to >= :ip');
    $query->bindValue(':ip', $ipLong, PDO::PARAM_INT);
    $query->execute();
    $country = $query->fetch(PDO::FETCH_ASSOC);

    if ($country && $country['country_code'] == 'FR') {
        return true;
    }
    
    return false;
}

function checkCountryV6($ipLong) {
    global $db;
    
    if ($ipLong === false) {
        return false;
    }

    $query = $db->prepare('SELECT country_code FROM ip2locationv6 WHERE ip_from <= :ip AND ip_to >= :ip');
    $query->bindValue(':ip', $ipLong, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['country_code'] == 'FR') {
        return true;
    }

    return false;
}
?>

