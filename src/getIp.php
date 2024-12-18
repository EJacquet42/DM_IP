<?php



/** @return string */
function getIpAddress() {
    return $_SERVER['REMOTE_ADDR']; //Universel
    //return '192.166.247.0'; //Japon
    //return '192.166.204.0'; //France
    //return '192.168.0.42';  //Plages non definies : "-"
}

$ip = getIpAddress();

function ipToInt($ip_address) {
    $parts = explode('.', $ip_address);
    if (count($parts) === 4) {
        return ($parts[0] * 256 * 256 * 256) + ($parts[1] * 256 * 256) + ($parts[2] * 256) + $parts[3];
    }
    return false;
}
?>



