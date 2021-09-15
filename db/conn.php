<?php
//Remote Database
// $host = 'sql10.freesqldatabase.com';
// $db = 'sql10437309';
// $dbuser = 'sql10437309';
// $dbpass = 'GmI98dLT27';
// $charset = 'utf8mb4';

$host = 'localhost';
$db = 'test_php_db';
$dbuser = 'root';
$dbpass = '';
$charset = 'utf8mb4';

$dcn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dcn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';

$crud = new crud($pdo);
$user = new user($pdo);

$user -> insertUser("admin", "password");