<?php require_once "../controllerUserData.php";
if(!isset($_SESSION['uid'])){
    header('location: ../Signup');
}
if(isset($_SESSION['status'])){
    if($_SESSION['status'] != 'verified'){
        header('location: ../Logout');
    }
   
}else{
    header('location: ../Signup');
}   
// ---------------CHECK IN DB IF USER EXIST OR NOT -------------------

    $fetch_info_about_user  = "SELECT * FROM `bycrypt` WHERE `uid` = '$_SESSION[uid]'";
    $fetched_data = mysqli_query($con, $fetch_info_about_user);
    if(mysqli_num_rows($fetched_data) > 0){
        $permission  = TRUE;// EXIST IN DB
    }else{
        $permission  = FALSE;// DOESN'T EXIST IN DB
    }

// ---------------------------END----------------------------------
    $firstname    = "";
    $lastname     = "";
    $gender       = "";
    $phone        = "";
    $phtag        = "";
    $d            = "";
    $m            = "";
    $y            = "";
    $msg          = "";
    $curpass      = "";
    $newpass      = "";
    $cnewpass     = "";
    $fetch_data   = "SELECT * FROM usertable WHERE email = '$_SESSION[email]'";
    $run_query    = mysqli_query($con, $fetch_data);
    $fetch_info   = mysqli_fetch_assoc($run_query);
    
if(isset($_POST['change'])){
    $date         = date("Y-m-d");
    $curpass      = mysqli_real_escape_string($con, $_POST['cpass']);
    $newpass      = mysqli_real_escape_string($con, $_POST['npass']);
    $cnewpass     = mysqli_real_escape_string($con, $_POST['cnpass']);


    if($newpass === $cnewpass){

        if($newpass === $curpass){
            $msg = '<div class="alert alert-danger" role="alert"> <strong>Oops !!</strong> You Can\'t Change your Password by Your Current Password</div>';
        }else{

            $check_email    = "SELECT * FROM usertable WHERE email = '$_SESSION[email]' AND `uid` = '$fetch_info[uid]'";
            $res            = mysqli_query($con, $check_email);
        
                if(mysqli_num_rows($res) > 0){
                    $fetch = mysqli_fetch_assoc($res);
                    $fetch_pass = $fetch['password'];
                    if(password_verify($curpass, $fetch_pass)){
                        //--------//
                        $subject = "Your Password Has Been Changed";
                        $message = "Your Password Has Been Successfully Changed we just sent this to you For security issues :";
                        $message .= " This Account Password Has Been Changed in ($date / ". date("h:i:sa") ." )";
                        $sender  = "From: moroccan.memes.reply@gmail.com";
                        //-------//

                        //--------------------
                        if(mail($fetch_info['email'], $subject, $message, $sender)){

                                $epass       = password_hash($newpass, PASSWORD_DEFAULT);
                                $query       = "UPDATE `usertable` SET `password` = '$epass' WHERE `email` = '$_SESSION[email]'";
                                $insertquery = mysqli_query($con, $query);

                                if(isset($insertquery)){
                                    $cdns =  "ValueIsNothing:)";

                                    
                                    $crypt = password_hash($cdns, PASSWORD_DEFAULT);
                                    

                                    $msg = '<div class="alert alert-success" role="alert"> <strong>Excellent !!</strong> Your Password Has Been Successfully Changed</div>';
                                    
                                    echo '
                                    
                                    <script>
                                        setTimeout(function(){
                                        window.location.href = "../Login?em='.$_SESSION['email'].'&mtu='.$crypt.'";
                                        }, 3000);
                                    </script>';
                                    if(isset($msg)){
                                        session_unset();
                                        session_destroy(); 
                                    }

                                //-------------------


                                }else{
                                $msg = '<div class="alert alert-warning"><strong>Something !</strong> Went Wrong.</div> ';
                                }
                        }else{
                                $errors['email'] = "Something Went Wrong E-mail not Sent !!";
                        }
                    }else{
                        $errors['email'] = "Incorrect password! Please if you forget Your Password LogOut Then Go To Reset Password <a href='Password.php'>Click Here<a>";
                    }
                }else{
                    $errors['email'] = "It's look like you're not a yet member! Click on the bottom link to signup.";
                }

            
        }

    }else{
        $msg = '<div class="alert alert-warning"><strong>Passwords !</strong> don\'t match .</div> ';
    }
}

