<?php

require_once 'db_connection.php';
require_once 'get_ip.php';

function ipFrance($ip) {
    global $db;

    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $ipLong = ipToInt($ip);
    
        $query = $db->prepare('SELECT country_code FROM ip2location WHERE ip_from <= :ip AND ip_to >= :ip');
        $query->bindParam(':ip', $ipLong, PDO::PARAM_INT);
        $query->execute();
        $country = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($country && $country['country_code'] == 'FR') {
            return true;
        }
    } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        $ipLong = ipv6ToDecimal($ip);
        
        if ($ipLong === false) {
            return false;
        }

        $query = $db->prepare('SELECT country_code FROM ip2locationv6 WHERE ip_from <= :ip AND ip_to >= :ip');
        $query->bindParam(':ip', $ipLong, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['country_code'] == 'FR') {
            return true;
        }
    }

    return false;
}
?>

