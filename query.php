<?php
include 'db_connect.php';
$query = $_GET['query'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="query2.css">
    <title>Search for <?php echo $query; ?> | EPHARM</title>
</head>


<body>
    <?php

    include 'navbar.php';

    ?>
    <div class="main_q_search">
        <div class="search">
            <h1>Search Result for "<em><?php echo $query; ?></em>"</h1>
            <?php

            $sql = "SELECT * FROM `medicines` WHERE `item_name` LIKE '%" . $query . "%'
                   OR `type` LIKE '%" . $query . "%'
                   OR `company_name` LIKE '%" . $query . "%'";

            $result = mysqli_query($conn, $sql);
            $noresult = true;

            while ($row = mysqli_fetch_assoc($result)) {

                echo '<a href="product.php?item_name=' . $row['item_name'] . '">
                        <div>' . $row['item_name'] . '</div>
                    </a>';
                $noresult = false;
            }
            if ($noresult) {
                echo '<div class="error">
                        Sorry No Result match
                    </div>';
            }

            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>