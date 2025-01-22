<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myOrder7.css">
    <title>My Order | EPHARMA</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php include 'db_connect.php'; ?>

    <div class="order-cont">
        <h1>My Order History</h1>
        <table id="order-table">
            <?php

            $email = $_SESSION['email'];

            $mysql2 = "SELECT * FROM `shop_details` WHERE `email_id` = '$email'";
            $myresult2 = mysqli_query($conn, $mysql2);
            $num1 = mysqli_num_rows($myresult2);

            $sl_no = 1;
            $total = 0;

            if ($num1 > 0) {
                echo '<tr>
                        <th>#</th>
                        <th>Date & Time</th>
                        <th>Total Price</th>
                        <th>View Details</th>
                    </tr>';


                while ($row1 = mysqli_fetch_assoc($myresult2)) {
                    $shop_id = $row1['shop_id'];
                }


                $mysql = "SELECT * FROM `order` where shop_id='$shop_id'";
                $myresult = mysqli_query($conn, $mysql);
                $num = mysqli_num_rows($myresult);

                while ($row2 = mysqli_fetch_assoc($myresult)) {

                    echo '<tr>
                            <td>' . $sl_no . '</td>
                            <td>' . $row2['order_dandt'] . '</td>
                            <td>' . $row2['total_price'] . '</td>
                            <td>';
                    echo '<form action="myOrder.php" method="post">
                            <button class="cancel-btn" type="submit" name="view_details" value="' . $row2['order_id'] . '">View</button>
                        </form>';
                    echo '</td>
                        </tr>';

                    $sl_no++;
                }
            } else {
                echo "<h2 style='text-align: center; padding:90px 0; color:#48494a; font-family: arial; letter-spacing:0.6px'>You don't have any order Yet</h2>";
            }

            ?>
        </table>
        <table id="order-table">
            <?php

            if (isset($_POST["view_details"])) {
                $order_id = $_POST["view_details"];
                $sl_no1 = 1;

                $mysql1 = "SELECT * FROM `order_details` where order_id='$order_id'";
                $myresult1 = mysqli_query($conn, $mysql1);
                $num2 = mysqli_num_rows($myresult1);

                if ($num2 > 0) {

                    echo '<tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Pack</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Confirmation</th>
                        </tr>';

                    while ($row3 = mysqli_fetch_assoc($myresult1)) {

                        echo '<tr>
                                <td>' . $sl_no1 . '</td>
                                <td>' . $row3['item_name'] . '</td>
                                <td>' . $row3['pack'] . '</td>
                                <td>' . $row3['qyt'] . '</td>
                                <td>' . $row3['price'] . '</td>
                                <td>';
                        if ($row3['confirmation'] != "cancelled" && $row3['confirmation'] != "order successful") {
                            echo '<form action="myOrder.php" method="post">
                                    <button class="cancel-btn" type="submit" name="cancel" value="' . $row3['order_details_id'] . '">Order Cancel</button>
                                </form>';
                        } else {
                            echo $row3['confirmation'];
                        }
                        echo '</td>
                            </tr>';

                        $sl_no1++;
                    }
                }
            }

            if (isset($_POST["cancel"])) {

                $cancel = $_POST["cancel"];
                $update = "cancelled";

                $sql = "SELECT * FROM `order_details` WHERE `order_details_id` = '$cancel'";
                $result = mysqli_query($conn, $sql);

                while ($row4 = mysqli_fetch_assoc($result)) {
                    $qyt = $row4["qyt"];
                    $item_name = $row4["item_name"];

                    $sql2 = "SELECT * FROM `medicines` WHERE `item_name` = '$item_name'";
                    $result2 = mysqli_query($conn, $sql2);

                    while ($row5 = mysqli_fetch_assoc($result2)) {
                        $item_id = $row5["item_id"];
                    }

                    $sql3 = "SELECT * FROM `available_stock` WHERE `item_id` = '$item_id'";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row6 = mysqli_fetch_assoc($result3)) {
                        $old_qyt = $row6["qyt"];
                    }

                    $new_qyt = $old_qyt + $qyt;

                    $sql4 = "UPDATE `available_stock` SET `qyt` = '$new_qyt' WHERE `item_id` = '$item_id'";
                    $result4 = mysqli_query($conn, $sql4);
                }

                $sql5 = "UPDATE `order_details` SET `confirmation` = '$update' WHERE `order_details`.`order_details_id` = '$cancel'";
                $result5 = mysqli_query($conn, $sql5);


                // echo "<script>
                //         window.onload = function() {
                //             if (!window.location.hash) {
                //                 window.location = window.location + '#loaded';
                //                 window.location.reload();
                //             }
                //         }
                //     </script>";
            }
            ?>
        </table>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>