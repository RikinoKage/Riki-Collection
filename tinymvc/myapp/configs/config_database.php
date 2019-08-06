<?php

/**
 * database.php
 *
 * application database configuration
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

$config['default']['plugin'] = 'TinyMVC_PDO'; // plugin for db access
$config['default']['type'] = 'mysql';      // connection type
$config['default']['host'] = DBHOST;     // db hostname
$config['default']['name'] = DBNAME;     // db name
$config['default']['user'] = DBUSER;     // db username
$config['default']['pass'] = DBPASS;     // db password
$config['default']['persistent'] = false;  // db connection persistence?

?>