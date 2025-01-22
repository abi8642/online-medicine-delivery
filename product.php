<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}
include 'db_connect.php';
$name = $_GET["item_name"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="single3.css">
    <title><?php echo $name; ?> | EPHARMA</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div>
        <div class="single-main">
            <form action="manage_cart.php" method="POST" class="single-wrapped">
                <?php
                $sql = "SELECT * FROM `medicines` WHERE `item_name` = '$name'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="med-img">
                            <img src="m-d-img/' . $row['photo'] . '" alt="">
                        </div>
                        <div class="med-desc">
                            <div class="tile">' . $row['item_name'] . '</div>
                            <div class="company">' . $row['company_name'] . '</div>
                            <div class="des">Product Details</div>
                            <p class="desc">' . $row['item_desc'] . '</p>
                        </div>
                        <div class="med-price">
                            <div>
                                <span style="font-size: 16px; color: gray;">MRP</span><span class="rate"> &#8377;' . $row['mrp'] . '</span>
                                <span class="graan">' . $row['discount'] . '% off</span>
                            </div>
                            <div class="pack">' . $row['pack'] . '</div>
                            <input type="hidden" name="item_name" value="' . $name . '">';

                    if ($loggedin) {
                        echo '<button class="add-btn" name="add-to-cart" value = "' . $row['item_id'] . '" type="submit">Add To Cart</button>
                    </div>';
                    }
                }

                ?>

            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>