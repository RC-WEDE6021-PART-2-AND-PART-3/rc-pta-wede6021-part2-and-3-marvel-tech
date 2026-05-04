<?php
// Kagiso Maluleka ST10403448 & Phuti Mabena ST10450818
include 'DBConn.php';

$conn->query("SET FOREIGN_KEY_CHECKS = 0");

$conn->query("DROP TABLE IF EXISTS tblUser");

$sql = "CREATE TABLE tblUser (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    address TEXT,
    status VARCHAR(20) DEFAULT 'Pending'
)";
$conn->query($sql);

$conn->query("SET FOREIGN_KEY_CHECKS = 1");
if (file_exists("userData.txt")) {
    $file = fopen("userData.txt", "r");
    while (($line = fgetcsv($file)) !== FALSE) {
        $name = $line[0];
        $email = $line[1];
        $hash = $line[2];
        $addr = $line[3];
        $uName = explode('@', $email)[0]; 

        $stmt = $conn->prepare("INSERT INTO tblUser (fullName, email, username, password, address, status) VALUES (?, ?, ?, ?, ?, 'Verified')");
        $stmt->bind_param("sssss", $name, $email, $uName, $hash, $addr);
        $stmt->execute();
    }
    fclose($file);
    echo "<h1 style='color:green;'>Success!</h1><p>User table reset with your specific names.</p>";
}
?>