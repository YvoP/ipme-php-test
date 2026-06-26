<?php
try {
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=cocktaildb;port=3306',
        'root',
        'root'
    );
} catch (PDOException $e) {
    var_dump($e);
}
?>