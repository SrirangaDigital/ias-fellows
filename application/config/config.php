<?php

define('BASE_URL', 'http://192.168.1.101/ias-fellows/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('AVATAR_URL', BASE_URL . 'md-src/avatar/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/ias-fellows/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_AVATAR_URL', PHY_BASE_URL . 'md-src/avatar/');
define('PHY_FELLOW_MD_URL', PHY_BASE_URL . 'md-src/fellows/');
define('PHY_MD_URL', PHY_BASE_URL . 'md-src/');


define('DB_HOST', '127.0.0.1');
define('DB_PORT', '27017');
define('DB_NAME', 'iasINFRA');
define('DB_USER', 'iasUSER');
define('DB_PASSWORD', 'ias123');

// Git config
define('GIT_USER_NAME', 'shruthisdst');
define('GIT_PASSWORD', 'shruthitr14');
define('GIT_REPO', 'github.com/SrirangaDigital/ias-fellows.git');
define('GIT_REMOTE', 'https://' . GIT_USER_NAME . ':' . GIT_PASSWORD . '@' . GIT_REPO);
define('GIT_EMAIL', 'shruthitr.nayak@gmail.com');

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
