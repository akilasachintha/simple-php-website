<?php 
    $host = 'localhost';
    $db = 'test_php_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dcn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dcn, $user, $pass);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);

?>