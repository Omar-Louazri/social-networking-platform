<?php 
require_once "controllerUserData.php";




//----------------------- rewrite url--------------------------------
if(empty($_GET['u'])){
    header('location: home');
}
if($_SESSION['status'] == 'verified'){
    $mseg           = "";
    $message        = "";
    //------------{
    if(!isset($_POST['firstname'])){
        $_POST['firstname'] = '';
    }
    if(!isset($_POST['gender'])){
        $_POST['gender'] = '';
    }
    if(!isset($_POST['lastname'])){
        $_POST['lastname'] = '';
    }
    if(!isset($_POST['phone'])){
        $_POST['phone'] = '';
    }
    if(!isset($_POST['email'])){
        $_POST['email'] = '';
    }
    if(!isset($_POST['stats'])){
        $_POST['stats'] = '';
    }
    if(!isset($_POST['img'])){
        $_POST['img'] = '';
    }
    if(!isset($_POST['birthday'])){
        $_POST['birthday'] = '';
    }
    if(!isset($_POST['socialm'])){
        $_POST['socialm'] = '';
    }
    if(!isset($_POST['bio_n'])){
        $_POST['bio_n'] = '';
    }
    if(!isset($_POST['grade'])){
        $_POST['grade'] = '';
    }
    //------------}
    $fetch_data = "SELECT * FROM usertable WHERE email = '$_SESSION[email]'";
    $run_query = mysqli_query($con, $fetch_data);
    if(mysqli_num_rows($run_query) < 1){
        header("Location: Login");
    }
    $fetch_info = mysqli_fetch_assoc($run_query);


    //------------}
    $name             = htmlspecialchars($_GET['u'], ENT_QUOTES, 'UTF-8');
    $name             = mysqli_real_escape_string($con, $name);
    $fetch_data3      = "SELECT * FROM `usertable` WHERE `name` = '$name'";
    $run_query11      = mysqli_query($con, $fetch_data3);
    $fetch_info00     = mysqli_fetch_assoc($run_query11);
    $uid              = (int)$fetch_info00['uid'];
    $query2           = "SELECT * FROM `bycrypt` WHERE `uid` = '$uid'";
    $fetch2           = mysqli_query($con, $query2);
    $fetch_info002    = mysqli_fetch_assoc($fetch2);
    if(mysqli_num_rows($run_query11) > 0){
        //do nothing
     }else{
        header("Location: ./error_page.php?g=profile&p=$name");
     }
   
    $fetch_info00_about_user  = "SELECT * FROM `bycrypt` WHERE `uid` = '$_SESSION[uid]'";
    $fetched_data = mysqli_query($con, $fetch_info00_about_user);
    if(mysqli_num_rows($fetched_data) > 0){
       //do nothing
    }else{
         header("Location: Reset/User-Password.php");
    }

    //------------------------------------
    $userss     = mysqli_query($con, "SELECT * FROM `usfol_tab` WHERE `uid_benef` = '$uid'");
    $followers  = mysqli_num_rows($userss);

    $users     = mysqli_query($con, "SELECT * FROM `usfol_tab` WHERE `uid_notb` = '$uid'");
    $following  = mysqli_num_rows($users);
    //------- END FOR QUERIES -------------


    if(isset($_POST['bio_updt'])){
        
        $bio          = mysqli_real_escape_string($con, $_POST['bio']);
        $qu           = "UPDATE `bycrypt` SET `ubio` = '$bio' WHERE `uid` = '$uid'";
        $fupd         = mysqli_query($con, $qu);
        if(isset($fupd)){
            $mseg = '<div class="alert alert-success"><strong>Exellent !</strong> Updated successfully  <span id="countdown">5</span></div>
            <script>
                var timeleft = 4;
                var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    clearInterval(downloadTimer);
                    document.getElementById("countdown").innerHTML = "Finished";
                } else {
                    document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                }
                timeleft -= 1;
                }, 1000);
                setTimeout(function () {
                    window.location.href = window.location.href;
                }, 5000);
            </script>';
        }else{
            $mseg = '<div class="alert alert-warning"><strong>Something !</strong> Went Wrong.</div>';
        }

    }

    if(isset($_POST['privacy_updt'])){
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
        $gender    = mysqli_real_escape_string($con, $_POST['gender']);
        $phone     = mysqli_real_escape_string($con, $_POST['phone']);
        $email_val = mysqli_real_escape_string($con, $_POST['email']);
        $stats     = mysqli_real_escape_string($con, $_POST['stats']);
        $prf_image = mysqli_real_escape_string($con, $_POST['img']);
        $birthd    = mysqli_real_escape_string($con, $_POST['birthday']);
        $grade     = mysqli_real_escape_string($con, $_POST['grade']);
        $socialme  = mysqli_real_escape_string($con, $_POST['socialm']);
        $bio       = mysqli_real_escape_string($con, $_POST['bio_n']);

        if(empty($firstname)){
            $firstname = 0;
        }else{
            $firstname = 1;
        }
        //--------------
        if(empty($lastname)){
            $lastname = 0;
        }else{
            $lastname = 1;
        }
        //--------------
        if(empty($gender)){
            $gender = 0;
        }else{
            $gender = 1;
        }
        //--------------
        if(empty($phone)){
            $phone = 0;
        }else{
            $phone = 1;
        }
        //--------------
        if(empty($email_val)){
            $email_val = 0;
        }else{
            $email_val = 1;
        }
        //--------------
        if(empty($stats)){
            $stats = 0;
        }else{
            $stats = 1;
        }
        //--------------
        if(empty($prf_image)){
            $prf_image = 0;
        }else{
            $prf_image = 1;
        }
        //--------------
        if(empty($birthd)){
            $birthd = 0;
        }else{
            $birthd = 1;
        }
        //--------------
        if(empty($grade)){
            $grade = 0;
        }else{
            $grade = 1;
        }
        //--------------
        if(empty($socialme)){
            $socialme = 0;
        }else{
            $socialme = 1;
        }
        //--------------
        if(empty($bio)){
            $bio = 0;
        }else{
            $bio = 1;
        }
        //--------------

        $order = "UPDATE `bycrypt` SET `pri_f_name`='$firstname',`pri_f_stats`='$stats' ,`pri_f_lastn`='$lastname', `pri_f_gen`='$gender', `pri_f_phone`='$phone', `pri_f_email`='$email_val', `pri_f_img`='$prf_image',`pri_f_birth`='$birthd',`pri_f_grade`='$grade',`pri_f_bio`='$bio',`pri_f_socialm`='$socialme' WHERE `uid` = '$uid' ";
        $update_que = mysqli_query($con, $order);
        if(isset($update_que)){
            $message = '<div class="alert alert-success"><strong>Exellent !</strong> Updated successfully <span id="countdown">5</span></div>
            <script>
                var timeleft = 4;
                var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    clearInterval(downloadTimer);
                    document.getElementById("countdown").innerHTML = "Finished";
                } else {
                    document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                }
                timeleft -= 1;
                }, 1000);
                setTimeout(function () {
                    window.location.href = window.location.href;
                }, 5000);
            </script>
            ';
        }else{
            $message =  '<div class="alert alert-warning"><strong>Something !</strong> Went Wrong.</div>';
        }
      
    }
    if(isset($_POST['follow'])){
        $follower = $fetch_info002['uid'];
        $guest    = (int)$_SESSION['uid'];

        if($guest == $follower){
            $message =  '<div class="alert alert-danger"><strong>Something !</strong> Went Wrong.<span id="countdown">5</span></div>
            <script>
                var timeleft = 4;
                var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    clearInterval(downloadTimer);
                    document.getElementById("countdown").innerHTML = "Finished";
                } else {
                    document.getElementById("countdown").innerHTML = timeleft + " seconds";
                }
                timeleft -= 1;
                }, 1000);
                setTimeout(function () {
                    window.location.href = window.location.href;
                }, 5000);
            </script>
            ';
        }else{
            
            //------NEED TO UPGRADE ------------

            $quer = "SELECT * FROM `usfol_tab` WHERE `uid_benef` = '$follower' AND `uid_notb` = '$guest'";
            $checkit = mysqli_query($con, $quer);
            $resulter5 = mysqli_num_rows($checkit);

            if($resulter5 > 0){
                $delete = "DELETE FROM `usfol_tab` WHERE `uid_benef` = '$follower' AND `uid_notb` = '$guest'";
                $dele_que = mysqli_query($con, $delete);

                $delete2 = "DELETE FROM `comments` WHERE `uid_u_noti`='$guest' AND `uid_benef`= '$follower'";
                $dele_que2 = mysqli_query($con, $delete2);

                $delete3 = "DELETE FROM `comments` WHERE `uid_u_noti`='$follower' AND `uid_benef`= '$guest'";
                $dele_que3 = mysqli_query($con, $delete3);

                // if(isset($dele_que)){
                //     $message =  '<div class="alert alert-danger"><strong>Important !</strong> You Just Unfollow From ('. $fetch_info00['name'].') <span id="countdown">5</span> .</div>
                //     <script>
                //         var timeleft = 4;
                //         var downloadTimer = setInterval(function(){
                //         if(timeleft <= 0){
                //             clearInterval(downloadTimer);
                //             document.getElementById("countdown").innerHTML = "Finished";
                //         } else {
                //             document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                //         }
                //         timeleft -= 1;
                //         }, 1000);
                //         setTimeout(function () {
                //             window.location.href = window.location.href;
                //         }, 5000);
                //     </script>
                //     ';
                // }
            }else{
                $time_ag = date("Y-m-d H:i:s");
                $que  = "INSERT INTO `usfol_tab`(`id`, `uid_benef`, `uid_notb`, `badge`) VALUES (
                    '',
                    '$follower',
                    '$guest',
                    '$fetch_info00[ubadge]'
                ) ";
                $exec = mysqli_query($con, $que);

                $query_upd1 = "INSERT INTO `comments`( `uid_u_noti`, `uid_benef`, `n_gen`, `comment_subject`,  `comment_text`, `comment_time`, `comment_status`) VALUES (
                    '$guest',
                    '$follower',
                    '0';
                    'Your now following ($fetch_info00[name])',
                    'Good You Will recieve all from ($fetch_info00[name])  ',
                    '$time_ag',
                    '0'
                )";
                $update_notifications1 = mysqli_query($con, $query_upd1);

                $query_upd2 = "INSERT INTO `comments`( `uid_u_noti`, `uid_benef`, `n_gen`, `comment_subject`,  `comment_text`, `comment_time`, `comment_status`) VALUES (
                    '$follower',
                    '$guest',
                    '0',
                    'New Follower ',
                    \"You buissness are growing you\'ve got a follower \",
                    '$time_ag',
                    '0'
                )";
                $update_notifications2 = mysqli_query($con, $query_upd2);


                // if(isset($exec)){
                //     $message =  '<div class="alert alert-success"><strong>Good !</strong> Your Now Following ('. $fetch_info00['name'].') <span id="countdown">5</span> .</div>
                //     <script>
                //         var timeleft = 4;
                //         var downloadTimer = setInterval(function(){
                //         if(timeleft <= 0){
                //             clearInterval(downloadTimer);
                //             document.getElementById("countdown").innerHTML = "Finished";
                //         } else {
                //             document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                //         }
                //         timeleft -= 1;
                //         }, 1000);
                //         setTimeout(function () {
                //             window.location.href = window.location.href;
                //         }, 5000);
                //     </script>';
                // }
            }

        }

    }
  
    
