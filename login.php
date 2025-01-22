<?php
$email_success = false;
$show_err = false;
$login = false;
$email_err = $password_success = $pass_err = $email_success = "";
$password_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db_connect.php";

    // Validates email
    if (empty($_POST["email"])) {
        $email_err = "This field is required";
    } else {
        $email = testInput($_POST["email"]);
        // check if e-mail address syntax is valid
        if (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
            $email
        )) {
            $email_err = "Invalid email format";
        } else {
            $email_success = true;
        }
    }

    // validate password field
    if (empty($_POST["password"])) {
        $pass_err = "Password required";
    } else {
        $pass = testInput($_POST["password"]);
        $password_success = true;
    }

    if ($email_success && $password_success) {
        $sql = "SELECT * FROM `SignUp` WHERE `email_id` = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($pass, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $row['owner_name'];
                    $_SESSION['type'] = $row['type'];

                    if ($row['type'] == "admin") {
                        header("location: adminManageMeds.php");
                    } else {
                        header("location: index.php");
                    }
                } else {
                    $show_err = true;
                }
            }
        } else {
            $show_err = true;
        }
    } else {
        $show_err = false;
    }

    if ($show_err) {
        echo "</br>" . "You have some error. Please try again!";
    }
}
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login1.css">
</head>

<style>
    .backh {
        width: 140px;
        margin: 20px 40px;
        text-align: center;
        padding: 6px;
        background-color: rgb(255, 85, 99);
        border-radius: 5px;
        transition: all 0.17s ease-in-out;
    }

    .backh:hover {
        box-shadow: 1px 0.5px 2px 1px gray;
    }

    .backh a {
        color: black;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
    }
</style>

<body>

    <div class="backh">
        <a href="index.php">
            < Back to Home</a> </div> <div class="cont">
                <div class="form sign-in">
                    <form action="" method="post">
                        <h2>Login</h2>
                        <div id="login-small"><small>Get access to our website</small></div>
                        <label>
                            <span>Email ID</span>
                            <input type="email" name="email" autocomplete="off">
                            <span class="error"><?php echo $email_err; ?></span>
                        </label>
                        <label>
                            <span>password</span>
                            <input type="password" name="password" autocomplete="off">
                            <span class="error"><?php echo $pass_err; ?></span>
                        </label>
                        <button class="submit" type="submit">LOGIN</button>
                        <div class="signup">
                            New on EPHARMA?<a href="signup.php">Sign Up</a>
                        </div>
                        <div class="link">
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa fa-2x fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.google.com" target="_blank">
                                <i class="fa fa-2x fa-google" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="sub-cont">
                    <div class="sub-cont-text">
                        <h2>Hey!</h2>
                        <p>Welcome to our site and get great
                            amout of opportunities!</p>
                    </div>
                </div>
    </div>
</body>

</html>