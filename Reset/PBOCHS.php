<?php require_once "../controllerUserData.php";
if(isset($_SESSION['status'])){
    header('location: ../user-otp.php');
}
if(!isset($_SESSION['mailto'])){
    header('location: ../user-otp.php');
}
if(!isset($_SESSION['nameto'])){
    header('location: ../user-otp.php');
}
if(isset($_SESSION['nameserveedbyses'])){
    if($_SESSION['nameserveedbyses'] !== TRUE){
        header('location: ../Logout');
    }
    $sign = TRUE;
    $email          = mysqli_real_escape_string($con, $_SESSION['mailto']);
    $name           = mysqli_real_escape_string($con, $_SESSION['nameto']);
    $cnewpass = '';
    $newpass = '';
    
    if(isset($_POST['subotp'])){
        
        $otp_code       = (int)$_POST['otp'];
        //check 
        if(empty($email)){
            $errors['email'] = "Empty E-mail !!";
        }elseif(empty($name)){
            $errors['email'] = "Empty Name !!";
        }elseif(empty($otp_code)){
            $errors['email'] = "Empty Code !!";
        }else{
            $check_email    = "SELECT * FROM usertable WHERE email = '$email'";
            $res            = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){

                $fetch      = mysqli_fetch_assoc($res);
                $fetch_name = $fetch['name'];
                $fetch_otp  = $fetch['code'];

                if($fetch_name === $name){
                    if($fetch_otp == $otp_code){

                        $sign = FALSE;

                    }else{
                        $errors['email'] = "Wrong Code Please Make Sure to copy The Valid Code .";
                    }
                }
            }else{
                header('location: ../user-otp.php');
            }
        }

    }
    //------------------------
    if(isset($_POST['change'])){
        $date         = date("Y-m-d");
        $newpass      = mysqli_real_escape_string($con, $_POST['npass']);
        $cnewpass     = mysqli_real_escape_string($con, $_POST['cnpass']);
    
    
        if($newpass === $cnewpass){
                
            
            //*****************************PREGMATCH HERE IMPORTANT !!!!! ********************


                $check_email    = "SELECT * FROM usertable WHERE email = '$email' AND `name` = '$name'";
                $res            = mysqli_query($con, $check_email);
            
                    if(mysqli_num_rows($res) > 0){
                        $fetch = mysqli_fetch_assoc($res);

                            //--------//
                            $subject = "Your Password Has Been Changed";
                            $message = "Your Password Has Been Successfully Changed we just sent this to you For security issues :";
                            $message .= " This Account Password Has Been Changed in ($date / ". date("h:i:sa") ." )";
                            $sender  = "From: moroccan.memes.reply@gmail.com";
                            //-------//
    
                            //--------------------
                            if(mail($email, $subject, $message, $sender)){
    
                                    $epass       = password_hash($newpass, PASSWORD_DEFAULT);
                                    $query       = "UPDATE `usertable` SET `password` = '$epass' WHERE email = '$email' AND `name` = '$name'";
                                    $insertquery = mysqli_query($con, $query);
    
                                    if(isset($insertquery)){
                                        $cdns =  "ValueIsNothing:)";
    
                                        
                                        $crypt = password_hash($cdns, PASSWORD_DEFAULT);
                                        
                                            
                                        $query2       = "UPDATE `usertable` SET `code` = '0' WHERE email = '$email' AND `name` = '$name'";
                                        $delete = mysqli_query($con, $query2);
    
                                        if(isset($delete)){
                                            session_unset();
                                            session_destroy(); 
                                        }
                                       $sign = NULL;

                                    //-------------------
    
    
                                    }else{
                                    $msg = '<div class="alert alert-warning"><strong>Something !</strong> Went Wrong.</div> ';
                                    }
                            }else{
                                    $errors['email'] = "Something Went Wrong E-mail not Sent !!";
                            }
                    }else{
                        header('location: ../user-otp.php');
                    }
        }else{
            $msg = '<div class="alert alert-warning"><strong>Passwords !</strong> don\'t match .</div> ';
        }
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
        <title>Password OTP Reset Area</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto form login-form">
                    <form action="PBOCHS.php" method="POST" autocomplete="">
                        <h2 class="text-center">Reset Password Form</h2>
                        <p class="text-center">Password Code area</p>
    <?php
    if(isset($_SESSION['infos'])){
        echo $_SESSION['infos'];
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
    <?php echo $msg; 
        if($sign === NULL){
            echo '<div class="alert alert-success" role="alert"> <strong>Excellent !!</strong> Your Password Has Been Successfully Changed</div>';
            echo '<br><a href=\'../Login\'>Exit</a>';
        }elseif($sign === TRUE){
    ?>
            <div class="form-group">
                <fieldset disabled>
                    <div class="form-group input-group"><br>
                        
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $email;?>">
                    </div> 
                </fieldset>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="otp" placeholder="Otp Code .." required>
                </div>

                <div class="form-group">
                    <input class="form-control button" type="submit" name="subotp" value="Reset">
                </div>
    <?php
        }else{
        ?>
            <fieldset disabled>
                    <div class="form-group input-group"><br>
                        
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $email;?>">
                    </div> 
                </fieldset>
                    <div class="form-group">
                        <input class="form-control" id="myInput1" type="password" name="npass" placeholder="New Password" value="<?php echo $newpass ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  id="myInput2" type="password" name="cnpass" placeholder="Confirm New Password" value="<?php echo $cnewpass ?>" required>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" onclick="myFunction();" class="custom-control-input" id="customControlInline"><span> </span>
                        <label class="custom-control-label" for="customControlInline">Show Passwords</label>
                </div>
                <div class="form-group">
                        <input class="form-control button" type="submit" name="change" value="Change Password">
                    </div>
        <?php 
        }
        ?>


                </form>
            </div>
        </div>
    </div>
    <script src="../js/show.js"></script>

    </body>
    </html>
<?php
}else{
    header('location: ../user-otp.php');
}

?>
