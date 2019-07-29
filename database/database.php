<?php

require 'Medoo.php';

use Medoo\Medoo;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'emroauvw_PCGweb',
    'server' => 'localhost',
    'username' => 'emroauvw_julien',
    'password' => 'julienAdmin',
    "charset" => "utf8"
]);
