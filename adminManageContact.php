<?php
session_start();
// if (((isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] == true))) {
//     $loggedin = true;
// } else {
//     $loggedin = false;
// }

include 'db_connect.php';
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

    <title>Hello, world!</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modalLabel">Type Here</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email_id" id="email_id" aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" name="text" id="text" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'adminSideBar.php'; ?>

    <div style="height: 60vh;" class="container my-4">
        <h2 class="my-5 text-center">Manage Contact</h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Concern</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>

                <!-- <form action="adminManageContact.php" method="post">
                    <button type="submit">Reply</button>
                </form> -->


                <?php

                $sl_no = 1;
                $sql = "SELECT * FROM `contact`";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <th scope="row">' . $sl_no . '</th>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone_no'] . '</td>
                            <td>' . $row['concern'] . '</td>
                            <td>' . $row['date'] . '</td>
                            <td><button type="button" class="reply btn btn-md btn-primary">Reply</button></td>
                        </tr>';

                    $sl_no++;
                }

                ?>
            </tbody>
        </table>
    </div>


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
        edits = document.getElementsByClassName('reply');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                email = tr.getElementsByTagName("td")[1].innerText;

                email_id.value = email;
                $('#edit-modal').modal('toggle');
            });
        });
    </script>

    <?php include 'adminFooter.php'; ?>

</body>

</html>