<?php
session_start();
// if (((isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] == true))) {
//     $loggedin = true;
// } else {
//     $loggedin = false;
// }

?>
<?php
include 'db_connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <title>Admin | Order Confirmation | EPHARM</title>
</head>

<body>
    <?php include 'adminSideBar.php'; ?>

    <div class="pl-4 my-5">
        <h2 class="pb-5 text-center">Order Confirmation</h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Shop_name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Pincode</th>
                    <th scope="col">City</th>
                    <th scope="col">District</th>
                    <th scope="col">State</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Order DateTime</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl_no = 1;

                $sql = "SELECT * FROM `order`";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {

                    $sql1 = "SELECT * FROM `shop_details`";
                    $result1 = mysqli_query($conn, $sql1);

                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        if ($row['shop_id'] == $row1['shop_id']) {

                            echo '<tr>
                                    <th scope="row">' . $sl_no . '</th>
                                    <td>' . $row1['email_id'] . '</td>
                                    <td>' . $row1['shop_name'] . '</td>
                                    <td>' . $row1['street'] . '</td>
                                    <td>' . $row1['pincode'] . '</td>
                                    <td>' . $row1['city'] . '</td>
                                    <td>' . $row1['district'] . '</td>
                                    <td>' . $row1['state'] . '</td>
                                    <td>' . $row1['phone_no'] . '</td>
                                    <td>' . $row['order_dandt'] . '</td>
                                    <td>' . $row['total_price'] . '</td>
                                    <td> <form action="adminManageOrder.php" method="POST" class="d-inline">
                                            <button type="submit" name="details" value="' . $row['order_id'] . '" class="btn btn-md btn-primary py-0">View Details</button>             
                                        </form> </td> 
                                </tr>';
                        }
                    }

                    $sl_no++;
                }

                ?>

            </tbody>
        </table>
    </div>

    <?php

    if (isset($_POST['details'])) {

        echo ' <div class="pl-4 my-5">
                    <h3 class="py-4">view Details</h3>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Pack</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Confirmation</th>
                            </tr>
                        </thead>
                        <tbody>';

        $view_id = $_POST['details'];
        $sl_no1 = 1;

        $view_sql = "SELECT * FROM `order_details` WHERE `order_id` = '$view_id'";
        $view_result = mysqli_query($conn, $view_sql);
        while ($view_row = mysqli_fetch_assoc($view_result)) {

            echo '<tr>
                    <th scope="row">' . $sl_no1 . '</th>
                    <td>' . $view_row['item_name'] . '</td>
                    <td>' . $view_row['pack'] . '</td>
                    <td>' . $view_row['qyt'] . '</td>
                    <td>' . $view_row['price'] . '</td>
                    <td>';
            if ($view_row['confirmation'] == "cancelled" || $view_row['confirmation'] == "order successful") {
                echo $view_row['confirmation'];
            } else {
                echo '<form action="adminManageOrder.php" method="POST">
                        <button type="submit" name="cancel" value="' . $view_row['order_details_id'] . '" class="btn btn-md btn-primary py-0">Cancel</button>             
                      </form>';
            }
            echo '</td> 
                </tr>';
            $sl_no1++;
        }
    }

    if (isset($_POST["cancel"])) {

        $cancel = $_POST["cancel"];
        $update = "cancelled";

        $sql6 = "SELECT * FROM `order_details` WHERE `order_details_id` = '$cancel'";
        $result6 = mysqli_query($conn, $sql6);

        while ($row4 = mysqli_fetch_assoc($result6)) {
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

    echo '</div>';

    // include 'adminFooter.php';

    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <!-- Data table js -->
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>