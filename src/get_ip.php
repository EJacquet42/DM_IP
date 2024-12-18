<?php

function getIpAddress()
{
    return $_SERVER['REMOTE_ADDR']; 
    // return '192.166.247.0'; // Japon
    // return '192.166.204.0'; // France
    // return '192.168.0.42';  // Plages non définies '-'
}

function ipToInt($ip)
{
    $parts = explode('.', $ip);
    
    if (count($parts) == 4) {
        return ($parts[0] * 256 * 256 * 256) + ($parts[1] * 256 * 256) + ($parts[2] * 256) + $parts[3];
    }
    
    return false;
}

?>
