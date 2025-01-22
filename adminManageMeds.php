<?php
session_start();
// if (((isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] == true))) {
//     $loggedin = true;
// } else {
//     $loggedin = false;
// }

?>
<?php

include 'db_connect.php';
$insert = false;
$update = false;
$delete = false;

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];

    $sql3 = "DELETE FROM `medicines` WHERE `medicines`.`item_id` = $sno";
    $result3 = mysqli_query($conn, $sql3);

    if ($result3) {
        $delete = true;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['slno_edit'])) {
        // Update the record
        $sl_no = $_POST['slno_edit'];
        echo $sl_no;
        $type_edit = $_POST['type_edit'];
        $name_edit = $_POST['item_name_edit'];
        $company_edit = $_POST['company_edit'];
        $desc_edit = $_POST['item_desc_edit'];
        $photo_edit = $_POST['photo_edit'];
        $pack_edit = $_POST['pack_edit'];
        $mrp_edit = $_POST['mrp_edit'];
        $discount_edit = $_POST['discount_edit'];
        $exp_mon_edit = $_POST['exp_mon_edit'];
        $exp_year_edit = $_POST['exp_year_edit'];

        $sql2 = "UPDATE `medicines` SET `type`='$type_edit',`item_name`='$name_edit',`company_name`='$company_edit',`item_desc`='$desc_edit',`photo`='$photo_edit',`pack`='$pack_edit',`mrp`='$mrp_edit',`discount`='$discount_edit',`exp_month`='$exp_mon_edit',`exp_year`='$exp_year_edit' WHERE `medicines`.`item_id` = '$sl_no'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            $update = true;
        } else {
            echo "No";
        }
    } else {
        $type = $_POST['type'];
        $name = $_POST['item_name'];
        $company = $_POST['company'];
        $desc = $_POST['item_desc'];
        $photo = $_POST['photo'];
        $pack = $_POST['pack'];
        $mrp = $_POST['mrp'];
        $discount = $_POST['discount'];
        $exp_mon = $_POST['exp_mon'];
        $exp_year = $_POST['exp_year'];
        $rating = mt_rand(0, 25);

        $sql1 = "INSERT INTO `medicines` (`type`, `item_name`, `company_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year`) VALUES ('$type', '$name', '$company', '$desc', '$photo', '$pack', '$mrp', '$discount', '$rating', '$exp_mon', '$exp_year')";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            $insert = true;
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Admin Dashboard | EPHARMA</title>

</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="adminManageMeds.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="slno_edit" id="slno_edit">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="item_name_edit">Item Name</label>
                                <input type="text" class="form-control" name="item_name_edit" id="item_name_edit" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company_edit">Company Name</label>
                                <input type="text" class="form-control" name="company_edit" id="company_edit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="photo_edit">Photo</label>
                                <input type="text" class="form-control" name="photo_edit" id="photo_edit" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_edit">Type</label>
                                <input type="text" class="form-control" name="type_edit" id="type_edit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="item_desc_edit">Item Description</label>
                            <textarea class="form-control" name="item_desc_edit" id="item_desc_edit" rows="3"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pack_edit">Pack</label>
                                <input type="text" class="form-control" name="pack_edit" id="pack_edit" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mrp_edit">MRP</label>
                                <input type="number" step="0.01" class="form-control" name="mrp_edit" id="mrp_edit" autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="discount_edit">Discount</label>
                                <input type="number" class="form-control" name="discount_edit" id="discount_edit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exp_mon_edit">Exp Month</label>
                                <input type="text" class="form-control" name="exp_mon_edit" id="exp_mon_edit" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exp_year_edit">Exp Year</label>
                                <input type="number" class="form-control" name="exp_year_edit" id="exp_year_edit" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'adminSideBar.php'; ?>
    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> Record has been inserted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
    ?>
    <?php
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> Record has been Updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
    ?>
    <?php
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> Record has been Deleted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
    ?>

    <div class="px-5 my-5">
        <h2 class="pb-5 text-center">Manage Medicine Data </h2>
        <form action="adminManageMeds.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="item_name">Item Name</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" name="company" id="company" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="photo">Photo</label>
                    <input type="text" class="form-control" name="photo" id="photo" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="item_desc">Item Description</label>
                <textarea class="form-control" name="item_desc" id="item_desc" rows="3"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pack">Pack</label>
                    <input type="text" class="form-control" name="pack" id="pack" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="mrp">MRP</label>
                    <input type="number" step="0.01" class="form-control" name="mrp" id="mrp" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <label for="discount">Discount</label>
                    <input type="number" class="form-control" name="discount" id="discount" autocomplete="off">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exp_mon">Exp Month</label>
                    <input type="text" class="form-control" name="exp_mon" id="exp_mon" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="exp_year">Exp Year</label>
                    <input type="number" class="form-control" name="exp_year" id="exp_year" autocomplete="off">
                </div>
            </div>
            <button type="submit" value="submit" class="btn btn-primary btn-lg">ADD</button>
        </form>
    </div>

    <div class=" p-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sl.NO</th>
                    <th scope="col">Type</th>
                    <th scope="col">Item-Name</th>
                    <th scope="col">Company-Name</th>
                    <th scope="col">Item-Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Pack</th>
                    <th scope="col">MRP</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Exp-Month</th>
                    <th scope="col">Exp-Year</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl_no = 1;
                $sql = "SELECT *FROM `medicines`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <th scope="row">' . $sl_no . '</th>
                            <td>' . $row['type'] . '</td>
                            <td>' . $row['item_name'] . '</td>
                            <td>' . $row['company_name'] . '</td>
                            <td>' . $row['item_desc'] . '</td>
                            <td>' . $row['photo'] . '</td>
                            <td>' . $row['pack'] . '</td>
                            <td>' . $row['mrp'] . '</td>
                            <td>' . $row['discount'] . '</td>
                            <td>' . $row['exp_month'] . '</td>
                            <td>' . $row['exp_year'] . '</td>
                            <td> <button class="edit btn btn-sm btn-primary d-block m-2" id="' . $row['item_id'] . '">Edit</button> <button class="delete btn btn-sm btn-primary d-block m-2" id=d"' . $row['item_id'] . '">Delete</button> </td>
                        </tr>';
                    $sl_no++;
                }
                ?>


            </tbody>
        </table>
    </div>

    <?php include 'adminFooter.php'; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Data table js -->
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        // Modal js
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                type = tr.getElementsByTagName("td")[0].innerText;
                item_name = tr.getElementsByTagName("td")[1].innerText;
                company = tr.getElementsByTagName("td")[2].innerText
                item_desc = tr.getElementsByTagName("td")[3].innerText;
                photo = tr.getElementsByTagName("td")[4].innerText;
                pack = tr.getElementsByTagName("td")[5].innerText;
                mrp = tr.getElementsByTagName("td")[6].innerText;
                discount = tr.getElementsByTagName("td")[7].innerText;
                exp_mon = tr.getElementsByTagName("td")[8].innerText;
                exp_year = tr.getElementsByTagName("td")[9].innerText;

                // console.log(item_name, item_desc, photo, pack, mrp, discount, exp_mon, exp_year);

                item_name_edit.value = item_name;
                company_edit.value = company;
                item_desc_edit.value = item_desc;
                photo_edit.value = photo;
                type_edit.value = type;
                pack_edit.value = pack;
                mrp_edit.value = mrp;
                discount_edit.value = discount;
                exp_mon_edit.value = exp_mon;
                exp_year_edit.value = exp_year;
                slno_edit.value = e.target.id;
                $('#edit-modal').modal('toggle');
            });
        });

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log(deletes);
                sno = e.target.id.substr(1, );

                // console.log(item_name, item_desc, photo, pack, mrp, discount, exp_mon, exp_year);

                if (confirm("Are you sure you want to Delete this record?")) {
                    console.log("Yes");
                    window.location = `adminManageMeds.php?delete=${sno}`;
                } else {
                    console.log("No");
                }
            });
        });
    </script>

</body>

</html>