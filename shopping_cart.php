<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}

$conn = mysqli_connect('localhost', 'root', '', 'medicines');

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name'] == $_GET['item_name']) {

                unset($_SESSION['cart'][$key]);

                echo "<script>
                alert('Item has been Removed...');
                </script>";
            }
        }
    }
}


include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" countent="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart5.css">
    <title>Cart | EPHARMA</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <h1>Your Items</h1>
    <div class="cart">
        <div class="cart-items">
            <?php

            if (!isset($_SESSION['cart'])) {
                echo '<div class="empty-cart-show">
                        <img src="m-d-img/empty_cart.jpg" alt="">
                        <h4 class="cart-show">Your cart is Empty</h4>
                    </div>';
            } else {

                $total = 0;
                if (isset($_SESSION['cart'])) {

                    $item_name = array_column($_SESSION['cart'], 'item_name');
                    $email = $_SESSION['email'];

                    //if available then add to cart
                    $sql = "SELECT * FROM `medicines`";
                    $result = mysqli_query($conn, $sql);

                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($item_name as $name) {
                            if ($row['item_name'] == $name) {

                                $sno++;
                                echo '<form action="shopping_cart.php?action=remove&item_name=' . $name . '" method="post" class="cart-item">
                                    <div class="right-cart-item">
                                        <h2>' . $row['item_name'] . '</h2>
                                        <p>' . $row['pack'] . '</p>
                                        <button name="remove" class="remove-cart">
                                            <a href=""><img src="m-d-img/recycle-bin-line.png" alt=""> <small>Remove</small> </a>
                                        </button>
                                    </div>
                                    <div class="left-cart-item">
                                        <div class="top-left-cart-item">
                                            <span>MRP</span>
                                            <span class="rupee"  id="' . $sno . '">' . $row['mrp'] . '</span>
                                        </div>
                                       <div class="add-cancel">
                                            <input type="hidden" id="' . $row['mrp'] . '" value="' . $row['mrp'] . '">
                                            <button type="button" onclick="decrease(`' . $row['item_id'] . '`, `' . $row['mrp'] . '`, `' . $sno . '`)"><img src="m-d-img/minus-round-line.png"></button>
                                            <input type="text" disabled name="qyt" id="' . $row['item_id'] . '" value="1">
                                            <button type="button" onclick="increase(`' . $row['item_id'] . '`, `' . $row['mrp'] . '`, `' . $sno . '`)"><img src="m-d-img/plus-round-line.png"></button>
                                        </div>
                                    </div>
                                </form>';
                                $total = $total + (float)$row['mrp'];
                            }
                        }
                    }
                }

                $_SESSION['total'] = $total;

                if ($total > 0) {

                    echo '</div>
                            <div class="cart-price">
                                <div class="cart-price-box">
                                    <div class="right-cart-price-box">
                                        <div id="top">
                                            <h3>Price Details</h3>';

                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        $_SESSION['count'] = count($_SESSION['cart']);
                        echo '<span>Total Items ( ' . $count . ' )</span>';
                    } else {
                        echo '<span>Total Items ( 0 )</span>';
                    }

                    echo '</div>
                            <hr>
                                <div class="calculate">
                                    <span>Shipping Fee</span>
                                    <span>0</span>
                                </div>
                                <div class="calculate">
                                    <span class="total">To be Paid</span>
                                    <span class="total">&#x20B9;<span id="totalamount">' . $total . '</span</span>
                                </div>
                            </div>
                            </div>
                            <button class="order-btn" type="button"><a href="order.php">Order Now</a></button>
                    </div>';
                }
            }
            ?>

        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script>
        var totalamount = document.getElementById('totalamount');
        console.log(totalamount);
        const decrease = (incdec, exmrrp, chmrrp) => {
            qyt = document.getElementById(incdec);
            exmrrp = document.getElementById(exmrrp).value;
            chmrrp = document.getElementById(chmrrp);

            if (qyt.value <= 1) {
                qyt.value = 1;
                alert("You have to add Minimun 1 Quantity");
                qyt.style.background = 'rgb(255, 54, 54)';
                qyt.style.color = '#fff';
            } else {
                qyt.value = parseInt(qyt.value) - 1;

                chmrrp.innerHTML = parseFloat(chmrrp.innerHTML) - Number(exmrrp);
                totalamount.innerHTML = parseFloat(totalamount.innerHTML) - exmrrp;

                qyt.style.background = 'transparent';
                qyt.style.color = 'black';
            }
        }
        const increase = (incdec, exmrrp, chmrrp) => {
            qyt = document.getElementById(incdec);
            exmrrp = document.getElementById(exmrrp).value;
            chmrrp = document.getElementById(chmrrp);

            if (qyt.value >= 30) {
                qyt.value = 30;
                alert("You can not add more than 30 Quantity");
                qyt.style.background = 'rgb(255, 54, 54)';
                qyt.style.color = '#fff';
            } else {
                qyt.value = parseInt(qyt.value) + 1;

                chmrrp.innerHTML = parseFloat(chmrrp.innerHTML) + Number(exmrrp);
                totalamount.innerHTML = parseFloat(totalamount.innerHTML) + Number(exmrrp);

                qyt.style.background = 'transparent';
                qyt.style.color = 'black';
            }
        }
    </script>
</body>

</html>