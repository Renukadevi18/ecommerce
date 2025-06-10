<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $order_success = true;

    if ($order_success) {
        $_SESSION['order_message'] = "Your order has been successfully placed! Thank you for shopping with us.";
        header("Location: checkout_page.php?order_placed=1");
        exit();
    } else {
        $_SESSION['order_message'] = "Failed to place your order. Please try again.";
        header("Location: checkout_page.php?order_failed=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .checkout-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        .btn-primary {
            background-color: #28a745;
            color: white;
        }
        .btn-secondary {
            background-color: transparent;
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <?php
        if (isset($_SESSION['order_message'])) {
            echo '<div class="success-message">' . $_SESSION['order_message'] . '</div>';
            unset($_SESSION['order_message']);
        } else {
        ?>
            <h2>Checkout</h2>
            <p>product2 (x2) <span style="float: right;">$798.00</span></p>
            <hr>
            <p><strong>TOTAL: $798.00</strong></p>
            <form method="POST" action="">
                <button type="submit" name="place_order" class="btn btn-primary">Place Order</button>
                <br>
                <a href="cart_page.php" class="btn btn-secondary">Back to Cart</a>
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>