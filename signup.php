<?php

$name = $drug_id = $drug_cer_no = $email = $password = $confirm_password = "";
$name_success = $drug_id_success = $drug_cer_no_success = $email_success = $password_success = $confirm_password_success = false;
$name_err = $drug_id_err = $drug_cer_no_err = $email_err = $password_err = $confirm_password_err = "";
$error_msg1 = true;
$show_err = false;

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // form validation
    // Validates Username
    if (empty($_POST["ownername"])) {
        $name_err = "This field is required";
    } else {
        // check if name syntax is valid
        $name = testInput($_POST["ownername"]);
        $name_success = true;
    }

    // Validates drug-id
    if (empty($_POST["drug-id"])) {
        $drug_id_err = "This field is required";
    } else {
        // check if drug_id syntax is valid
        $drug_id = testInput($_POST["drug-id"]);
        $exist_sql = "SELECT * FROM SignUp WHERE drug_id = '$drug_id'";
        $exist_sql_result = mysqli_query($conn, $exist_sql);
        $num_exist_row = mysqli_num_rows($exist_sql_result);
        if ($num_exist_row > 0) {
            $drug_id_err = "The value is already exist";
        } else {
            $drug_id_success = true;
        }
    }

    // Validates drug_cer_no
    if (empty($_POST["drug-cer-no"])) {
        $drug_cer_no_err = "This field is required";
    } else {
        // check if drug_cer_no syntax is valid
        $drug_cer_no = testInput($_POST["drug-cer-no"]);
        $exist_sql = "SELECT * FROM SignUp WHERE drug_cer_no = '$drug_cer_no'";
        $exist_sql_result = mysqli_query($conn, $exist_sql);
        $num_exist_row = mysqli_num_rows($exist_sql_result);
        if ($num_exist_row > 0) {
            $drug_cer_no_err = "The value is already exist";
        } else {
            $drug_cer_no_success = true;
        }
    }
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
            $exist_sql = "SELECT * FROM SignUp WHERE email_id = '$email'";
            $exist_sql_result = mysqli_query($conn, $exist_sql);
            $num_exist_row = mysqli_num_rows($exist_sql_result);
            if ($num_exist_row > 0) {
                $email_err = "The Email is already exist";
            } else {
                $email_success = true;
            }
        }
    }

    // Validates password
    if (empty($_POST["password"])) {
        $password_err = "This field is required";
    } else {
        $password = testInput($_POST["password"]);
        if (strlen($_POST["password"]) <= 7) {
            $password_err = "Your Password Must Contain At Least 6 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $password_err = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $password_err = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $password_err = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $password_success = true;
        }
    }

    // Validates confirm-password
    if (empty($_POST["confirmpassword"])) {
        $confirm_password_err = "This field is required";
    } else {
        $confirm_password = testInput($_POST["confirmpassword"]);
        if (strlen($_POST["confirmpassword"]) <= 7) {
            $confirm_password_err = "Your Password Must Contain At Least 6 Characters!";
        } elseif (!preg_match("#[0-9]+#", $confirm_password)) {
            $confirm_password_err = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $confirm_password)) {
            $confirm_password_err = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $confirm_password)) {
            $confirm_password_err = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $confirm_password_success = true;
        }
    }
}
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// store in database
if ($name_success && $drug_id_success && $drug_cer_no_success && $email_success && $password_success) {
    // match passwords
    if ($password === $confirm_password) {
        // hash the password
        $type = "user";
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `signup` (`owner_name`, `drug_id`, `drug_cer_no`, `email_id`, `password`, `type`) VALUES ('$name', '$drug_id', '$drug_cer_no', '$email', '$password_hash', '$type')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["type"] = $type;
            header("location: index.php");
        } else {
            $show_err = true;
        }
    } else {
        $error_msg1 = false;
    }
}
if ($show_err) {
    echo "</br>" . "You have some error. Please try again!";
}
if (!$error_msg1) {
    echo "You should match your Password and Confirm Password!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="signup4.css">
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
            < Back to Home</a>
    </div>
    <div class="cont">
        <div class="sub-cont">
            <div class="sub-cont-text">
                <h2>Hey!</h2>
                <p>Welcome to our site and get great
                    amout of opportunities!</p>
            </div>
        </div>
        <div class="form sign-up">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h2>Sign Up</h2>
                <label>
                    <span>Owner name</span>
                    <input type="text" name="ownername" required autocomplete="off">
                    <span class="error"><?php echo $name_err; ?></span>
                </label>
                <label>
                    <span>Drug id</span>
                    <input type="text" name="drug-id" required autocomplete="off">
                    <span class="error"><?php echo $drug_id_err; ?></span>
                </label>
                <label>
                    <span>Drug no</span>
                    <input type="text" name="drug-cer-no" required autocomplete="off">
                    <span class="error"><?php echo $drug_cer_no_err; ?></span>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required autocomplete="off">
                    <span class="error"><?php echo $email_err; ?></span>
                </label>
                <label>
                    <span>password</span>
                    <input type="password" maxlength="12" minlength="8" name="password" required autocomplete="off">
                    <span class="error"><?php echo $password_err; ?></span>
                </label>
                <label>
                    <span>Confirm password</span>
                    <input type="password" maxlength="12" minlength="8" name="confirmpassword" required autocomplete="off">
                    <span class="error"><?php echo $confirm_password_err; ?></span>
                </label>
                <button class="submit" type="submit">SIGN UP</button>
                <div class="signin">
                    Already Have an Account? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>