<?php 
require_once "controllerUserData.php";

$email = mysqli_real_escape_string($con, $_SESSION['email']);

if($_SESSION['status'] == 'verified'){

    check_sess("Login");
    $fetch_data = "SELECT * FROM usertable WHERE email = '$email'";
    $run_query = mysqli_query($con, $fetch_data);
    if(mysqli_num_rows($run_query) < 1){
        header("Location: Login");
    }
    $fetch_info = mysqli_fetch_assoc($run_query);
    
?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $fetch_info['name'] ?> | Home</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- <link rel="stylesheet" media="screen and (max-width: 600px)" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  > -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!--  --->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"  />
            <!--  --->
            <style>
                <?php 
                include_once 'css/nav-style.css'; 
                include_once('css/montiony.css');
                ?>
            </style>
            <!-- <link rel="stylesheet" href="css/nav-style.css" /> -->
            <link rel="stylesheet" href="css/nav-st.min.css">
            <!-- <link rel="stylesheet" href="css/montiony.css"> -->
            
            <!-- JS Files -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- <script src="js/jquey_1.9.js"></script> -->
            <!-- <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script> -->
            



<!--  -->

        </head>
 <body>
     <!-- <br><br><br><br> -->
        <?php include_once 'inc/nav.php'; ?>
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                    <div class="col-md-9 gedf-main">
                            <?php 
                            define('load_new', "somedata_here3425");
                            include_once 'inc/post_something.php';
                            ?>
                    </div>
                    <!--  Looop here for users-->
                    <div class="col-md-3 gedf-main">
                      <a href="http://google.com" id="btn-xm"> Ads: 
                       <i class="fa fa-image"></i>
                         <!--   Go to Google -->
                            
                            </a>
                    </div>
            </div>
         </div>
        <!-- --->


        <!-- HERES THE POSTS START -->
   

        <div class="container-fluid gedf-wrapper">
            <div class="row justify-content-center d-flex"><?php echo $msg;?>
                <div class="col-md-8 gedf-main ">
                    <br><br>
                    <div class="container">
                        <div class="results">
                        </div>
                    </div>
                    
                    <div class="loader_posts text-center" style="display:none;">
                            <img src="public/loadings/loader.gif"> Loading more posts...
                    </div>
     
</div>
</div>
</div>

<section id="tab-down">
        <div class="conatainer slide-b-container" >
            <div class="header mb-3">
                <div class="container grid-slide">
                    <div class="left-arrow"><i class="fa fa-arrow-left"></i></div>
                    <div class="text-center slide-down-icon">
                        <i id="slide-to-down" class=" fa fa-sort-down wide-down"></i>
                    </div>
                    <div class="exit-icon"><i class="fa fa-times"></i></div>
                </div>
            </div>
            <i class="fa fa-angle-left"></i>
            
                 something
            
            
        </div>
    </section>        
<section class="pt-4">
  <div class="container">
    <div class="row">
        <div class="col-6">
            <h3 class="mb-3">Suggested For You</h3>
        </div>
        <div class="col-6 text-right">
            <img id="swipe-left" src="https://media.giphy.com/media/YSwimyADq6MYzpmpDR/giphy.gif" alt="swipe left" style="width: 120px;">
            
        </div>
        
    </div>
</div>


</section>
  



  <?php 
  include_once 'inc/scripts.php';
  include_once 'inc/data_sr.php';
  include_once 'inc/mentiony.php';


  if(isset($_GET['delete'])){
        echo delete_notification_u($_GET['delete'], $fetch_info['uid'], $con);
    }

   

   if(isset($_SESSION['message_reg']) && isset($_SESSION['icon']) && $_SESSION['message_reg'] != '' && $_SESSION['icon'] != '')
    {
?>
        <script>
            Swal.fire({

                icon: '<?php echo $_SESSION['icon']; ?>',
                title: '<?php echo $_SESSION['message_reg']; ?>',
                <?php 
                    if($_SESSION['icon'] == 'success'){  
                        echo '';
                    }else{ 
                        if(isset( $_SESSION['link'])) {
                ?>
                    footer: '<a href="support?p=<?php echo $_SESSION['link'];?>">Why do I have this issue?</a>'
                <?php 
                         }
                    } 
                ?>
            })
                
        </script>
<?php
unset($_SESSION['message_reg']);
unset($_SESSION['icon']);
unset($_SESSION['link']);

    }
  ?>
<div class="overflow-hidden">
    <div class="slider-container" id="tab_f">

  

            
  <!-- End -->
</body>
</html>



<?php
}else{
    header('location: user-otp.php');
}




?>