<?php 
require_once "controllerUserData.php"; 

if(isset($_SESSION['status'])){
    if($_SESSION['status'] == 'verified'){
        header('location: home');
    }
}
if(!isset($_SESSION['uid'])){
    header('location: Signup');
}
if(isset($_POST['change'])){
    $email       = mysqli_real_escape_string($con, $_POST['nemail']);
    $name        = mysqli_real_escape_string($con, $_POST['nname']);
    $inva        = "In your E-mail .";
    //----------------------------------
    if(empty($email)){
        $msg = '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> Empty E-mail</p>';
    }elseif(preg_match("/;/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ; ) '.$inva.'</p>';
    }elseif(preg_match("/</", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva.'</p>';
    }elseif(preg_match("/>/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva.'</p>';
    }elseif(preg_match("/:/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( : ) '.$inva.'</p>';
    }elseif(preg_match("/,/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( , ) '.$inva.'</p>';
    }elseif(preg_match("/-/", $email)){       
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( - ) '.$inva.'</p>';
    }elseif(preg_match("/`/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva.'</p>';
    }elseif(preg_match("/\(/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva.'</p>';
    }elseif(preg_match("/\)/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva.'</p>';
    }elseif(preg_match("/&/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( & ) '.$inva.'</p>';
    }elseif(preg_match("/'/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva.'</p>';
    }elseif(preg_match("/\"/", $email)){ 
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva.'</p>';
    }elseif(preg_match("/#/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( # ) '.$inva.'</p>';
    }elseif(preg_match("/\//", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( / ) '.$inva.'</p>';
    }elseif(preg_match("/=/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( = ) '.$inva.'</p>';
    }elseif(preg_match("/\*/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva.'</p>';
    }elseif(preg_match("/!/", $email)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ! ) '.$inva.'</p>';
    }elseif(empty($name)){
        $msg = '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> Empty Name</p>';
    }elseif(preg_match("/;/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ; ) '.$inva2.'</p>';
    }elseif(preg_match("/</", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva2.'</p>';
    }elseif(preg_match("/>/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva2.'</p>';
    }elseif(preg_match("/:/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( : ) '.$inva2.'</p>';
    }elseif(preg_match("/,/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( , ) '.$inva2.'</p>';
    }elseif(preg_match("/-/", $name)){       
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( - ) '.$inva2.'</p>';
    }elseif(preg_match("/`/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva2.'</p>';
    }elseif(preg_match("/\(/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva2.'</p>';
    }elseif(preg_match("/\)/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva2.'</p>';
    }elseif(preg_match("/&/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( & ) '.$inva2.'</p>';
    }elseif(preg_match("/'/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva2.'</p>';
    }elseif(preg_match("/\"/", $name)){ 
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva2.'</p>';
    }elseif(preg_match("/#/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( # ) '.$inva2.'</p>';
    }elseif(preg_match("/\//", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( / ) '.$inva2.'</p>';
    }elseif(preg_match("/=/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( = ) '.$inva2.'</p>';
    }elseif(preg_match("/\*/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva2.'</p>';
    }elseif(preg_match("/!/", $name)){
        $msg .= '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ! ) '.$inva2.'</p>';
    }else{
    //----------------------------------

        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res         = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $msg = "<div class='alert alert-danger text-center'>E-mail that you have entered is Already Exist!</div> ";
        }else{
            //------------------
            $name_check = "SELECT * FROM usertable WHERE `name` = '$name' AND `uid`='$_SESSION[uid]' ";
            $resq        = mysqli_query($con, $name_check);
            if(mysqli_num_rows($resq) > 0){
                    $longd     = 7;
                    $cd = "";
                    for($i = 1; $i < $longd ; $i++) {
                        $cd .= mt_rand(1,9);
                    }
                    $upd_email    = "UPDATE `usertable` SET `email`= '$email',`code`= '$cd',`status`='notverified' WHERE `uid`='$_SESSION[uid]'";
                    $up_email     = mysqli_query($con, $upd_email);
                            if(isset($up_email)){
                                $msg = "<div class='alert alert-success text-center'>E-mail Have Updated | Sign Up With New E-mail</div>";
                                $info = "It's look like you haven't still verify your E-mail - ".$email." </a>";

                                $_SESSION['email'] = $email;
                                $_SESSION['info'] = $info;
                                echo '
                                <script>
                                    setTimeout(function(){
                                    window.location.href = "user-otp.php";
                                    }, 15000);
                                </script>';
                                $subject = "Resend Verification Code";
                                $message = "Your Account Verification Code is : $cd";
                                $sender  = "From: moroccan.memes.reply@gmail.com";

                                if(mail($_SESSION['email'], $subject, $message, $sender)){
                                    $msg .= '<div class="alert alert-success" role="alert"> <strong>Excellent !!</strong> We Sent To You Another Verification Code check Your E-mail : '.$_SESSION['email'].'</div>';
                                }else{
                                    $msg = '<div class="alert alert-danger"><strong>Something !</strong> Went Wrong.</div>';
                                }
                            }
                    }else{
                        $msg = "<div class='alert alert-danger text-center'>Wrong Name</div> ";
                    }
            //------------------
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show --> 
    <title>Code Verification</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .hidden{
            display: none;
        }
        .but{
            color:red;
            text-align: center;
            margin: 0 auto;
            display: block;
            border: 1px solid #ff3d00;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto form">
                
                    <h2 class="text-center">Code Verification</h2>

<?php 
                    if(isset($_SESSION['info'])){
                        if(empty($_SESSION['info'])){
                            echo '';
                        }else{
                            echo '<div class="alert alert-success text-center">
                                    '.$_SESSION['info'].'
                                </div>
                                ';
                        }
                    }else{
                        echo '';
                    }
?>
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
        <?php
        echo $msg;
        ?>
                <div id="tool" class="toolbox hidden">
                    <form action="user-otp.php"  method="POST" autocomplete="off">
                    <div class="form-group">
                            <input class="form-control" type="email" value="<?php echo $email;?>" name="nemail" placeholder="Enter New Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" value="<?php echo $name;?>" name="nname" placeholder="Enter Your Current Username">
                        </div>
                        <button type="submit" name="change"  class="btn btn-light but">Change Email</button> 
                    </form>
                </div>

                <div id="conter">
                    <form action="user-otp.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <?php 
                                if (isset($_SESSION['msg'])) {  
                                    echo '<h4>'.$_SESSION['msg'].'</h4>';
                                }
                            ?>
                            <input class="form-control" type="text" id="uintTextBox" maxlength="6" size="6" name="otp" placeholder="Enter verification code">
                        </div>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="check" value="Submit">
                        </div>
                    </form>  
                </div>
                    
                    
            <hr>
            <form action="user-otp.php" method="POST">
                <div class="form-group">
                    <button type="submit" name="resend" class="btn btn-light but">Resend Code</button> 
                </div>
            </form>
           <div class="form-group">
            <button type="button" class="btn btn-light but"><a href="Logout">Logout</a></button> 
        </div> 
        </div>
        
    </div>
</div>
<script >
    function funt() {
        var element = document.getElementById("tool");
        element.classList.toggle("hidden");
    }
    function funtc() {
        var element = document.getElementById("conter");
        element.classList.toggle("hidden");
    }

    
</script>
<script src="js/keys.js"></script>
</body>
</html>
