<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $connect = new PDO("mysql:host=$servername;dbname=xuongth;port=3307", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
