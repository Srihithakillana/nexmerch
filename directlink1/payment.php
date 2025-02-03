<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexmerch Buyer Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .nav {
            display: flex;
            justify-content: space-around;
            background: #333;
            padding: 10px;
            margin-bottom: 20px;
        }
        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
        }
        .nav a:hover {
            background: #575757;
        }
        .dashboard {
            display: flex;
            justify-content: space-between;
        }
        .sidebar {
            width: 25%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .content {
            width: 70%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        .order {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .order:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Your Dashboard, John Doe!</h1>
    </div>
    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="orders.php">My Orders</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="dashboard">
            <div class="sidebar">
                <h2>User Information</h2>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Email:</strong> johndoe@example.com</p>
                <p><strong>Phone:</strong> +1 234 567 8901</p>
            </div>
            <div class="content">
                <h2>Recent Orders</h2>
                <div class="order">
                    <p><strong>Order ID:</strong> 1001</p>
                    <p><strong>Date:</strong> 2023-10-01</p>
                    <p><strong>Total:</strong> ₹1500</p>
                    <p><strong>Status:</strong> Shipped</p>
                </div>
                <div class="order">
                    <p><strong>Order ID:</strong> 1002</p>
                    <p><strong>Date:</strong> 2023-09-15</p>
                    <p><strong>Total:</strong> ₹2500</p>
                    <p><strong>Status:</strong> Delivered</p>
                </div>
                <div class="order">
                    <p><strong>Order ID:</strong> 1003</p>
                    <p><strong>Date:</strong> 2023-08-20</p>
                    <p><strong>Total:</strong> ₹3000</p>
                    <p><strong>Status:</strong> Pending</p>
                </div>
                <div class="order">
                    <p><strong>Order ID:</strong> 1004</p>
                    <p><strong>Date:</strong> 2023-07-10</p>
                    <p><strong>Total:</strong> ₹1200</p>
                    <p><strong>Status:</strong> Canceled</p>
                </div>
                <div class="order">
                    <p><strong>Order ID:</strong> 1005</p>
                    <p><strong>Date:</strong> 2023-06-05</p>
                    <p><strong>Total:</strong> ₹1800</p>
                    <p><strong>Status:</strong> Shipped</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>