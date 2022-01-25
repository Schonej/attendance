<?php 
    //development connection
    // $host = '127.1.0.1';
    // $db = 'attendance_db';
    // $user = 'root';
    // $password = '';
    // $charset = 'utf8mb4';

    //Remote database connection
    $host = 'sql3.freesqldatabase.com';
    $db = 'sql3467875';
    $user = 'sql3467875';
    $password = 'yVBklA71ZQ';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    
    require_once 'crud.php';
    $crud = new crud($pdo);
?>