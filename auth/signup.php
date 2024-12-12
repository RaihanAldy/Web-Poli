<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
    exit;
}

if (isset($_POST['signup'])) {
    $name = trim(mysqli_real_escape_string($con, $_POST['nama_user']));
    $user = trim(mysqli_real_escape_string($con, $_POST['username']));
    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));

    $sql_check = mysqli_query($con, "SELECT * FROM tb_user WHERE username ='$user'") or die(mysqli_error($con));
    if (mysqli_num_rows($sql_check) == 0) {
        $sql_insert = mysqli_query($con, "INSERT INTO tb_user (nama_user, username, password) VALUES ('$name', '$user', '$pass')") or die(mysqli_error($con));
        if ($sql_insert) {
            echo "<script>alert('Registration successful');window.location='login.php';</script>";
        }
    } else {
        $error_message = "Email already exists";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In & Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../_assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../_assets/css/style.css">
</head>
<body>
<div class="main">
        <section class="signup" id="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php if (isset($signup_error)) { ?>
                            <div class="row">
                                <p style="color: red; text-align: center;"> <?php echo $signup_error; ?> </p>
                            </div>
                        <?php } ?>
                        <form method="POST" action="" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="nama_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_user" id="nama_user" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-email"></i></label>
                                <input type="username" name="username" id="username" placeholder="Your username" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../_assets/images/signup.jpg" alt="sign up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../_assets/js/jquery.min.js"></script>
    <script src="../_assets/js/main.js"></script>
</body>
</html>
