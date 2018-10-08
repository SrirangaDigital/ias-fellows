<?php

define('BASE_URL', 'http://localhost/ias-fellows/');
define('PUBLIC_URL', BASE_URL . 'public/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/ias-fellows/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');

define('PHY_FELLOW_MD_URL', PHY_BASE_URL . 'md-src/fellows/');

define('DB_HOST', '127.0.0.1');
define('DB_PORT', '27017');
define('DB_NAME', 'iasINFRA');
define('DB_USER', 'iasUSER');
define('DB_PASSWORD', 'ias123');

// use iasINFRA;
// db.createUser(
//    {
//      user: "iasUSER",
//      pwd: "ias123",
//      roles:
//        [
//          { role: "readWrite", db: "iasINFRA" }
//        ]
//    }
// )

?>
