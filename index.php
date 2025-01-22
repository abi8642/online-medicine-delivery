<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="main9.css">
    <title>Welocme TO EPHARMA | Home-page</title>
</head>

<body>
    <div class="main-container">

        <!-- navigation bar -->
        <?php include 'navbar.php'; ?>

        <!-- main page -->
        <!-- 1st section -->
        <section class="first-sec">
            <div class="first-img">
                <img src="m-d-img/doctor.jpg" alt="">
            </div>
        </section>

        <!-- 2nd section -->
        <section class="second-sec">
            <h1 class="top-heading">India's Leading Online Pharmacy & Healthcare Platform</h1>
        </section>

        <!-- 3rd section -->
        <section class="third-sec">

            <!-- sub-sections -->
            <section class="sub-sec">
                <div class="sub-sec-box">

                    <div class="sub-sec-heading">
                        <h1>Syrup</h1>
                    </div>
                    <div class="card-container">
                        <?php

                        $query = "SELECT `item_id`, `type`, `item_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year` FROM `medicines` WHERE `type` = 'Syrup'";

                        $result = mysqli_query($conn, $query);

                        while ($product = mysqli_fetch_array($result)) {
                        ?>
                            <form class="card" action="manage_cart.php" method="post">
                                <div>
                                    <a href="product.php?item_name=<?php echo $product['item_name']; ?>">
                                        <div class="card-image">
                                            <img src="m-d-img/<?php echo $product["photo"]; ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="card-details">
                                        <div class="card-title">
                                            <h3><?php echo $product['item_name']; ?></h3>
                                        </div>
                                        <div class="card-desc">
                                            <div>
                                                <span><?php echo $product["pack"]; ?></span>
                                            </div>
                                            <div>
                                                <div>
                                                    <span class="rating"> 4.4 <i class="fa fa-star"></i></span>
                                                    <span><?php echo $product["ratings"]; ?> ratings</span>
                                                </div>
                                                <span>MRP &#8377;<?php echo $product["mrp"]; ?> <span id="discount"> <?php echo $product["discount"]; ?>% off </span> </span>
                                                <input type="hidden" name="item_name" value="<?php echo $product["item_name"]; ?>">
                                                <?php
                                                if ($loggedin) {
                                                    echo '<button id="cart-submit" class="btn" name="add-to-cart" value = "' . $product['item_id'] . '" type="submit">Add To Cart</button>';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </section>
            <section class="sub-sec">
                <div class="sub-sec-box">

                    <div class="sub-sec-heading">
                        <h1>Tablet</h1>
                    </div>
                    <div class="card-container">
                        <?php

                        $query = "SELECT `item_id`, `type`, `item_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year` FROM `medicines` WHERE `type` = 'Tablets'";

                        $result = mysqli_query($conn, $query);

                        while ($product = mysqli_fetch_array($result)) {
                        ?>
                            <form class="card" action="manage_cart.php" method="post">
                                <div>
                                    <a href="product.php?item_name=<?php echo $product['item_name']; ?>">
                                        <div class="card-image">
                                            <img src="m-d-img/<?php echo $product["photo"]; ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="card-details">
                                        <div class="card-title">
                                            <h3><?php echo $product['item_name']; ?></h3>
                                        </div>
                                        <div class="card-desc">
                                            <div>
                                                <span><?php echo $product["pack"]; ?></span>
                                            </div>
                                            <div>
                                                <div>
                                                    <span class="rating"> 4.4 <i class="fa fa-star"></i></span>
                                                    <span><?php echo $product["ratings"]; ?> ratings</span>
                                                </div>
                                                <span>MRP &#8377;<?php echo $product["mrp"]; ?> <span id="discount"> <?php echo $product["discount"]; ?>% off </span> </span>
                                                <input type="hidden" name="item_name" value="<?php echo $product["item_name"]; ?>">
                                                <?php
                                                if ($loggedin) {
                                                    echo '<button id="cart-submit" class="btn" name="add-to-cart" value = "' . $product['item_id'] . '" type="submit">Add To Cart</button>
                                                            ';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </section>
            <section class="sub-sec">
                <div class="sub-sec-box">

                    <div class="sub-sec-heading">
                        <h1>Baby Care</h1>
                    </div>
                    <div class="card-container">
                        <?php

                        $query = "SELECT `item_id`, `type`, `item_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year` FROM `medicines` WHERE `type` = 'Baby Care'";

                        $result = mysqli_query($conn, $query);

                        while ($product = mysqli_fetch_array($result)) {
                        ?>
                            <form class="card" action="manage_cart.php" method="post">
                                <div>
                                    <a href="product.php?item_name=<?php echo $product['item_name']; ?>">
                                        <div class="card-image">
                                            <img src="m-d-img/<?php echo $product["photo"]; ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="card-details">
                                        <div class="card-title">
                                            <h3><?php echo $product['item_name']; ?></h3>
                                        </div>
                                        <div class="card-desc">
                                            <div>
                                                <span><?php echo $product["pack"]; ?></span>
                                            </div>
                                            <div>
                                                <div>
                                                    <span class="rating"> 4.4 <i class="fa fa-star"></i></span>
                                                    <span><?php echo $product["ratings"]; ?> ratings</span>
                                                </div>
                                                <span>MRP &#8377;<?php echo $product["mrp"]; ?> <span id="discount"> <?php echo $product["discount"]; ?>% off </span> </span>
                                                <input type="hidden" name="item_name" value="<?php echo $product["item_name"]; ?>">
                                                <?php
                                                if ($loggedin) {
                                                    echo '<button id="cart-submit" class="btn" name="add-to-cart" value = "' . $product['item_id'] . '"  type="submit">Add To Cart</button>
                                                            ';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </section>
            <section class="sub-sec">
                <div class="sub-sec-box">

                    <div class="sub-sec-heading">
                        <h1>Other Essentials</h1>
                    </div>
                    <div class="card-container">
                        <?php

                        $query = "SELECT `item_id`, `type`, `item_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year` FROM `medicines` WHERE `type` = 'Other Items'";

                        $result = mysqli_query($conn, $query);

                        while ($product = mysqli_fetch_array($result)) {
                        ?>
                            <form class="card" action="manage_cart.php" method="post">
                                <div>
                                    <a href="product.php?item_name=<?php echo $product['item_name']; ?>">
                                        <div class="card-image">
                                            <img src="m-d-img/<?php echo $product["photo"]; ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="card-details">
                                        <div class="card-title">
                                            <h3><?php echo $product['item_name']; ?></h3>
                                        </div>
                                        <div class="card-desc">
                                            <div>
                                                <span><?php echo $product["pack"]; ?></span>
                                            </div>
                                            <div>
                                                <div>
                                                    <span class="rating"> 4.4 <i class="fa fa-star"></i></span>
                                                    <span><?php echo $product["ratings"]; ?> ratings</span>
                                                </div>
                                                <span>MRP &#8377;<?php echo $product["mrp"]; ?> <span id="discount"> <?php echo $product["discount"]; ?>% off </span> </span>
                                                <input type="hidden" name="item_name" value="<?php echo $product["item_name"]; ?>">
                                                <?php
                                                if ($loggedin) {
                                                    echo '<button id="cart-submit" class="btn" name="add-to-cart" value = "' . $product['item_id'] . '" type="submit">Add To Cart</button>
                                                            ';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </section>
        </section>

        <!-- 4th section -->
        <section class="fourth-sec">
            <div class="fourth-first-sub-sec">
                <h1 class="first-heading">Stay Healthy with EPHARMA: Your Favourite Online Pharmacy and Healthcare Platform
                </h1>

                <h2 class="second-heading">We Bring Care to Health.</h2>
                <p class="text-big">EPHARMA is India' s leading digital healthcare platform. From doctor consultations on chat to online pharmacy and lab testsat home: we have it all covered for you. Having delivered over 25 million orders in 1000+ cities till date, we are on amission to bring "care" to "health" to give you a flawless healthcare experience.</p>
                <h2 class="second-heading">EPHARMA: Your Favourite Online Pharmacy!</h2>
                <p class="text-big">EPHARMA is India's leading online chemist with over 2 lakh medicines available at the
                    best
                    prices. We are your one-stopdestination for other healthcare products as well, such as over the
                    counter pharmaceuticals, healthcare devices and homeopathy and ayurveda medicines.</p>

                <p class="text-big">With EPHARMA, you can buy medicines online and get them delivered at your doorstep
                    anywhere
                    in India! But, is ordering medicines online a difficult process? Not at all! Simply search for the
                    products you want to buy, add to cart and checkout. Now all you need to do is sit back as we get
                    your order delivered to you.</p>

                <p class="text-big">In case you need assistance, just give us a call and we will help you complete your
                    order.</p>

                <p class="text-big">Don't want to go through the hassle of adding each medicine separately? You can
                    simply
                    upload your prescription and we will place your order for you. And there is more! At EPHARMA, you can
                    buy health products and medicines online at best
                    discounts.</p>

                <p class="text-big">Now, isn't that easy? Why go all the way to the medicine store and wait in line,
                    when
                    you have EPHARMA Pharmacy at your service.</p>

                <h2 class="second-heading">The Services We Offer</h2>
                <p class="text-big">EPHARMA is India's leading digital healthcare platform, where you can buy medicines
                    online
                    with discount. Buy medicine online in Delhi, Mumbai, Bangalore, Hyderabad, Pune, Gurgaon, Noida,
                    Kolkata, Chennai, Ahmedabad, Lucknow and around a 1000 more cities. Besides delivering your online
                    medicine order at your doorstep, we provide accurate, authoritative & trustworthy information on
                    medicines and help people use their medicines effectively and safely.</p>

                <p class="text-big">We also facilitate lab tests at home. You can avail over 2,000 tests and get tested
                    by
                    120+ top and verified labs at the best prices. Need to consult a doctor? On our platform, you can
                    talk to over 20 kinds of specialists in just a few clicks.</p>

                <p class="text-big">Customer centricity is the core of our values. Our team of highly trained and
                    experienced doctors, phlebotomists and pharmacists looks into each order to give you a fulfilling
                    experience.</p>

                <p class="text-big">We’ve made healthcare accessible to millions by giving them quality care at
                    affordable
                    prices. Customer centricity is the core of our values. Our team of highly trained and experienced
                    doctors, phlebotomists and pharmacists looks into each order to give you a fulfilling experience.
                </p>

                <p class="text-big">Visit our online medical store now, and avail online medicine purchase at a
                    discount.
                </p>

                <p class="text-big">Stay Healthy!</p>

                </pre>
            </div>
            <div class="fourth-second-sub-sec">
                <div class="fourth-second-first-sub-sec">
                    <div class="features">
                        <h1 class="last-heading">Reliable</h1>
                        <p class="text-small">All products displayed on EPHARMA are procured from verified and licensed
                            pharmacies. All labs listed
                            on the platform are
                            accredited</p>
                    </div>
                    <div class="features">
                        <h1 class="last-heading">Secure</h1>
                        <p class="text-small">EPHARMA uses Secure Sockets Layer (SSL) 128-bit encryption and is Payment Card
                            Industry Data Security
                            Standard (PCI DSS)
                            compliant</p>
                    </div>
                    <div class="features">
                        <h1 class="last-heading">Affordable</h1>
                        <p class="text-small">Find affordable medicine substitutes, save up to 50% on health products,
                            up to
                            80% off on lab
                            tests and free doctor
                            consultations.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer section -->
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>