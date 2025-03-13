<?php
require_once "controllerUserData.php";
if(!isset($_GET['g'])){
    header("Location: error_page.php?g=Undefined");
}
$unsafe_g = htmlspecialchars($_GET['g']);
$gen_problm = mysqli_real_escape_string($con, $unsafe_g);
if($gen_problm == 'profile'){
    //do nothing
    if(!isset($_GET['p'])){
        header("Location: error_page.php?g=profile&p=Undefined_Profile");
    }else{
        
        $profiless = htmlspecialchars($_GET['p']);
        $profile   = mysqli_real_escape_string($con, $profiless);

    }

}elseif($gen_problm == 'Undefined'){
    //do nothing
}elseif($gen_problm == 'Error404' ){
    //do nothing
}else{
    header("Location: error_page.php?g=Undefined&p=Undefined_Index");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/errorpage.css">
        <title>
            Undefined <?php echo $gen_problm;?>
        </title>
</head>
<body>
<div class="box">
  <div class="box__ghost">
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    
    <div class="box__ghost-container">
      <div class="box__ghost-eyes">
        <div class="box__eye-left"></div>
        <div class="box__eye-right"></div>
      </div>
      <div class="box__ghost-bottom">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <div class="box__ghost-shadow"></div>
  </div>
  
  <div class="box__description">
    <div class="box__description-container">
      <div class="box__description-title">Whoops! (<?php echo $profile;?>)</div>
      <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
    </div>
    
    <a href="home" target="_blank" class="box__button">Go back</a>
    
  </div>
  
</div>
</body>
</html>