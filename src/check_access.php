<?php

require_once 'country_check.php';

function isAllowedUserV4($ip) {

    if(checkCountryV4($ip)) {
        return true;
    } 
    return false;
}

function isAllowedUserV6($ip) {

    if(checkCountryV6($ip)) {
        return true;
    } 
    return false;
}

?>