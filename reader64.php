<?php
include './controllerUserData.php';

if($_GET['hash_p!'] !== '' && isset($_GET['hash_p!'])){

    $safehash = mysqli_real_escape_string($con, htmlspecialchars( strip_tags( trim($_GET['hash_p!']) ) , ENT_QUOTES, 'UTF-8')) ;
    //starting fetch from db
    $nquery_img = "SELECT `u_img`,`img_hash` FROM `bycrypt` WHERE `img_hash` = '$safehash'";
    $upd = mysqli_query($con, $nquery_img);
    if(mysqli_num_rows($upd) > 0 ){

        $row = mysqli_fetch_assoc($upd);

        // echo $row['u_img'];

        $image = file_get_contents('http://sub.localhost.form/'.$row['u_img']);
        header('Content-type: image/jpg');
        echo trim($image);
        die;
    }else{
        echo "URL signature expired ";
        exit();
    }

}else{
    exit();
}

?>