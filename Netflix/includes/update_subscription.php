<?php

require 'header.php';
require 'db.php';

if (isset($_POST['subscribe'])) {
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $subscription = $_POST['subscription'];
    $buyer_infos = $_POST['buyer'];
    $date_expiration = date('Y-m-d', strtotime($start_date . " + $subscription day"));
    $query = "UPDATE accounts SET date_start = '$start_date' , subscription = '$subscription', buyer_info = '$buyer_infos',is_used = 'yes' , date_expiration = '$date_expiration' WHERE email = '$email'";
    $conn->exec($query);
    echo "$start_date , $subscription , $buyer_infos , $email";
    header('Location: ../used.php');
} else {
    header('Location: index.php');
}
