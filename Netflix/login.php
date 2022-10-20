<?php

require 'includes/db.php';
require_once 'includes/style.php';
if (isset($_POST['submit'])) {
    $errorsArray = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username ='$username' and password ='$password'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_OBJ);
    $row = $stmt->rowCount();
    if ($row == 0) {
        array_push($errorsArray, "Incorrect Admin Infos");
    } else if ($row == 1) {
        session_start();
        $_SESSION['username'] = $admin->username;
        header('Location: index.php');
    }
}


?>



<form method="POST">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>
                use this login infos : <br>
                admin:admin
                <div class="errors">
                    <?php


                    if (!empty($errorsArray)) {
                        foreach ($errorsArray as $error) {
                            echo "<p class='error'>$error</p>";
                        }
                    }
                    ?>
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="submit">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
</form>


</body>

<?php


require 'includes/footer.php';
?>