<?php

if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true)) {
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
    <link rel="stylesheet" href="navbar9.css">
    <title>Simple modal</title>
</head>

<body>
    <nav class="navbar">
        <div class="left-nav">
            <div class="logo">
                <a href="index.php"><img src="m-d-img/MyLogo.png" id="brand"></a>
            </div>
            <div class="left-list">
                <ul>
                    <li><a href="index.php">Medicines</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="right-nav">
            <div class="right-list">
                <ul>
                    <?php
                    if (!$loggedin) {
                        echo '<li id="first"><a href="login.php">Login</a></li>
                    <li id="second"><a href="signup.php">Signup</a></li>';
                    } else {
                        echo '<li class="dashboard_img"><a href="" ><img src="m-d-img/avatar.png" alt=""></a>
                        <div class="sub-menu">
                            <ul>
                                <li>Hi User welcome</li>
                                <li><a href="myOrder.php">My orders</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        </li>
                    <li id="third"><a href="shopping_cart.php"><img src="m-d-img/shopping-cart.png" alt="">Cart</a>'; ?>
                    <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo '<span id="cart-count">' . $count . '</span>';
                        } else {
                            echo '<span id="cart-count">0</span>';
                        }

                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="search-bar">
                <form action="query.php" method="get">
                    <input type="search" name="query" id="search" autocomplete="off">
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>

<?php
