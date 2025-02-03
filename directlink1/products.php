<?php
include "db.php"; 

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Our Products</h1>
    <div class="products-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product-card">
                <img src="<?php echo $row['image']; ?>" alt="Product Image">
                <h3><?php echo $row['name']; ?></h3>
                <p>Price: ₹<?php echo $row['price']; ?></p>
                <a href="product_details.php?id=<?php echo $row['id']; ?>">View Details</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
