<?php
session_start();

define('BASE_URL', 'http://localhost/25rapido');
define('BASE_TITULO', '25rapido');




global $pdo;
try {
    $pdo = new PDO("mysql:dbname=classificados;host=localhost", "root", "");
}catch(PDOException $e){
    echo "FALHOU: " ;$e->getMessage();
    exit;
}
?>