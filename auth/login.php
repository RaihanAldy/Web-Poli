<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
} else {
    if (isset($_POST['signin'])) {
        $user = trim(mysqli_real_escape_string($con, $_POST['your_name']));
        $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['your_pass'])));
        $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username ='$user' AND password ='$pass'") or die(mysqli_error($con));
        if (mysqli_num_rows($sql_login) > 0) {
            $_SESSION['user'] = $user;
            echo "<script>window.location='" . base_url() . "';</script>";
        } else {
            $error_message = "Invalid username or password";
        }
    }

    // if (isset($_POST['signup'])) {
    //     $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    //     $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    //     $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));

    //     $sql_check = mysqli_query($con, "SELECT * FROM tb_user WHERE username ='$name' OR email ='$email'");
    //     if (mysqli_num_rows($sql_check) > 0) {
    //         $signup_error = "Username or Email already exists";
    //     } else {
    //         $sql_register = mysqli_query($con, "INSERT INTO tb_user (username, email, password) VALUES ('$name', '$email', '$pass')") or die(mysqli_error($con));
    //         echo "<script>alert('Registration successful! Please log in.'); window.location='login.php';</script>";
    //     }
    // }
?><!DOCTYPE html>
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

        <!-- Sign in form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../_assets/images/16.jpg" alt="sign in image"></figure>
                        <p>Don't have an account?</p>  <a href="signup.php"> Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <?php if (isset($error_message)) { ?>
                            <div class="row">
                                <p style="color: red; text-align: center;"> <?php echo $error_message; ?> </p>
                            </div>
                        <?php } ?>
                        <form method="POST" action="" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../_assets/js/jquery.min.js"></script>
    <script src="../_assets/js/main.js"></script>
</body>
</html>
<?php } ?>
