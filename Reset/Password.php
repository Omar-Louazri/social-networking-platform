<?php require_once "../controllerUserData.php";
if(isset($_SESSION['status'])){
    header('location: ../user-otp.php');
}
$code = '';
if(isset($_GET['em']) && !empty($_GET['em'])){
    $cem = mysqli_real_escape_string($con, $_GET['em']);

    if(filter_var($cem, FILTER_VALIDATE_EMAIL)  == false){
        $email = '';
    }else{
        $email     = mysqli_real_escape_string($con, $cem);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Password Reset Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto form login-form">
                <form action="Password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Reset Password Form</h2>
                    <p class="text-center">We will send to you a link that you will help you to Reset your Account</p>
<?php
                    if(count($errors) > 0){
?>
                        <div class="alert alert-danger text-center">
<?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
?>
                        </div>
<?php
                    }
?>                
<?php echo $msg; ?>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address .." value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="You Account Name .." value="<?php echo $name ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="reset" value="Reset">
                    </div>
            <div class="link login-link text-center">Not yet a member? <a href="../Signup">Signup now</a></div>
        </form>
</div>
</div>
</div>
</body>
</html>
