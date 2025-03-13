<?php 
require_once "controllerUserData.php";

    $email = mysqli_real_escape_string($con, $_SESSION['email']);
    if($email == false){
        header('Location: Login');  
    }
    if($_SESSION['status'] != 'verified'){
        header('Location: Login');
    }

    if(isset($_GET['p'])){

        if(empty($_GET['p'])){
            $_SESSION['message_reg'] = "Empty Hash";
            $_SESSION['icon']        = "error";
            $_SESSION['link']        = "3545354";
            header("Location: home");
        }else{
            $unsafe_hash = mysqli_real_escape_string($con, $_GET['p']);
        }

    }else{
        header("Location: home?p=43879");
    }

    $hash_lenght   = strlen($unsafe_hash);
    if($hash_lenght != 11){

        $_SESSION['message_reg'] = "Invalid hash length";
        $_SESSION['icon']        = "error";
        $_SESSION['link']        = "544356";
        header("Location: home");
    }
    if(CheckData($unsafe_hash, "")){
        $_SESSION['message_reg'] = "Invalid hash";
        $_SESSION['icon']        = "error";
        $_SESSION['link']        = "480954";
        header("Location: home");

    }
    $safe_hash = mysqli_real_escape_string($con, $unsafe_hash);
    $fetch_if_post_exist = "SELECT `pst_hash` , `uid_author` FROM `whole_posts_users` WHERE `pst_hash` = '$safe_hash' AND `p_privacy` = 1";
    $ruquery             = mysqli_query($con, $fetch_if_post_exist);
    $fetch_author        = mysqli_fetch_assoc($ruquery);
    if(mysqli_num_rows($ruquery)  != 1){
        $_SESSION['message_reg'] = "Post Not Found / Maybe Set to private or Deleted";
        $_SESSION['icon']        = "error";
        $_SESSION['link']        = "234334";
        header("Location: home");
        //  HERE IS IF NO POST FOUND IN THE QUERY
    }

    $fetch_data = "SELECT * FROM usertable WHERE email = '$email'";
    $run_query  = mysqli_query($con, $fetch_data);
    $fetch_info = mysqli_fetch_assoc($run_query);

    $fetch_post_from_db = "SELECT * FROM `whole_posts_users` INNER JOIN `usertable` ON whole_posts_users.uid_author = usertable.uid WHERE `pst_hash` = '$safe_hash' AND `uid_author` = '$fetch_author[uid_author]'";
    $run_it             = mysqli_query($con, $fetch_post_from_db);
  
    $img_aut = get_img_us($fetch_author['uid_author'], $con);
    if(mysqli_num_rows($run_it)  != 1){
        $_SESSION['message_reg'] = "Post Deleted Or Set to Private ";
        $_SESSION['icon']        = "error";
        $_SESSION['link']        = "342344";
        header("Location: home");
        
        //  HERE IS IF NO POST FOUND IN THE QUERY
    }

    $get_info           = mysqli_fetch_assoc($run_it);
?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo ucwords($get_info['name']);?> | 
        <?php 
        if( convert_post_to_clickable_profile($get_info['p_description']) == '#'){
            echo 'Hope you enjoy It';
        }else{
             $title =       strip_tags( substr(convert_post_to_clickable_profile($get_info['p_description']) ,0,55));
             if($title == ''){
                 $title = 'Hope you enjoy It';
             }
            echo $title ;
        }
        ?>
        </title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" media="screen and (max-width: 350px)" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            <link rel="stylesheet" media="screen and (max-width: 600px)" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  >
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
            <script src="js/jquery_1.7.js"></script> 
            <link rel="stylesheet" href="css/nav-st.min.css">
            <link rel="stylesheet" href="css/nav-style.css" />
            <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

            <!-- <style>
                <?php //include_once 'css/nav-style.css';?>
               
            </style> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        </head>
<body>

<?php include_once 'inc/nav.php'; ?>


<!-- -->
    <div class="container">
        <div class="col-md-12 gedf-main View">
            <!--- \\\\\\\Post-->
 

            
            <?php

                  echo  get_gen_of_psts($get_info['p_gender'] ,$safe_hash);

            ?>



            <!-- Post /////-->
            <br><br>
        </div>
    </div>

<!-- -->


            

                <?php  include_once 'inc/scripts.php'; ?>
               
</body>
</html>