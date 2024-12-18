<?php

require_once 'conn_db.php'; 
require_once 'get_ip.php';  

function ipFrance($ip)
{
    global $db;

    $ipLong = ipToInt($ip);

    $query = $db->prepare('SELECT country_code FROM ip2location WHERE ip_from <= :ip AND ip_to >= :ip');
    $query->bindParam(':ip', $ipLong, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['country_code'] == 'FR') {
        return true;
    }

    return false;
}

?>



