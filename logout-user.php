<?php
session_start();
session_unset();
session_destroy();
if(isset($_GET['em'])){
    $cem       = $_GET['em'];
    $email     = mysqli_real_escape_string($con, $cem);
    header('location: Login?em='.$email.'&lg=fr');
}else{
    header('location: Login');
}
?>