?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <title><?php echo $fetch_info00['name'];?> | Profile</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">


             
            <script src="js/jquery-1.11.1.min.js"></script>
            <link rel="stylesheet" href='css/btn-style.css'>
            <link rel="stylesheet" href="css/nav-style.css">


            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" media="screen and (max-width: 350px)" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            <link rel="stylesheet" media="screen and (max-width: 600px)" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  >
            <link rel="stylesheet" href="css/nav-style.css" />
            <link rel="stylesheet" href="css/nav-st.min.css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
            <script src="js/jquery_1.7.js"></script> 
            <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            
        </head>
        <body>
            <?php include 'inc/nav.php';?>
            <?php
                if(isset($message)){
                echo '<br><div class="container">'.$message.'</div>';
                }
                ?>
            <div class="container bootstrap snippet">
                    
            <div class="row">
            
                <div class="col-sm-3"><!--left col http://ssl.gstatic.com/accounts/ui/avatar_2x.png -->
                    

            <div>
                    <div class="text-center">
                        <img src="<?php echo get_img_us($uid, $con); ?>" class="avatar img-thumbnail" style="width:100%;" alt="avatar"><br>
                    </div>
                    <?php if($_SESSION['uid'] == $fetch_info002['uid']){ ?>
                        <div class="label">
                            <div class="container">
                                <button type="button" id="btn_link_profile" class="btn btn-primary btn-lg btn-block" link="upd/index.php">Update image</button>
                            </div>
                        </div>
                        <?php }?>


            </div>
            </hr>
            <br>
            <div class="text-center">
            <?php 
            if($_SESSION['uid'] != $fetch_info002['uid'] ){
                    $quer      = "SELECT * FROM `usfol_tab` WHERE `uid_benef` = '$fetch_info002[uid]' AND `uid_notb` = '$_SESSION[uid]'";
                    $checkit   = mysqli_query($con, $quer);
                    $resulter5 = mysqli_num_rows($checkit);
                    
                    if($resulter5 > 0){
                    ?>
                        <form action="@<?php echo $name;?>" method="POST" autocomplete="">
                            <button type="submit" name="follow" class="btn btn-warning btn-lg btn3d"><span class="glyphicon glyphicon-ok"></span> UnFollow</button>      
                        </form>
                    <?php 
                    }else{
                        ?>
                        <form action="@<?php echo $name;?>" method="POST" autocomplete="">
                            <button type="submit" name="follow" class="btn btn-success btn-lg btn3d"><span class="glyphicon glyphicon-ok"></span> Folllow</button>      
                        </form>
                        <?php
                    }

                }
                ?>
            </div>
                    
                    <?php
                    if($fetch_info002['ubio'] === ''){
                        if($_SESSION['uid'] == $fetch_info002['uid']){
                            echo $mseg;
                        ?>
                        <form action="@<?php echo $name;?>" method="POST" class='form-inline' autocomplete="">
                            
                            <input type="text" id="bio" placeholder="Enter You Bio ..." name="bio">
                            <div class="form-group">
                                <input class="form-control button" type="submit" name="bio_updt" value="Submit">
                            </div>
                        </form>
                        
                        <?php
                        }else{
                            echo '';
                        }
                    }else{
                        if($fetch_info002['pri_f_bio'] != 0){

                        
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Bio :</div>
                        <div class="panel-body"><?php echo $fetch_info002['ubio'];?></div>
                    </div>
                    <?php
                        }else{
                            echo '';
                        }

                    } 
                    ?>
                
                <?php 
                if($fetch_info002['pri_f_stats'] != 0){
                ?>
                <ul class="list-group">
                    <li class="list-group-item text-right" ><span class="trigger_popup_fricc pull-left count_f" id="pulls_foll"><strong>Followers</strong>:</span> <?php echo $followers;?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Following</strong>:</span> <?php echo $following;?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong>:</span> 0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong>:</span> 0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 0</li>
                </ul>
                <?php 
                }else{
                echo '';    
                }
                ?>
                <?php 
                if($fetch_info002['pri_f_socialm'] != 0){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <?php
                        if($fetch_info002['u_fb'] === ''){
                            echo '';
                        }else{
                            echo '<a href=\'http://www.facebook.com/'. $fetch_info002['u_fb'] .'\' class="btn  btn-sm btn3d"  style="width: 100%;font-size: 1em;" role="button"><i class="fa fa-facebook"></i> Facebook</a>';
                        }
                        // -------END FB -------
                        if($fetch_info002['u_insta'] === ''){
                            echo '';
                        }else{
                            echo "<a href=\"http://www.instagram.com/". $fetch_info002['u_insta'] ." \" class='btn btn-sm btn3d'  style='width: 100%;font-size: 1em;background: #f09433; background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );' role='button'><i class='fa fa-instagram'></i> Instagram</a>";
                        }
                        // -------END INSTA -------
                        if($fetch_info002['u_yt'] === ''){
                            echo '';
                        }else{
                            echo '<a href=\'http://www.youtube.com/'. $fetch_info002['u_yt'] .'\' class="btn btn-sm btn3d" style="width: 100%;font-size: 1em;" role="button"><i class="fa fa-youtube"></i> Youtube</a>';
                        }
                        //------------------------
                        if($fetch_info002['u_twitch'] === ''){
                            echo '';
                        }else{
                            echo '<a href=\'http://www.twitch.tv/'. $fetch_info002['u_twitch'] .'\' class="btn btn-sm btn3d" style="width: 100%;font-size: 1em;" role="button"><i class="fa fa-twitch"></i> Twitch</a>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                    }else{
                        echo '';
                    }
                ?>
                </div><!--/col-3-->
                    <div class="col-sm-9">


                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                        <?php  if($_SESSION['uid'] == $fetch_info002['uid']){?>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ChangeData" role="tab" aria-controls="profile" aria-selected="false">Change Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="contact" aria-selected="false">Privacy</a>
                            </li>
                        <?php }?>  
                        </ul>

                            <div class="tab-content">

                            <div class="tab-pane active" id="home">
                                <hr>
                                <ul class="list-group">
                                    <?php if($fetch_info002['pri_f_name'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>First Name :</strong></span><?php    echo $fetch_info002['ufirstname'];?></li>
                                    <?php }else{ 
                                    echo '';
                                    }?>
                                    <?php if($fetch_info002['pri_f_lastn'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>Last Name :</strong></span> <?php    echo $fetch_info002['ulastname'];?></li>
                                        <?php }else{ echo '';}?>
                                    <?php if($fetch_info002['pri_f_phone'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>Phone Number :</strong></span> <?php echo $fetch_info002['uphone'];?></li>
                                        <?php }else{ echo '';}?>
                                    <?php if($fetch_info002['pri_f_gen'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>Gender :</strong></span> <?php       echo $fetch_info002['ugender'];?></li>
                                        <?php }else{ echo '';}?>
                                    <?php if($fetch_info002['pri_f_email'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>E-mail :</strong></span> <?php       echo $fetch_info00['email'];?></li>
                                        <?php }else{ echo '';}?>
                                    <?php if($fetch_info002['pri_f_birth'] != 0){?>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong>BirthDay :</strong></span> <?php     echo $fetch_info002['birth_us'];?></li>
                                        <?php }else{ echo '';}?>
                                    <?php if($fetch_info002['pri_f_grade'] != 0){?>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong>Grade :</strong></span>  
                                    <?php if($fetch_info00['ubadge'] === 1){
                                                            echo 'Partner';
                                                        }else{
                                                            echo 'Member';
                                                        }
                                                    ?></li><?php }else{ echo '';}?>
                                    
                                </ul>
                                
                                <hr>
                            </div><!--/tab-pane-->
                        <?php if($_SESSION['uid'] == $fetch_info002['uid']){ ?>
                            <div class="tab-pane" id="ChangeData">
                                <form class="form" action="##" method="post" id="registrationForm">
                                    <div class="form-group">
                                            <label for="first_name"><h4>First name</h4></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                        
                                    </div>
                                    <div class="form-group">
                                            <label for="last_name"><h4>Last name</h4></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                    </div>
                        
                                    <div class="form-group">
                                            <label for="phone"><h4>Phone</h4></label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                    <div class="form-group">
                            
                                            <label for="mobile"><h4>Mobile</h4></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                        
                                            <label for="email"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                        
                                            <label for="email"><h4>Location</h4></label>
                                            <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                        
                                    </div>
                                    <div class="form-group">
                                            <label for="password"><h4>Password</h4></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                    </div>
                                    <div class="form-group">
                                            <label for="password2"><h4>Verify</h4></label>
                                            <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                    </div>
                                    <div class="form-group">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </form>
                            
                            </div><!--/tab-pane-->
                    
                            <div class="tab-pane" id="settings">
                                    
                                
                        
            <hr>
                                <form action="@<?php echo $name;?>" class='form-inline' method="POST">
                                
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch1" name="firstname" <?php if($fetch_info002['pri_f_name'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch1">Public (First Name)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch2" name="lastname" <?php if($fetch_info002['pri_f_lastn'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch2">Public (Last Name)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch3" name="gender" <?php if($fetch_info002['pri_f_gen'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch3">Public (Gender)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch4" name="phone" <?php if($fetch_info002['pri_f_phone'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch4">Public (Phone Number)</label >
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch5" name="email" <?php if($fetch_info002['pri_f_email'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch5">Public (E-Mail)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch6" name="img" <?php if($fetch_info002['pri_f_img'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch6">Public ( Profile Image )</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch7" name="stats" <?php if($fetch_info002['pri_f_stats'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch7">Public (Stats)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch8" name="birthday" <?php if($fetch_info002['pri_f_birth'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch8">Public (Birthday)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch9" name="grade" <?php if($fetch_info002['pri_f_grade'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch9">Public (Grade)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch10" name="socialm" <?php if($fetch_info002['pri_f_socialm'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch10">Public (Social Media)</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch11" name="bio_n" <?php if($fetch_info002['pri_f_bio'] != 1){ echo ''; }else{ echo 'checked';}?>>
                                            <label class="custom-control-label" for="switch11">Public (Bio)</label>
                                    </div>
                                    
                                
                                

                                    <button type="submit" name="privacy_updt">Change Privacy</button>

                                    <!-- END -->
                                </form>
                                <br>
                            </div>
                        <?php }?>    







                        
                            </div><!--/tab-pane-->
                        </div><!--/tab-content-->






                    </div><!--/col-9-->
            </div><!--/row-->
                <br><br><br>








                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="text-center">
                            © COPYRIGHT 2020 - Tous Droits Réservés / All Rights Reserved
                            </div>
                        </div>
                    </div>
                </footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            
                <script>
                    $(document).ready(function(){

                        $("#btn_link_profile").click(function(){
                         window.open($(this).attr('link')) ;
                        });
                                       
                        });

                </script>
            <?php include 'inc/scripts.php';?>

        </body></html> <!-- ///////////////////////////////////////////////////////////////// -->
        <?php
}else{
    header('location: user-otp.php');
}

//----------------------end rewrite url -------------------------RewriteRule ^u/([^\s]+)?$ profile.php?u=$1

if(isset($_GET['delete'])){
    echo delete_notification_u($_GET['delete'], $fetch_info['uid'], $con);
}else{
    // ss
}

?>