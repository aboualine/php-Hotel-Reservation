<?php
$host = 'localhost';
$dbname = 'task_manager';
$username = 'root'; 
$password = '0689102695mohamedaboualinedimaraja';  
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>