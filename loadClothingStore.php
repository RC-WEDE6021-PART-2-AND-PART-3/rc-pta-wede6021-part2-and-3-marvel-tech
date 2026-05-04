<?php
// Kagiso Maluleka ST10403448 & Phuti Mabena ST10450818
include 'DBConn.php';

$conn->query("SET FOREIGN_KEY_CHECKS = 0");

$tables = ["tblAorder", "tblUser", "tblClothes", "tblAdmin"];
foreach($tables as $t) { $conn->query("DROP TABLE IF EXISTS $t"); }

$conn->query("CREATE TABLE tblUser (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    address TEXT,
    status VARCHAR(20) DEFAULT 'Pending'
)");

$conn->query("CREATE TABLE tblClothes (
    clothID INT AUTO_INCREMENT PRIMARY KEY,
    teamName VARCHAR(100),
    price DECIMAL(10,2),
    description TEXT,
    imageURL VARCHAR(255)
)");

$conn->query("CREATE TABLE tblAdmin (adminID INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(255))");

$conn->query("CREATE TABLE tblAorder (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    clothID INT,
    orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES tblUser(userID),
    FOREIGN KEY (clothID) REFERENCES tblClothes(clothID)
)");

$conn->query("SET FOREIGN_KEY_CHECKS = 1");

$kits = [
    ['Manchester United', 850, '2023/24 Home Jersey', 'Manchester United.jpeg'],
    ['Kaizer Chiefs', 750, 'Gold Classic Jersey', 'chiefs.jpeg'],
    ['Orlando Pirates', 750, 'Black Shadow Edition', 'Orlando pirates.jpeg'],
    ['Mamelodi Sundowns', 700, 'The Brazilians Home', 'Mamelodi Sundowns.jpeg'],
    ['Liverpool', 800, 'Anfield Red Jersey', 'Liverpool.jpeg'],
    ['Arsenal', 800, 'Gunners Home Kit', 'arsenal.jpeg'],
    ['Chelsea', 800, 'Blues Home Jersey', 'chelsea.jpeg'],
    ['Man city', 850, 'Sky Blue Citizens Kit', 'Man city.jpeg'],
    ['Real Madrid', 900, 'Galacticos White Jersey', 'Real Madrid.jpeg'],
    ['Barcelona', 900, 'Catalan Pride Jersey', 'Barcelona.jpeg'],
    ['PSG', 850, 'Parisian Blue Kit', 'PSG.jpg'],
    ['Bayern Munich', 800, 'Bavarian Red Jersey', 'Bayern Munich.jpeg'],
    ['Juventus', 800, 'Old Lady Stripes', 'Juventus.jpeg'],
    ['AC Milan', 750, 'Rossoneri Classic', 'AC Milen.jpeg'],
    ['Inter Milan', 750, 'Nerazzurri Stripes', 'Inter Milan.jpeg'],
    ['Tottenham', 700, 'Spurs Home Kit', 'Tottenham.jpeg'],
    ['Bayer Leverkusen', 750, 'Champions Edition', 'Bayer leverkusen.jpeg'],
    ['Dortmund', 750, 'Yellow Wall Jersey', 'Dortmund.jpeg'],
    ['Ajax Cape Town', 600, 'Urban Warriors Home', 'Ajax Cape Town.jpeg'],
    ['Siwelele', 600, 'Phunya Sele Sele Green', 'Siwelele.jpeg'],
    ['Golden Arrows', 550, 'Abafana Besthende', 'Golden Arrows.jpeg'],
    ['Cape Town City', 650, 'Citizens Blue Jersey', 'Cape Town City.jpeg'],
    ['Newcastle', 750, 'Magpies Black & White', 'Newcastle.jpeg'],
    ['Aston Villa', 700, 'Villans Home Jersey', 'Aston Villa.jpeg'],
    ['Atletico Madrid', 800, 'Rojiblancos Stripes', 'Atletico Madrid.jpeg'],
    ['Napoli', 750, 'Partenopei Sky Blue', 'Napoli.jpeg'],
    ['Boca Juniors', 850, 'Argentine Classic', 'Boca Juniors.jpeg'],
    ['Al Nassr', 950, 'Ronaldo 7 Edition', 'Al Nassr.jpeg'],
    ['Inter Miami', 950, 'Messi 10 Pink Edition', 'Inter Miami.jpeg'],
    ['Bafana Bafana', 800, 'National Pride Kit', 'Bafana Bafana.jpeg']
];

foreach($kits as $k) {
    $stmt = $conn->prepare("INSERT INTO tblClothes (teamName, price, description, imageURL) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $k[0], $k[1], $k[2], $k[3]);
    $stmt->execute();
}

$conn->query("INSERT INTO tblAdmin (username, password) VALUES ('admin', 'admin123')");

echo "<h1 style='color:green;'>Success!</h1><p>Full database structure created. You can now register on index.php.</p>";
?>