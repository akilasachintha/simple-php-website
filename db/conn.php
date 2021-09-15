<?php 
    $host = 'sql10.freesqldatabase.com';
    $db = 'sql10437309';
    $user = 'sql10437309';
    $pass = 'GmI98dLT27';
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