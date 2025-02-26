<?php
$host = "localhost";
$dbname = "boilerplate_php"; // Change this to database name
$username = "root"; // Default in XAMPP
$password = "";     // Default in XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>