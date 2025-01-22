    <?php
    session_start();

    include 'db_connect.php';

    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['final']))) {

        $item_name = array_column($_SESSION['cart'], 'item_name');
        $shop_id = $_POST['final'];
        $total = $_SESSION['total'];

        $sqli = "INSERT INTO `order`(`shop_id`, `total_price`) VALUES ('$shop_id', '$total')";
        $res = mysqli_query($conn, $sqli);

        if ($res) {
            // printf("New record has id %d .\n", mysqli_insert_id($conn));
            $order_id = mysqli_insert_id($conn);
        }

        $sql = "SELECT * FROM `medicines`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($item_name as $name) {
                if ($row['item_name'] == $name) {
                    $item = $row['item_name'];
                    $pack = $row['pack'];
                    $price = $row['mrp'];
                    $qyt = 1;

                    $insert = "INSERT INTO `order_details`(`order_id`, `item_name`, `pack`, `qyt`, `price`, `confirmation`) VALUES ('$order_id', '$item', '$pack', '$qyt', '$price', 'confirmed')";

                    $result_order = mysqli_query($conn, $insert);

                    $item_id = $row['item_id'];
                    $select = "SELECT * FROM `available_stock` WHERE `item_id` = '$item_id'";
                    $result1 = mysqli_query($conn, $select);

                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $id = $row['item_id'];
                        $sub = $row1['qyt'] - $qyt;
                        $update = "UPDATE `available_stock` SET `qyt`='$sub' WHERE `item_id` = '$id'";
                        $result2 = mysqli_query($conn, $update);

                        if ($result2) {
                            header("location: myOrder.php");
                            unset($_SESSION['cart']);
                        }
                    }
                }
            }
        }
    }


    ?>