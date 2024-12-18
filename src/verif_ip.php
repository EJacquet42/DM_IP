<?php
require_once 'connDb.php';
require_once 'getIp.php';

    /**
     * @param string $ip Adresse IP à vérifier
     * @return array|null Les données associées ou null si aucune correspondance
     */
function isIpInRange($ip) {
    global $db;

    $ipLong = ipToInt($ip);

    $stmt = $db->prepare('SELECT country_code FROM ip2location WHERE ip_from <= :ip AND ip_to >= :ip');
    $stmt->bindParam(':ip', $ipLong, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$ip = getIpAddress();
$ipInfo = isIpInRange($ip);

 // Vérifie si l'IP est dans la plage et redirige
 if ($ipInfo['country_code'] === 'FR' ) {
     require_once('./home.php');

 } else if ($ipInfo['country_code'] === '-') {
     require_once('./leVide.php');

 } else {
     require_once('./oups.php');
 }

 ?>
