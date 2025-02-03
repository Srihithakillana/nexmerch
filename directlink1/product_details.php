<?php
include "db.php"; 

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
} else {
    // Redirect to products page if no ID is provided
    header("Location: products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Add some basic styles for the chat and contact button */
        .contact-seller {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .contact-seller:hover {
            background: #0056b3;
        }

        .chat-option {
            display: inline-block;
            background: #28a745;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .chat-option:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <div class="product-details">
        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image">
        <p>Price: ₹<?php echo htmlspecialchars($product['price']); ?> per unit</p>
        <p>MOQ: <?php echo 30; ?> units</p>
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        
        <form action="payment.php" method="GET">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="<?php echo 30; ?>" value="<?php echo 30; ?>" required>
            <button type="submit">Buy Now</button>
        </form>

        <!-- Chat Option -->
        <a href="chat.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="chat-option">Chat with Seller</a>

        <!-- Contact Seller Button -->
        <a href="contact_seller.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="contact-seller">Contact the Seller</a>
    </div>
    <a class="back-link" href="products.php">Back to Products</a>
</body>
</html>