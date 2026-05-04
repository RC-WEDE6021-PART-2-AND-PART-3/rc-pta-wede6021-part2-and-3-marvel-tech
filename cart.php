<?php
session_start();
include 'DBConn.php';

if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = array(); }

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    array_push($_SESSION['cart'], $id);
    header("Location: shop.php");
}

if (isset($_GET['remove'])) {
    $key = $_GET['remove'];
    unset($_SESSION['cart'][$key]);
    header("Location: cart.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>User <?php echo $_SESSION['user']; ?> | <a href="shop.php">Back to Shop</a></nav>
    <div class="container">
        <h2>Your Selection (Football Kits)</h2>
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            echo "<table border='1' width='100%'><tr><th>Kit</th><th>Price</th><th>Action</th></tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $id) {
                $res = $conn->query("SELECT * FROM tblClothes WHERE clothID = $id");
                $item = $res->fetch_assoc();
                echo "<tr>
                        <td>".$item['teamName']."</td>
                        <td>R".$item['price']."</td>
                        <td><a href='cart.php?remove=$key'>Remove</a></td>
                      </tr>";
                $total += $item['price'];
            }
            echo "<tr><td><strong>TOTAL</strong></td><td><strong>R$total</strong></td><td></td></tr></table>";
            echo "<button onclick='alert(\"Proceeding to Checkout for delivery in Gauteng!\")'>Checkout</button>";
        }
        ?>
    </div>
</body>
</html>