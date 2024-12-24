<?php

define('DB_HOST', 'db');
define('DB_NAME', 'geoip');
define('DB_USER', 'geoip');
define('DB_PWD', 'G301P');

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=3306', DB_USER, DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit;
}

?>


