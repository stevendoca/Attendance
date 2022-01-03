<?php
    // $host = '127.0.0.1';
    // $db = 'attendance';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    $host = 'sql3.freesqldatabase.com';
    $db = 'sql3462892';
    $user = 'sql3462892';
    $pass = 'wGpailMC3f';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e -> getMessage());
    }
    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");
?>