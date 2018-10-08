<?php

define('BASE_URL', 'http://localhost/ias-fellows/');
define('PUBLIC_URL', BASE_URL . 'public/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/ias-fellows/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');

define('PHY_FELLOW_MD_URL', PHY_BASE_URL . 'md-src/fellows/');

define('DB_PREFIX', 'ias');
define('DB_HOST', 'localhost');

// photo will become iitmPHOTO inside
define('DB_NAME', 'iasINFRA');

define('iasINFRA_USER', 'root');
define('iasINFRA_PASSWORD', 'mysql');

?>
