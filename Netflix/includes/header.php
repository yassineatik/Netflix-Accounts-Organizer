<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="box_style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <nav class="navbar navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="includes/images/logo.png" alt="" width="30" height="24">
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">View accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="insertion.php">Add accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link delete" href="#">delete all accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="used.php">Used accounts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="available.php">Available accounts</a>
                </li>
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="includes/logout.php">Logout</a>
                    </li>

                <?php


                }



                ?>

            </ul>
        </div>
    </nav>

    <div class="popup_box">
        <i class="fas fa-exclamation"></i>
        <h1>The accounts will be deleted Permanently!</h1>
        <label>Are you sure to proceed?</label>
        <div class="btns">
            <a href="#" class="btn1">Cancel</a>
            <a href="delete.php" class="btn2">Delete Accounts</a>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                $('.popup_box').css("display", "block");
            });
            $('.btn1').click(function() {
                $('.popup_box').css("display", "none");
            });
            $('.btn2').click(function() {
                $('.popup_box').css("display", "none");
            });
        });
    </script>