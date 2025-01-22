<?php
session_start();

include 'db_connect.php';
$email = $_SESSION["email"];
$total = $_SESSION["total"];
$count = $_SESSION["count"];

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['order']))) {
    $shop_name = $_POST['shop_name'];
    $street = $_POST['street'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $phone_no = $_POST['phone_no'];

    $insert = "INSERT INTO `shop_details`(`email_id`, `shop_name`, `street`, `pincode`, `city`, `district`, `state`, `phone_no`) VALUES ('$email', '$shop_name', '$street', '$pincode', '$city', '$district', '$state', '$phone_no')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        header("location: order.php");
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['update_order']))) {
    $shop_id1 = $_POST['update_order'];
    $shop_name = $_POST['shop_name'];
    $street = $_POST['street'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $phone_no = $_POST['phone_no'];

    $insert = "UPDATE `shop_details` SET `shop_name`='$shop_name',`street`='$street',`pincode`='$pincode',`city`='$city',`district`='$district',`state`='$state',`phone_no`='$phone_no' WHERE `shop_id`='$shop_id1'";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        header("location: order.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order page | EPHARMA</title>
    <link rel="stylesheet" href="order4.css">
</head>

<body>

    <div class="back">
        <a href="shopping_cart.php">
            < Back to Cart</a> </div> <div class="cont">

                <?php

                if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['edit']))) {
                    $shop_id = $_POST['edit'];

                    $check_sql1 = "SELECT `shop_id`, `email_id`, `shop_name`, `street`, `pincode`, `city`, `district`, `state`, `phone_no` FROM `shop_details` WHERE `shop_id`= '$shop_id'";
                    $check_result1 = mysqli_query($conn, $check_sql1);

                    while ($row1 = mysqli_fetch_assoc($check_result1)) {
                        echo
                            '<div class="form sign-in">
                                <form action="order.php" method="post">
                                    <label>
                                        <span>Shop Name</span>
                                        <input type="text" name="shop_name" autocomplete="off" value="' . $row1['shop_name'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>Flat Number, Building Name, Street/Locality</span>
                                        <input type="text" name="street" autocomplete="off" value="' . $row1['street'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>Pincode</span>
                                        <input type="number" name="pincode" autocomplete="off" value="' . $row1['pincode'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>City</span>
                                        <input type="text" name="city" autocomplete="off" value="' . $row1['city'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>District</span>
                                        <input type="text" name="district" autocomplete="off" value="' . $row1['district'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>State</span>
                                        <input type="text" name="state" autocomplete="off" value="' . $row1['state'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <label>
                                        <span>10 Digit Phone Number</span>
                                        <input type="number" name="phone_no" autocomplete="off" value="' . $row1['phone_no'] . '">
                                        <span class="error"></span>
                                    </label>
                                    <button class="submit" type="submit" name="update_order" value="' . $row1['shop_id'] . '">Add Address</button>
                                </form>
                            </div>';
                    }
                } else {

                    $check_sql = "SELECT `shop_id`, `email_id`, `shop_name`, `street`, `pincode`, `city`, `district`, `state`, `phone_no` FROM `shop_details` WHERE `email_id`= '$email'";
                    $check_result = mysqli_query($conn, $check_sql);

                    $num = mysqli_num_rows($check_result);

                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($check_result)) {
                            echo '<div class="address">
                                <div class="address-top">
                                    <h3>Shop Address</h3>
                                    <div>' . $row['shop_name'] . '</div>
                                    <div>' . $row['phone_no'] . '</div>
                                    <div>
                                        <span>' . $row['street'] . ',</span>
                                        <span>' . $row['city'] . ',</span></br>
                                        <span>' . $row['district'] . ',</span>
                                        <span>' . $row['state'] . ' -</span>
                                        <span>' . $row['pincode'] . '</span>
                                    </div>
                                </div>
                                <form action="order.php" method="post" class="address-buttom">
                                    <button class="order-btn" name="edit" value="' . $row['shop_id'] . '" type="submit">Edit Address</button>
                                </form>
                                <form action="orderPlace.php" method="post" class="address-buttom">
                                    <button class="order-btn" name="final" value="' . $row['shop_id'] . '" type="submit">Order Place</button>
                                </form>
                            </div>';
                        }
                    } else {
                        echo '<h2>Add Shop Address</h2>
                        <div class="form sign-in">
                            <form action="order.php" method="post">
                                <label>
                                    <span>Shop Name</span>
                                    <input type="text" name="shop_name" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>Flat Number, Building Name, Street/Locality</span>
                                    <input type="text" name="street" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>Pincode</span>
                                    <input type="number" name="pincode" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>City</span>
                                    <input type="text" name="city" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>District</span>
                                    <input type="text" name="district" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>State</span>
                                    <input type="text" name="state" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <label>
                                    <span>10 Digit Phone Number</span>
                                    <input type="number" name="phone_no" autocomplete="off">
                                    <span class="error"></span>
                                </label>
                                <button class="submit" type="submit" name="order">Add Address</button>
                            </form>
                        </div>';
                    }
                }

                ?>

                <div class="sub-cont">
                    <div class="cart-price">
                        <div class="cart-price-box">
                            <div class="right-cart-price-box">
                                <div id="top">
                                    <h3>Price Details</h3>
                                    <span>Total Items ( <?php echo $count; ?> )</span>
                                </div>
                                <hr>
                                <div class="calculate">
                                    <span>Shipping Fee</span>
                                    <span>0</span>
                                </div>
                                <div class="calculate">
                                    <span class="total">To be Paid</span>
                                    <span class="total">&#x20B9;<?php echo $total; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</body>

</html>