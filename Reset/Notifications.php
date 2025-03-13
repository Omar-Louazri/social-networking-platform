<?php
require_once "../controllerUserData.php";
if(isset($_SESSION['uid'])){

    if(isset($_GET['t'])){

        if(!empty($_GET['t'])){
            $t = (int)$_GET['t'];
            if($t === 1){

                    if(isset($_POST['delt'])){
                        $query_dele = "DELETE FROM `comments` WHERE `uid_u_noti` = '$_SESSION[uid]'";
                        $qrc        = mysqli_query($con, $query_dele);

                        if(isset($qrc)){
                            $_SESSION['message_reg'] = "Notifications Deleted Successfuly";
                            $_SESSION['icon']        = "success";
                            header('location: ../home');

                        }else{
                            $_SESSION['message_reg'] = "Something Went Wrong";
                            $_SESSION['icon']        = "error";
                            $_SESSION['link']        = "543435";
                            header('location: ../home');
                        }
                                    
                    }else{
                        $_SESSION['message_reg'] = "Method Not Valid";
                        $_SESSION['icon']        = "error";
                        $_SESSION['link']        = "235433";
                        header('location: ../home');
                    }

            }elseif($t === 2){

                if(isset($_POST['delt'])){
                    $query_dele = "DELETE FROM `comments` WHERE `uid_u_noti` = '$_SESSION[uid]'";
                    $qrc        = mysqli_query($con, $query_dele);

                    if(isset($qrc)){
                         header('location: ../watch.php');
                    }else{
                        header('location: ../home?p=324899');
                    }
                                
                }else{
                    header('location: ../home?p=324812');
                }


            }else{
                header('location: ../home');
            }
        }else{
            header('location: ../home');
        }
    }else{
        header('location: ../home');
    }
}else{
    header('location: ../Login?em='.$email.'&lg='.$lg.' ');
}


?>