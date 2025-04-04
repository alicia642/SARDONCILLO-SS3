<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(255, 80, 240),rgb(255, 71, 215));
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #efaeec ;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(221, 144, 204, 0.1);
        }

        label {
            font-size: 16px;
            margin-right: 10px;
        }

        select, input[type="number"], input[type="checkbox"] {
            margin-bottom: 15px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        input[type="number"] {
            width: 60%;
        }

        input[type="checkbox"] {
            width: auto;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        
        .order-summary-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #efaeec;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-summary {
            font-size: 18px;
            color: #333;
        }

        .order-summary p {
            margin: 8px 0;
        }

        .order-summary strong {
            font-size: 20px;
            color: #4CAF50;
        }

        .order-summary .total-amount {
            font-size: 20px;
            color:rgb(192, 127, 176);
            font-weight: bold;
        }
    </style>
</head>
<body>

    <form method="post">
        <h1>Select your order here</h1>
        
        <select name="order" id="order" required>
            <option value="1">Burger - ₱100</option>
            <option value="2">Lemon - ₱150</option>
            <option value="3">Apple - ₱200</option>
            <option value="4">Coke - ₱157</option>
            <option value="5">Probin - ₱110</option>
        </select>
        <br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required min="1">
        <br><br>

        <label for="takeout">Takeout:</label>
        <input type="checkbox" name="takeout" id="takeout">
        <br>

        <label for="dine_in">Dine-in:</label>
        <input type="checkbox" name="dine_in" id="dine_in">
        <br>

        <input type="submit" value="Calculate Total">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $menu_items = ["Burger", "Lemon", "Apple", "Coke", "Probin"];
        $prices = [100, 150, 200, 157, 110];

        if (!isset($_POST["order"]) || !isset($_POST["quantity"])) {
            echo "<p>Invalid input!</p>";
            exit;
        }

        $choice = intval($_POST["order"]);
        $quantity = intval($_POST["quantity"]);
        $is_takeout = isset($_POST["takeout"]);
        $is_dine_in = isset($_POST["dine_in"]);

        // Ensure that either takeout or dine-in is selected, not both
        if ($is_takeout && $is_dine_in) {
            echo "<p>You cannot select both Takeout and Dine-in!</p>";
            exit;
        }

        if ($choice < 1 || $choice > 5 || $quantity <= 0) {
            echo "<p>Invalid input!</p>";
            exit;
        }

        $order = $menu_items[$choice - 1];
        $price = $prices[$choice - 1];
        $subtotal = $price * $quantity;

        // Tax applies if Takeout is selected
        $tax = $is_takeout ? $subtotal * 0.12 : 0;
        $total_amount = $subtotal + $tax;
        $order_type = $is_takeout ? "Take-out" : "Dine-in";

        echo "<div class='order-summary-container'>";
        echo "<div class='order-summary'>";
        echo "<p><strong>Order Summary:</strong></p>";
        echo "<p>Item: $order</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Order Type: $order_type</p>";
        echo "<p>Total Amount: ₱" . number_format($total_amount, 2) . "</p>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>