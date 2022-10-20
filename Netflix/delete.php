<?php


require 'includes/db.php';
$conn->exec("DELETE FROM accounts");
header('Location: index.php');
