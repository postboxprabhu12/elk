<?php
// Server connection 
$server = "localhost";
$username = "root";
$password = "";
$db_name = "elk"; // Database name

// Create connection
$con = new mysqli($server, $username, $password, $db_name);

// Check connection
if ($con->connect_errno) {
    printf("Connection failed: %s\n", $con->connect_error);
    exit();
}

// SQL query to fetch data
$sql = "SELECT * FROM example";
$result = $con->query($sql);

// Initialize total price variable
$totalPrice = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data in Table Format</title>
    <link rel="stylesheet" href="list_style.css">
</head>
<body>
    <h2>Data in Table Format</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["quan"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                // Calculate and display total price for each row
                $totalPriceForRow = $row["quan"] * $row["price"];
                echo "<td>" . $totalPriceForRow . "</td>";
                // Accumulate total price for the entire table
                $totalPrice += $totalPriceForRow;
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="highlight">
            <td colspan="3" class="bold">Total Price</td>
            <td><?php echo $totalPrice; ?></td>
        </tr>
        <tr class="highlight">
            <td class="bold">Coupon Code-ABC</td>
            <td>10%</td>
            <td></td>
            <td><?php echo $totalPrice * 0.1; ?></td>
        </tr>
        <tr class="highlight">
            <td class="bold">Price to Pay</td>
            <td></td>
            <td></td>
            <td class="result"><?php echo $totalPrice - ($totalPrice * 0.1); ?></td>
        </tr>
    </table>
    <div class="btn">
        <button class="submit"><a href="index.php" class="back">Pratical Task</a></button>
    </div>

    <?php
    // Close connection
    $con->close();
    ?>
</body>
</html>
