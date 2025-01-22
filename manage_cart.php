<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add-to-cart'])) {
        $item_id = $_POST['add-to-cart'];

        //check for available before add to cart
        $sqli = "SELECT * FROM `available_stock`";
        $res = mysqli_query($conn, $sqli);

        while ($room = mysqli_fetch_assoc($res)) {

            if ($room['item_id'] == $item_id) {
                if ($room['qyt'] > 100) {

                    if (isset($_SESSION['cart'])) {

                        $myItems = array_column($_SESSION['cart'], 'item_name');

                        if (in_array($_POST['item_name'], $myItems)) {
                            echo "<script>
                                    alert('This item is already added');
                                    window.location.href = 'index.php';
                                  </script>";
                        } else {

                            $count = count($_SESSION['cart']);
                            $_SESSION['cart'][$count] =
                                array('item_name' => $_POST['item_name'], 'Quantity' => 1);
                            echo "<script>
                                    window.location.href = 'index.php';
                                  </script>";
                        }
                    } else {
                        $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'Quantity' => 1);
                        echo "<script>
                                window.location.href = 'index.php';
                              </script>";
                    }
                } else {
                    echo "<script>
                            alert('This item is currently unavailable');
                            window.location.href = 'index.php';
                          </script>";
                }
            }
        }
    }
}
