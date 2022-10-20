<?php
require 'includes/db.php';
require 'includes/header.php';



if (isset($_SESSION['username'])) {
    $query = "SELECT * FROM accounts ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
?>
        <table>
            <th> ID </th>
            <th>Account Login</th>
            <th>Email</th>
            <th>Password</th>
            <th>Plan</th>
            <th>Country</th>
            <th>Payment Method</th>
            <th>Action</th>
            <?php

            $accounts = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($accounts as $account) {
            ?>
                <tr>
                    <td><?= $account->id; ?></td>
                    <td><?= $account->account_infos; ?></td>
                    <td><?= $account->email; ?></td>
                    <td><?= $account->password; ?></td>
                    <td><?= $account->plan; ?></td>
                    <td><?= $account->country; ?></td>
                    <td><?= $account->payment_method; ?></td>
                    <?php
                    if ($account->is_used == 'no') {
                    ?>
                        <td><a class="not_used" href="subscription.php?id=<?= $account->id ?>">Use acc</a></td>

                    <?php
                    } else {
                    ?>
                        <td>Used</td>
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