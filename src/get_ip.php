<?php

function getIpAddress()
{
    // Recup auto de l'IP
     return $_SERVER['REMOTE_ADDR']; 

    // Test d'adresses IP
    // return '192.166.247.0'; // Pas France
    // return '192.166.204.0'; // France
    // return '192.168.0.42';  // Plages non définies '-'
    // return '0000:0000:0000:0000:0000:ffff:253c:b80'; // IPv6 France
    // return '::ffff:0:100'; // IPv6 pas France
}

function ipToInt($ip)
{
    $parts = explode('.', $ip);

    if (count($parts) === 4) {
        return ($parts[0] * 256 * 256 * 256) + ($parts[1] * 256 * 256) + ($parts[2] * 256) + $parts[3];
    }

    return false;
}

function ipv6ToDecimal($ipv6)
{
    $binary = inet_pton($ipv6);
    $octets = unpack('C*', $binary);
    
    $longValue = '0';
    foreach ($octets as $byte) {
        $longValue = $longValue * 256 + $byte;
    }
    
    return $longValue;
}

?>


