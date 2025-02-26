<?php
function getDiscountPercentage($numDiscs) {
    if ($numDiscs >= 120) {
        return 10;
    } elseif ($numDiscs >= 50) {
        return 5;
    } elseif ($numDiscs >= 15) {
        return 1;
    } else {
        return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['numDiscs'])) {
        $numDiscs = filter_input(INPUT_POST, 'numDiscs', FILTER_VALIDATE_INT);
        
        if ($numDiscs === false || $numDiscs < 0) {
            echo "Invalid input. Please enter a valid number of CDs.";
        } else {
            $discount = getDiscountPercentage($numDiscs);
            echo "You purchased $numDiscs CDs. Your discount is $discount%.";
        }
    } else {
        echo "No input received.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CD Store Discount</title>
</head>
<body>
    <form method="POST">
        <label for="numDiscs">Enter the number of CDs:</label>
        <input type="number" name="numDiscs" id="numDiscs" required>
        <button type="submit">Calculate Discount</button>
    </form>
</body>
</html>
