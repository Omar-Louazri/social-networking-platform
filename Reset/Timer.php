<?php
require_once "../controllerUserData.php";
if(isset($_SESSION['uid'])){

       //check if timer is done
       $run_query  = mysqli_query($con, "SELECT `post_timer`,`uid` FROM usertable WHERE `uid` = '$_SESSION[uid]'");
       $fetch_info = mysqli_fetch_assoc($run_query);


       $myvar      = strtotime("$fetch_info[post_timer]");

        $now   = (int)microtime(true);
        $myvar = (int)$myvar;


        echo $now.'<br>'.$myvar;
        echo "<br>";

        if($now < $myvar){


                echo "Wait Until The Timer Is Done";
        }else{
            

            $set_timer = mysqli_query($con, "UPDATE `usertable` SET `post_timer`='0' WHERE `uid`='$_SESSION[uid]'");
            if(isset($set_timer)){
                $_SESSION['message_reg'] = "Timer Reset Successfuly";
                $_SESSION['icon']        = "success";
                header('location: ../home');

            }else{
                $_SESSION['message_reg'] = "Something Went Wrong";
                $_SESSION['icon']        = "error";
                $_SESSION['link']        = "549401";
                header('location: ../home?p=343542');
            } 
        }
        // echo $myvar;

  
        
    
}else{
    header('location: ../Login?em='.$email.'&lg=en');
}


?>