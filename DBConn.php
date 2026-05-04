<?php
// Kagiso Maluleka ST10403448 & Phuti Mabena ST10450818
$host = "localhost";
$user = "root";
$pass = "";
$db = "ClothingStore";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);
?>