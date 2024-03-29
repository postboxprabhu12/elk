<?php
// server connection 
$server = "localhost";
$username = "root";
$password = "";
$db_name = "elk"; // Database name

$con = mysqli_connect($server, $username, $password, $db_name);

if ($con->connect_errno) {
    printf("Connection failed: %s\n", $con->connect_error);
    exit();
}

// Check if form is submitted
if (isset($_POST["name"]) && isset($_POST["quan"]) && isset($_POST["price"])) {
    $name = $_POST["name"];
    $quan = $_POST["quan"];
    $price = $_POST["price"];

    // SQL query to insert data into database
    $sql = "INSERT INTO `example` (name, quan, price) VALUES ('$name', '$quan', '$price')";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    // $resultcheck = mysqli_num_rows($result);
    if ($result > 0) {
?>
        <script>
            alert("DATA ADDED");
            window.location = "index.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("DATA NOT ADDED");
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELK form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form">
            <div class="title">Welcome</div>
            <div class="subtitle">Pratical Task</div>
            <div class="input-container ic1">
                <input id="firstname" class="input" name="name" type="text" placeholder=" " required/>
                <div class="cut"></div>
                <label for="firstname" class="placeholder">Item name</label>
            </div>
            <div class="input-container ic2">
                <input id="lastname" class="input" name="quan" type="number" placeholder=" " />
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Quantity</label>
            </div>
            <div class="input-container ic2">
                <input id="email" class="input" name="price" type="number" placeholder=" " />
                <div class="cut cut-short"></div>
                <label class="placeholder">Per Unit Price</>
            </div>
            <button type="text" class="submit">submit</button>
            <div class="list">
                <a href="list.php">
                    <h3 class="list-w">List Of Data</h3>
                </a>
            </div>
        </div>
    </form>
</body>

</html>