<?php

require 'includes/db.php';
require 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM accounts WHERE id = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_OBJ);
?>


    <form method="POST" action="includes/update_subscription.php" class="changes">
        <label class="form-label">Email :</label> <input readonly class="form-control" aria-label="readonly input example" type="email" name="email" value="<?= $account->email ?>"> <br>
        <label for="" class="form-label">Start date : </label> <input class="form-control" type="date" name='start_date' value="<?= date('Y-m-d') ?>"><br>
        Subscription type : <select class="form-select" name="subscription" id="">
            <option value="30">1 month</option>
            <option value="60">2 months</option>
            <option value="90">3 months</option>
            <option value="180">6 months</option>
            <option value="365">1 Year</option>
        </select><br>
        Buyer Phone number : <input class="form-control" type="ll" name="buyer" id=""><br>
        <button type="submit" name="subscribe" class="btn btn-danger">Save changes</button>
    </form>

<?php
} else {
    header('Location: index.php');
}


require 'includes/footer.php';
