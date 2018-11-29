<?php ## db connection
try {
    // create instance of PDO
    // PDO - PHP Data Objects is a layer that offers a universal way to work with multiple databases.
    $pdo = new PDO('mysql:host=localhost;dbname=java1cprog_ctl1', '---', '---', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Unable to connect to database";
}