if(isset($_POST['setnew'])){
    $date      = date("Y-m-d");
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
    $gender    = (int)$_POST['gender'];
    $phone     = (int)$_POST['phone'];
    $phtag     = (int)$_POST['phtag'];

    $d      = (int)$_POST['day'];
    $m      = (int)$_POST['month'];
    $y      = (int)$_POST['year'];


    if(empty($firstname)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Firstname</div> ";
    }elseif(empty($lastname)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Lastname</div> ";
    }elseif(empty($gender)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Gender</div> ";
    }elseif(empty($phone)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Phone OR (Invalid) </div> ";
    }elseif(empty($phtag)){
        $msg = "<div class='alert alert-danger text-center'>Empty-TagPhone(+000)</div>";
    }elseif(empty($d)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Day</div> ";
    }elseif(empty($m)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Month</div> ";
    }elseif(empty($y)){
        $msg = "<div class='alert alert-danger text-center'>Empty-Year</div> ";
    }else{
        if($gender === 1){
            $gen = "male";
        }elseif($gender === 2){
            $gen = "female";
        }else{
            $gen = "ER404";
        }
        $gender_crypted = $gen;

        $phone_crypted = "+".$phtag." - (".$phone.")";
        //-------//
        $birth_crypted = $d."-".$m."-".$y;
        //------------//
        $subject = "And You're All Set To Go!";
        $message = "Congratulations";
        $message .= "** (Your now one of us Congratulations) **";
        $sender  = "From: moroccan.memes.reply@gmail.com";
        //-------//

        //--------------------
        if(isset($message)){
            $_SESSION['message_reg'] = $message;
            $_SESSION['icon']        = "success";
            $query_upd = "UPDATE `usertable` SET `ui`='1' WHERE email = '$_SESSION[email]' AND `uid` = '$fetch_info[uid]'" ;
            $inserit = mysqli_query($con, $query_upd);
            if(isset($inserit)){
                $queryes = "INSERT INTO `bycrypt`(`uid`, `ufirstname`, `ulastname`, `ugender`,
                `utagphone`,
                `uphone`,
                `birth_us`,
                `pri_f_img`,
                `pri_f_birth`,
                `pri_f_lastn`,
                `pri_f_name`,
                `pri_f_email`,
                `pri_f_followers`,
                `pri_f_gen`,
                `pri_f_bio`,
                `pri_f_socialm`,
                `pri_f_phone`,
                `pri_f_grade`, 
                `pri_f_stats`
                   ) VALUES (
                 '$fetch_info[uid]',
                 '$firstname',
                 '$lastname',
                 '$gender_crypted',
                 '$phtag',
                 '$phone_crypted',
                 '$birth_crypted',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1',
                 '1' )";
                








                $insetS = mysqli_query($con, $queryes);
                
                if((isset($insetS) )&&($permission === FALSE) ){
                    $msg = '<div class="alert alert-success" role="alert"><strong>Excellent !!</strong> You\'re All Set (Welcome Again to Us)
                    </div>';
                    $_SESSION['ui'] = 1;
                    echo '<script>setTimeout(function(){ window.location.href = window.location.href; }, 3000);</script>';
                }else{
                    $msg = "<div class='alert alert-danger text-center'>Something went Wrong (Insert Setup / !Permission) E60-76667 </div> ";

                }

            }else {
                $msg = "<div class='alert alert-danger text-center'>Something went Wrong (Insert Setup) E60-76667 </div> ";

            }

            
        }else{
            $msg = "<div class='alert alert-danger text-center'>Something went Wrong (E-mail Setup) E65-98689 </div> ";
        }
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title><?php echo $fetch_info['name'] ?> Account | Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
        <nav class="navbar">
            <a class="navbar-brand" href="../">Brand name</a>
            <!-- Somehow I got an error, so I comment this button tag, just uncomment to use or show -->
            <button type="button" class="btn btn-light"><a href="../Logout">Logout</a></button>
        </nav>
    <div class="container">
        
            
            <?php 
            if(isset($_SESSION['ui'])){
                if($_SESSION['ui'] == 1 && $permission === TRUE){
            ?>
            <div class="row">
            <div class="col-md-6 m-auto form login-form">
             <form action="User-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Change Password Account</h2>
                    <p class="text-center"></p>
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
                        <input class="form-control" id="myInput1" type="password" name="cpass" placeholder="Current Password" value="<?php echo $curpass ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="myInput2" type="password" name="npass" placeholder="New Password" value="<?php echo $newpass ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control"  id="myInput3" type="password" name="cnpass" placeholder="Confirm New Password" value="<?php echo $cnewpass ?>" required>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" onclick="myFunction()" class="custom-control-input" id="customControlInline"><span> </span>
                        <label class="custom-control-label" for="customControlInline">Show Passwords</label>
                    </div>
                   
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change" value="Change Password">
                    </div>

            </form>
        </div>
        </div>
<?php
                }else{
?>
<div class="card bg-light orderbyliecense" >
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Human Verification</h4>
        <p class="text-center">Step Verification (Required) !!</p>
            <?php echo $msg;?>
                <form action="User-password.php" method="POST" autocomplete="">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
                                </svg>
                        </span>
                        </div>
                        <input name="firstname" class="form-control" value="<?php echo $firstname;?>" placeholder="First-Name" type="text" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
                                </svg>
                        </span>
                        </div>
                        <input name="lastname" class="form-control" value="<?php echo $lastname;?>" placeholder="Last-Name" type="text" required>
                    </div>
                     <!-- form-group// -->
                    <fieldset disabled>
                        <div class="form-group input-group"><br>
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $_SESSION['email'];?> (Unchangeable)">
                        </div> 
                    </fieldset>
                    <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" value="<?php echo $phtag;?>" name="phtag" style="max-width: 120px;" required>
                            <option value="" selected disabled hidden>+000</option>
                            <option value="212">+212</option>
                            <option value="31">+31</option>
                            <option value="1">+1</option>
                        </select>
                        <input name="phone" class="form-control" value="<?php echo $phone;?>" placeholder="Phone number" type="text" required>
                    </div>

                     <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                </svg>
                            </span>
                        </div>
                        <select name="gender" class="form-control" value="<?php echo $gender;?>" required>
                            <option value="" selected disabled hidden>Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <!-- -- --> 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select name="day" class="custom-select d-block w-100" id="day" value="<?php echo $d;?>" required>
                                <option value="" selected disabled hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="month" class="custom-select d-block w-100" id="month" value="<?php echo $m;?>" required>
                            <option value="" selected disabled hidden>Month</option>

                            <option value="1">January</option>
                            <option value="2">Febuary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>

                            </select>
                            
                        </div>
                        <div class="col-md-6 mb-3">
                           <select name="year" class="custom-select d-block w-100" id="year" value="<?php echo $y;?>" required>
                           <option value="" selected disabled hidden>Year</option>

                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            </select>
                        </div>
                    </div>
                    <!-- form-group// -->                                      
                    <div class="form-group">
                        <button name="setnew" type="submit" class="btn btn-primary btn-block"> Submit !!  </button>
                    </div> <!-- form-group// -->      
                    <p class="text-center">More Information About <br>Human Verification .(<a href="#">Click Here</a>)</p>
                </form>
</article>
</div>
<?php
                }
            }
                 ?>

              


</div>
        <script src="../js/show.js"></script>
</body>
</html>
