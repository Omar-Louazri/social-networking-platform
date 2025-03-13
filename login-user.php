<?php 
require_once "controllerUserData.php";
    $information = FALSE;
    $mtu         = FALSE;


    if(isset($_SESSION['status'])){
        header('location: user-otp.php');
    }
    if(isset($_GET['em']) && !empty($_GET['em'])){
        $cem = mysqli_real_escape_string($con, $_GET['em']);

        if(filter_var($cem, FILTER_VALIDATE_EMAIL)  == false){
            $email = '';
        }else{
            $email     = mysqli_real_escape_string($con, $cem);
        }

    }
    if(isset($_GET['mtu']) && !empty($_GET['mtu'])){
        //check this value 
        $mops = $_GET['mtu'];

        $cryption = mysqli_real_escape_string($con, $mops);
        $mtps = "ValueIsNothing:)";

        if(password_verify($mtps, $cryption)){
            $mtu = TRUE;
        }else{
            $mtu = FALSE;
        }

    }
    if(isset($_GET['info']) && !empty($_GET['info'])){
        //check this value 
        $mop = $_GET['info'];
        $encryption = mysqli_real_escape_string($con, $mop);
        $clientmtps = "ValueIsThisThing";

        if(password_verify($clientmtps, $encryption)){
            $information = TRUE;
        }else{
            $information = FALSE;

        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery_1.7.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        .error_msg_inputs{
            font-size:16px;
            background-color:#fff;
            color:red;
            width:100%;
            border-radius:7px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto form login-form">
                <form action="Login" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
<?php
                    if($information === TRUE){
                        echo '
                        <div class="alert alert-success text-center">
                            We aleready sent to you an email Contains The new Password in This E-mail ('.$email.')
                        </div>
                        ';
                        $mtu === FALSE;
                    }else{
                        echo '';
                    }
                    if($mtu === TRUE){
                        echo '
                        <div class="alert alert-success text-center">
                            Your Password Has Been Changed Successfully<br>
                            Try Your New Password
                        </div>
                        ';
                        $information === FALSE;
                    }else{
                        echo '';
                    }
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
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php if( $email == ''){ echo ''; }else{ echo htmlentities($email); }; ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <!-- Somehow I got an error, so I comment this div, just uncomment to use or show -->
                    <div class="link login-link text-center">
                        Not yet a member? <a href="Signup">Signup now</a>
                    </div>
            </form>
        </div>
    </div>
</div>

<script src="js/main.js" type="text/javascript" charset="UTF-8"></script>
</body>
</html>
