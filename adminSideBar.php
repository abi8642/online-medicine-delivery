<?php
// session_start();
if (((isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] == true))) {
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
    <link rel="stylesheet" href="adminSideBar1.css">
    <title>Admin Dashboard | EPHARMA</title>
</head>

<body>
    <div class="admin-nav">
        <h3>Admin Dashboard</h3>
        <ul class="admin-list">
            <?php
            if ($loggedin) {
                echo '<li><a href="adminManageMeds.php">Manage Medicines</a></li>
                     <li><a href="adminManageOrder.php">Manage Orders</a></li>
                     <li><a href="adminManageContact.php">Manage Contact</a></li>
                     <li id="first"><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </div>
</body>

</html>