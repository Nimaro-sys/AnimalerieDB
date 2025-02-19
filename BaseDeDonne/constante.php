<?php

session_start();

// Définition des constantes

define('DB_HOST', 'host.docker.internal');
define('DB_NAME', 'db_refuge_animaux');
define('DB_USER', 'root');
define('DB_PASS', 'greta_refuge');
define('Port_DB', '3306');

require_once('./init.php');
require_once('./fonction.php');

?>