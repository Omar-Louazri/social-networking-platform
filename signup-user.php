<?php require_once "controllerUserData.php"; 

if(isset($_SESSION['status'])){
    header('location: user-otp.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Signup Form | New User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery_1.7.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        .error_msg_inputs{
            font-size:16px;
            background-color:#fff;
            color:red;
            width:100%;
            border-radius:7px;
        }
        .grid{
            display: grid;
            grid-template-columns: 10% 1fr 10%;
        }
        #arr{
            display: block;
            text-align: center;
            font-size: 17px;
            line-height: 36px;
            background: #6665ee;
            border-radius: 10px 0px 0px 10px;
            color: white;
            border: 1px solid #292b2d57;
        }
        #name{
            border-right: 0px;
            border-left: 0px;
            border-radius: 0px;
            box-shadow: none;
        }
        #num{
            display: block;
            text-align: center;
            font-size: 17px;
            line-height: 36px;
            background: #6665ee;
            border-radius: 0px 10px 10px 0px;
            color: white;
            border: 1px solid #292b2d57;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 center m-auto form">
                <form action="Signup" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                <p class="text-center">It's quick and easy.</p>
                <div id="msgbox"></div>
    <?php
                            if(count($errors) == 1){
        ?>
                                <div class="alert alert-danger text-center">
        <?php
                                    foreach($errors as $showerror){
                                        echo $showerror;
                                    }
        ?>
                                </div>
        <?php
                            }elseif(count($errors) > 1){
        ?>
                                <div class="alert alert-danger">
        <?php
                                    foreach($errors as $showerror){
        ?>
                            <li><?php echo $showerror; ?></li>
        <?php
                                    }
        ?>
                                </div>
        <?php
                    }
    ?>
                    <?php echo $msg;
                          
                    ?>
                    <div class="form-group grid">
                        <span id="arr">@</span>
                        <input class="form-control" id="name" type="text" onkeyup="lenght_conter();" name="name" value="<?php if( $name == ''){ echo ''; }else{ echo htmlentities($name); }; ?>" placeholder="Username" required>
                        <span id="num">8</span>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" value="<?php if( $email == ''){ echo ''; }else{ echo htmlentities($email); }; ?>" placeholder="E-mail Address" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="pass" type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="cpass" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group" id="result" style="display:none;text-align:center;">
                        <img src="public/loadings/Spinner-1.7s-271px.gif" alt="Loading..." style="width:80px;margin:auto;">
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" id="sub" name="signup" value="Signup">
                    </div>
    <!-- Somehow I got an error, so I comment this div, just uncomment to use or show -->
            <div class="link login-link text-center">
                Already a member? <a href="Login">Login here</a></div>
            </form>
        </div>
    </div>
</div>
<script>
    
    
    function lenght_conter() { 
        var iname = document.getElementById("name");
        var cont      = document.getElementById("num");
        const minlenght = 8;
        if(minlenght - iname.value.length <= 0){
            $.ajax({
                url: './get/check_users.php',
                type: 'POST',
                method: 'POST',
                dataType: 'text',
                cache:false,
                data: {
                    post: 1,
                    value: iname.value
                },
                beforeSend: function (){
                    cont.innerHTML = '<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve"> <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"> <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" /> </path> </svg>';
                },success: function(response) {
                    if (response == "taken"){
                        cont.innerHTML = '<i class="fa fa-times-circle"></i>';    
                    }else{
                      cont.innerHTML = '<i class="fa fa-check-square"></i>';  
                    }
                    
                }
            });
            // cont.innerHTML = '<i class="fa fa-check-square"></i>';
        }else{
            cont.innerText = minlenght - iname.value.length;
        }
        
        
     }

</script>
<script src="js/main.js" type="text/javascript" charset="UTF-8"></script>
</body>
</html>
