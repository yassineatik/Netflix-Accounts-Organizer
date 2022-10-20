<?php

require 'includes/db.php';
require 'includes/header.php';


?>


<H2>Insert your accounts here</H2>
<h5>Upload your txt file</h5>


<H5>DOWNLOAD THIS DEMO FILE :</H5>
<A href="100.txt" download>Click Here</A>


<form method="POST" enctype="multipart/form-data">
    <input type="file" name="accounts_file" id="" class="form-control file">
    <input type="submit" value="Insert accounts" class="insert btn btn-secondary">
</form>

<?php



if (isset($_FILES['accounts_file'])) {
    extract($_FILES);
    if ($accounts_file['type'] !== 'text/plain') {
        header('Location: index.php?error=1');
    } elseif ($accounts_file['size'] > 100000) {
        header('Location: index.php?error=2');
    } else {
        $name = explode('.', $accounts_file['name']);
        $name = $name[0] . uniqid() . ".$name[1]";
        $source = $accounts_file['tmp_name'];
        $destination = "accounts/$name";
        move_uploaded_file($source, $destination);
        $file = fopen("$destination", 'r');
        $i = 0;
        $payment_method_array = array('Payment method:', 'Payment Method:', 'payment method:', 'Payment partner:');
        while ($line = fgets($file)) {
            $info  = explode('|', $line);
            $login = $info[0];
            $account = explode(':', $info[0]);
            $email = $account[0];
            $password = $account[1];
            $plan = str_replace("Plan: ", "", $info[1]);
            $country = str_replace("Country:", "", $info[2]);
            $method = str_replace($payment_method_array, "", $info[3]);
            $query = "SELECT email FROM accounts WHERE email = '$email'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                $conn->exec("INSERT INTO accounts(id,account_infos,email,password,plan,country,payment_method,is_used) VALUES(null,'$login','$email','$password','$plan','$country','$method','no')");
            }
        }
        unlink($destination);
        header('Location: index.php');
    }
}


require 'includes/footer.php';
