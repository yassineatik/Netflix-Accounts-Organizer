<?php
require 'includes/db.php';
require 'includes/header.php';



if (isset($_SESSION['username'])) {
    $query = "SELECT * FROM accounts WHERE is_used='yes' ORDER BY date_expiration DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
?>
        <table class="used">
            <th>ID</th>
            <th>Account</th>
            <th>Plan</th>
            <th>Subscription</th>
            <th>Start date</th>
            <th>Expiration date</th>
            <th>Avaibility</th>
            <th>Buyer</th>

            <?php

            $accounts = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($accounts as $account) {
                $expiration_date =  date('Y-m-d', strtotime($account->date_start . " + $account->subscription days"));
            ?>
                <tr>
                    <td><?= $account->id; ?></td>
                    <td><?= $account->account_infos; ?></td>
                    <td><?= $account->plan; ?></td>
                    <td><?= $account->subscription; ?></td>
                    <td><?= $account->date_start; ?></td>
                    <td><?= $account->date_expiration; ?></td>
                    <?php
                    $today = Date('Y-m-d');
                    if (strtotime($today) >= strtotime($account->date_expiration)) {
                    ?>
                        <td>Expired</td>
                        <td><?= $account->buyer_info; ?></td>
                    <?php
                    } elseif (strtotime($today) < strtotime($account->date_expiration)) {
                    ?>
                        <td>Active</td>
                        <td><?= $account->buyer_info; ?></td>
                    <?php
                    }

                    ?>
                </tr>

    <?php
            }
            echo "</table>";
        } else {
            echo "You don't have any accounts";
        }
    } else {
        header('Location: login.php');
    }


    require 'includes/footer.php';

    ?>