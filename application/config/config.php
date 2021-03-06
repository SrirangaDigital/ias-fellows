<?php

define('BASE_URL', 'http://localhost/ias-fellows/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('AVATAR_URL', BASE_URL . 'md-src/avatar/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/ias-fellows/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_AVATAR_URL', PHY_BASE_URL . 'md-src/avatar/');
define('PHY_FELLOW_MD_URL', PHY_BASE_URL . 'md-src/fellows/');
define('PHY_ASSOCIATE_MD_URL', PHY_BASE_URL . 'md-src/associates/');
define('PHY_MD_URL', PHY_BASE_URL . 'md-src/');


define('DB_HOST', '127.0.0.1');
define('DB_PORT', '27017');
define('DB_NAME', 'iasINFRA');
define('DB_USER', 'iasUSER');
define('DB_PASSWORD', 'ias123');

// Git config
define('GIT_USER_NAME', 'sriranga-deploy');
define('GIT_PASSWORD', 'sriranga2341');
define('GIT_REPO', 'github.com/SrirangaDigital/ias-fellows.git');
define('GIT_REMOTE', 'https://' . GIT_USER_NAME . ':' . GIT_PASSWORD . '@' . GIT_REPO);
define('GIT_EMAIL', 'accounts@srirangadigital.com');

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

// chmod -R 775 .git md-src/
// chmod -R ug+s .git md-src/
// chown -R owner:group .git md-src/

?>
