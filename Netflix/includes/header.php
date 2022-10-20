<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
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
                    <a class="nav-link" href="delete.php">delete all accounts</a>
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