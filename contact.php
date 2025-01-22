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
    <link rel="stylesheet" href="contact2.css">
    <title>Contact us | EPHARMA</title>
</head>

<body>
    <?php

    $name = $phone_no = $email = $concern = "";
    $name_success = $phone_no_success = $email_success = $concern_success = false;
    $name_err = $phone_no_err = $email_err = $concern_err = "";

    include 'db_connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $name_err = "This field is requiered";
        } else {
            $name = $_POST["name"];
            $name_success = true;
        }

        if (empty($_POST["phone"])) {
            $phone_no_err = "This field is requiered";
        } else {
            $phone_no = $_POST["phone"];
            $phone_no_success = true;
        }

        if (empty($_POST["email"])) {
            $email_err = "This field is requiered";
        } else {
            $email = $_POST["email"];
            $email_success = true;
        }

        if (empty($_POST["comment"])) {
            $concern_err = "This field is requiered";
        } else {
            $concern = $_POST["comment"];
            $concern_success = true;
        }

        if ($name_success && $phone_no_success && $email_success) {
            $insert_sql = "INSERT INTO `contact` (`name`, `phone_no`, `email`, `concern`, `date`) VALUES ('$name', '$phone_no', '$email', '$concern', current_timestamp())";
            $result = mysqli_query($conn, $insert_sql);
            if ($result) {
                echo "We receive Your Concern";
            } else {
                echo "We can't receive Your Concern";
            }
        }
    }
    // else {
    //     echo "The request is not a post request";
    // }

    ?>
    <?php include 'navbar.php'; ?>
    <section class="top">
        <img src="m-d-img/banner-d1.png" alt="">
    </section>
    <section class="contact">
        <div class="contact-form">
            <h1>Contact Us</h1>
            <p>Get in touch with us by filling the details below</p>
            <form id="form" method="post" action="contact.php">
                <input type="text" name="name" id="name" autocomplete="off" placeholder="Name*"><span class="error"><?php echo $name_err; ?></span>
                <input type="number" name="phone" id="phone" autocomplete="off" placeholder="Phone No*"><span class="error"><?php echo $phone_no_err; ?></span>
                <input type="email" name="email" id="email" autocomplete="off" placeholder="Email*"><span class="error"><?php echo $email_err; ?></span>
                <textarea name="comment" id="comment" cols="46" rows="8" placeholder="Write Your Query*"></textarea><span class="error"><?php echo $concern_err; ?></span>
                <input id="contact-btn" type="submit" value="submit">
            </form>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>