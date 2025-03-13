<?php 

// session_set_cookie_params(["SameSite" => "Strict"]); //none, lax, strict
// session_set_cookie_params(["Secure" => "true"]); //false, true
// session_set_cookie_params(["HttpOnly" => "true"]); //false, true
session_start();



// header('Set-Cookie: PHPSESSID= ' . session_id() . '; SameSite=None; Secure');
require "connection.php";
    date_default_timezone_set("Africa/Casablanca");
// FUNCTIONS HERE IMPOTANT TO KNOW ABOUT IT
     //time_ago('');  2020-10-11 04:58:00
function time_ago($timestamp)  {  
      $time_ago     = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds      = $time_difference;  
      $minutes      = round($seconds / 60 );         // value 60 is seconds  
      $hours        = round($seconds / 3600);        // value 3600 is 60 minutes * 60 sec  
      $days         = round($seconds / 86400);       // 86400 = 24 * 60 * 60;  
      $weeks        = round($seconds / 604800);      // 7*24*60*60;  
      $months       = round($seconds / 2629440);     // ((365+365+365+365+366)/5/12)*24*60*60  
      $years        = round($seconds / 31553280);    // (365+365+365+365+366)/5 * 24 * 60 * 60  
        if($seconds <= 60){  
            return "Just Now";  
        }else if($minutes <=60){
            if($minutes==1){  
                return "One minute ago";  
            }else{  
                return "$minutes Minutes ago";  
            }  
        }else if($hours <=24)  {  
            if($hours==1) {  
                return "An hour ago";  
            }else{  
                return "$hours hrs ago";  
            }  
        }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "Yesterday";  
     }  
           else  
           {  
       return "$days Days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "A week ago";  
     }  
           else  
           {  
       return "$weeks Weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "A month ago";  
     }  
           else  
           {  
       return "$months Months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "One year ago";  
     }  
           else  
           {  
       return "$years Years ago";  
     }  
   }  
}  
function CheckData($name_invalid, $inva){

        

    if(preg_match("/</", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva.'</p>';
    }elseif(preg_match("/>/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva.'</p>';
    }elseif(preg_match("/:/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( : ) '.$inva.'</p>';
    }elseif(preg_match("/,/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( , ) '.$inva.'</p>';
    }elseif(preg_match("/-/", $name_invalid)){       
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( - ) '.$inva.'</p>';
    }elseif(preg_match("/`/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva.'</p>';
    }elseif(preg_match("/\(/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva.'</p>';
    }elseif(preg_match("/\)/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva.'</p>';
    }elseif(preg_match("/&/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( & ) '.$inva.'</p>';
    }elseif(preg_match("/'/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva.'</p>';
    }elseif(preg_match("/\"/", $name_invalid)){ 
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva.'</p>';
    }elseif(preg_match("/#/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( # ) '.$inva.'</p>';
    }elseif(preg_match("/\//", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( / ) '.$inva.'</p>';
    }elseif(preg_match("/=/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( = ) '.$inva.'</p>';
    }elseif(preg_match("/\*/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva.'</p>';
    }elseif(preg_match("/!/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ! ) '.$inva.'</p>';
    }else{

    }
}
function CheckData_ofurls($name_invalid, $inva){

        

   if(preg_match("/</", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva.'</p>';
    }elseif(preg_match("/>/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva.'</p>';
    }elseif(preg_match("/`/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva.'</p>';
    }elseif(preg_match("/\(/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva.'</p>';
    }elseif(preg_match("/\)/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva.'</p>';
    }elseif(preg_match("/'/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva.'</p>';
    }elseif(preg_match("/\"/", $name_invalid)){ 
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva.'</p>';
    }elseif(preg_match("/\*/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva.'</p>';
    }else{

    }
}
function grs($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function _make_url_clickable_cb($matches) {
    $ret = '';
    $url = $matches[2];

    if ( empty($url) )
        return $matches[0];
    // removed trailing [.,;:] from URL
    if ( in_array(substr($url, -1), array('.', ',', ';', ':')) === true ) {
        $ret = substr($url, -1);
        $url = substr($url, 0, strlen($url)-1);
    }
    return $matches[1] . "<a href=\"$url\" rel=\"nofollow\" target=\"_blank\">$url</a>" . $ret;
}
function _make_web_ftp_clickable_cb($matches) {
    $ret = '';
    $dest = $matches[2];
    $dest = 'http://' . $dest;

    if ( empty($dest) )
        return $matches[0];
    // removed trailing [,;:] from URL
    if ( in_array(substr($dest, -1), array('.', ',', ';', ':')) === true ) {
        $ret = substr($dest, -1);
        $dest = substr($dest, 0, strlen($dest)-1);
    }
    return $matches[1] . "<a href=\"$dest\" rel=\"nofollow\" target=\"_blank\">$dest</a>" . $ret;
}
function _make_email_clickable_cb($matches) {
    $email = $matches[2] . '@' . $matches[3];
    return $matches[1] . "<a href=\"mailto:$email\" target=\"_blank\">$email</a>";
}
function make_clickable($ret) {
    $ret = ' ' . $ret;

    // in testing, using arrays here was found to be faster
    $ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_url_clickable_cb', $ret);
    $ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_web_ftp_clickable_cb', $ret);
    $ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', '_make_email_clickable_cb', $ret);

    // this one is not in an array because we need it to run last, for cleanup of accidental links within links
    $ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
    $ret = trim($ret);

    

    return $ret;
}

function insert_noti($uid_s, $subject, $comment, $ge, $con){
            $uid     = (int)$uid_s;
            $subject = mysqli_real_escape_string($con, $subject);
            $comment = ucwords(mysqli_real_escape_string($con, $comment));
            $time_ag = date("Y-m-d H:i:s");
            $n_gen   = (int)$ge;
            
            $query_sele = "SELECT * FROM `usfol_tab` WHERE `uid_benef`='$uid' ORDER BY `id` ASC ";
            $resulst = mysqli_query($con, $query_sele);
            
            // echo $dateA;
            if(mysqli_num_rows($resulst) > 0){

                // $x = 0;
                // while($row = mysqli_fetch_array($resulst)){

                //         $row_id = $row["uid_notb"];

                //         $query_upd = "INSERT INTO `comments`( `uid_u_noti`, `uid_benef`, `n_gen` , `comment_subject`, `comment_text`, `comment_time`, `comment_status`) VALUES (
                //             '$row_id',
                //             '$uid',
                //             '$n_gen',
                //             '$subject',
                //             '$comment',
                //             '$time_ag',
                //             '0'
                //             )
                            
                //             ";
                        
                $data_f = '';
        $x = 1;
          //start
          while($row = mysqli_fetch_array($resulst, MYSQLI_ASSOC)){
            
            $row_id = $row["uid_notb"];

            $data_f .= " (
                '$row_id',
                '$uid',
                '$n_gen',
                '$subject',
                '$comment',
                '$time_ag',
                '0'
            ),";

            
        
            $x++;
            }

            $query_not = substr($data_f, 0, -1);
      
                

                    $query_upd = "INSERT INTO `comments`( `uid_u_noti`, `uid_benef`, `n_gen` , `comment_subject`, `comment_text`, `comment_time`, `comment_status`)
                                 VALUES $query_not
                                ";
                        $update_notifications = mysqli_query($con, $query_upd);

                        

                // }
            }else{
                return 'no follower found';
            }
            if(isset($update_notifications)){
                 return '<div class="alert alert-success text-center"><strong>Exellent !!</strong></div>';
            }else{
                return '<div class="alert alert-danger text-center"><strong>Something Went Wrong !!</strong></div>';
            }
}
function get_img_us($uid_auth, $con){
    $select_img_author  = "SELECT `uid`, `u_img`,`img_hash`,`pri_f_img` FROM `bycrypt` WHERE `uid` = '$uid_auth' AND `pri_f_img` = 1";

    $r_q                = mysqli_query($con, $select_img_author);
    if(mysqli_num_rows($r_q) > 0){
      $assoc              = mysqli_fetch_assoc($r_q);
      if(empty($assoc['u_img'])){
        return              "public/img_/no_avatar.png";
      }else{
        return              "user_img/".$assoc['img_hash'];
      }
    }else{
        return              "public/img_/no_avatar.png";
    }
}
function convert_post_to_clickable_profile($string){
    
    $pattern = '/&#160;/i';
    $string =  preg_replace($pattern, ' ', $string);
    // $string = "hello @a";
    $arrowba = "@";
    $arr = explode(' ', $string);
    $cont = count($arr);
    $i = 0;
        while($i < $cont){
            if(substr($arr[$i], 0, 1) == $arrowba){
                $arr[$i] = "<a href=\"".$arr[$i]."\" class=\"tag_friend\">".$arr[$i]."</a>";
            }
            $i++;
        }
    $string = implode(" ", $arr);

  

    return  $string;
    
    
}
function delete_notification_u($delete_id_noti, $fetch_info ,$con) {

            //DELETE NOTIFICATION BELL 
            if(!empty($delete_id_noti)){
                
                $id_noti    = (int)$delete_id_noti;
                $fetch_info = (int)$fetch_info;
                $select_id_noti = mysqli_query($con, "SELECT * FROM `comments` WHERE `uid_u_noti`='$fetch_info' AND `comment_id` = '$id_noti'");
                if(mysqli_num_rows($select_id_noti) > 0 ){
                    $sql_delete = mysqli_query($con, "DELETE FROM `comments` WHERE `comments`.`comment_id` = '$id_noti'  AND `uid_u_noti`='$fetch_info'");

                                    if(isset($sql_delete)){
                                        //goood
                                    
                                        
                                        return  '
                                        <script>
                                        
                                        setTimeout(function(){
                                            Toast.show("Notification Deleted Successfully ", "success");
                                        }, 1000);
                                        
                                        </script>';
                                        
                                    }else{
                                        //went wrong

                                        return '
                                        <script>
                                        
                                            setTimeout(function(){ 
                                        Toast.show("ERORR 404 | Something Went Wrong", "error");  
                                        }, 1000);
                                        
                                        </script>';
                                 
                                        
                                    }
                    }else{
                        //ERORR 404

                        return    '
                        <script>
                        $(document).ready(function() { 
                            setTimeout(function(){ 
                                Toast.show("ERORR 404 | Notifications Isuses", "error");  
                            }, 1000);
                        });
                        </script>';
                
                        
                    }
            }else{
                    return   '
                    <script>
                    $(document).ready(function() { 

                    setTimeout(function(){ 
                            Toast.show("ERORR 404 | Empty", "error");
                    }, 1000);
                    });
                    </script>';
               

                }
                
}
function create_timer_post($hours = 2){
    $x = (int)$hours;
    $new_time     = date("M d,Y H:i:s", strtotime('+'.$x.' hours'));

    // $time_per_sec = (int)$hours * 3600; // exp : 2 hours (*3600) --> 7200

    return  $new_time; 

}
function set_timer($new_time, $uid, $con){

        $set_timer = mysqli_query($con, "UPDATE `usertable` SET `post_timer`='$new_time' WHERE `uid`='$uid'");
        if(isset($set_timer)){
            return '<script>setTimeout(function () {
                Toast.show("Posted Successfully Uploaded", "success");
            }, 1200);</script>';
        }else{
            return '<script>setTimeout(function () {
                Toast.show("Posted Not Uploaded", "failed");
            }, 12000);</script>';
        }
}
function check_sess($path){

    if(!empty( 
        ($_SESSION['email'])&&
        ($_SESSION['uid'])&&
        ( $_SESSION['status']) ) ){
        return '';
    }else{
        return header("Location: $path");
    }
}
function get_tags_fetch($string){
  

    $pieces  = explode(",", $string);
    $cont    = count($pieces);
    $strings = '';
    $i=0;
    while($i<$cont){
        $strings .= '<span class="badge badge-primary">'.$pieces[$i].'</span>&nbsp;';
        $i++;
    }
    return $strings;

}
function get_gen_of_psts($gen, $hash){
    $con = mysqli_connect('localhost', 'root', '', 'userform');
    // $p = "SELECT *
    // FROM `whole_posts_users` 
    // INNER JOIN usertable ON = usertable.uid = whole_posts_users.uid_author
    // WHERE whole_posts_users.`pst_hash` = 'h2OGG134dmQ' 
    // ";
    $fetch_post_from_db = "SELECT * FROM usertable INNER JOIN whole_posts_users ON usertable.uid = whole_posts_users.uid_author WHERE whole_posts_users.pst_hash = '$hash';";
    $run_it             = mysqli_query($con, $fetch_post_from_db);
    $get_info           = mysqli_fetch_assoc($run_it);
    $img_aut            = get_img_us($get_info['uid'] , $con);
    $num_str            = bin2hex(random_bytes(10));
        if($get_info['ubadge'] == 0){
            $ub = 'Member';
        }else{
            $ub = 'Support Team';
        }
        if( convert_post_to_clickable_profile($get_info['p_description']) == '#'){
            $des = '';
        }else{
            $des = '<p class="card-text">'.convert_post_to_clickable_profile($get_info['p_description']).'</p>';
        }

    if($gen == 1)
    {
        $v = '
         <div class="card gedf-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="@'.$get_info['name'].'">
                    <div class="mr-2">
                    <img class="rounded-circle" width="45" height="45px" src="'.$img_aut.'" alt="">
                    </div>
                </a>
                    <div class="ml-2">
                            <div class="h5 m-0"><a href="@'.$get_info['name'].'" class="name_user_post">@'.$get_info['name'].'</a></div>
                                <div class="h7 text-muted">
                                    '.$ub.'
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Hide</a>
                                        <a class="dropdown-item report_post" href="report.php?p='. $hash.'">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="card-body">
                                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>'.time_ago($get_info['date_p']).'</div>
                                <p class="card-text">
                                '.convert_post_to_clickable_profile($get_info['p_description']).'
                                </p>

                                <div>
                                '. get_tags_fetch($get_info['pst_tags']).'
                                </div>

                            
                        </div>
                    <div class="card-footer">
                       <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                       <a class="card-link btn_show_comments" data-id="'.$num_str.'"><i class="fa fa-comment"></i> Comment</a>
                       <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                   </div>

   
                </div>
        ';
        return $v;
    }
    elseif($gen == 2)
    {
        $v = '
        <div class="card gedf-card">
           <div class="card-header">
               <div class="d-flex justify-content-between align-items-center">
                   <div class="d-flex justify-content-between align-items-center">
                   <a href="@'.$get_info['name'].'">
                   <div class="mr-2">
                   <img class="rounded-circle" width="45" height="45px" src="'.$img_aut.'" alt="">
                   </div>
               </a>
                   <div class="ml-2">
                       <div class="h5 m-0"><a href="@'.$get_info['name'].'" class="name_user_post">@'.$get_info['name'].'</a></div>
                       <div class="h7 text-muted">
                       '.$ub.'
                       </div>
                               </div>
                           </div><!--  -->
                           <div>
                               <div class="dropdown">
                                   <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-ellipsis-h"></i>
                                   </button>
                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                       <div class="h6 dropdown-header">Configuration</div>
                                       <a class="dropdown-item" href="#">Save</a>
                                       <a class="dropdown-item" href="#">Hide</a>
                                       <a class="dropdown-item report_post" href="report.php?p='. $hash.'">Report</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
   
                       </div>
                       <div class="card-body">
                                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>'.time_ago($get_info['date_p']).'</div>
                                    <div class="con_img">
                                        <img src="'.$get_info['p_photos'].'" alt="'. $hash.'">
                                    </div>
                                
                                '. $des .'

                                <div>
                                '. get_tags_fetch($get_info['pst_tags']).'
                                </div>
                            </div>


                   <div class="card-footer">
                       <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                       <a class="card-link btn_show_comments" data-id="'.$num_str.'"><i class="fa fa-comment"></i> Comment</a>
                       <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                   </div>

              
               </div>
       ';
       return $v;
    }
    elseif($gen == 3)
    {
        $data_ex   = $get_info['p_video'];
        $str = explode(".",$data_ex);
        $extension = $str[1];

        $v = '
        <div class="card gedf-card">
           <div class="card-header">
               <div class="d-flex justify-content-between align-items-center">
                   <div class="d-flex justify-content-between align-items-center">
                   <a href="@'.$get_info['name'].'">
                   <div class="mr-2">
                   <img class="rounded-circle" width="45" height="45px" src="'.$img_aut.'" alt="">
                   </div>
               </a>
                   <div class="ml-2">
                       <div class="h5 m-0"><a href="@'.$get_info['name'].'" class="name_user_post">@'.$get_info['name'].'</a></div>
                       <div class="h7 text-muted">
                       '.$ub.'
                       </div>
                               </div>
                           </div><!--  -->
                           <div>
                               <div class="dropdown">
                                   <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-ellipsis-h"></i>
                                   </button>
                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                       <div class="h6 dropdown-header">Configuration</div>
                                       <a class="dropdown-item" href="#">Save</a>
                                       <a class="dropdown-item" href="#">Hide</a>
                                       <a class="dropdown-item report_post" href="report.php?p='. $hash.'">Report</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
   
                       </div>
                       <div class="card-body">
                                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>'.time_ago($get_info['date_p']).'</div>
                                    
                                    <div class="con_video">
                                        <video width="600" height="450"  controls><source src="'.$data_ex.'" type="video/'.$extension.'" allowfullscreen></video>
                                    </div>
                                '. $des .'
                                <div>
                                '. get_tags_fetch($get_info['pst_tags']).'
                                </div>
                            </div>


                   <div class="card-footer">
                       <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                       <a class="card-link btn_show_comments" data-id="'.$num_str.'"><i class="fa fa-comment"></i> Comment</a>
                       <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                   </div>

                  
               </div>
       ';
        return $v;
    }
    else 
    {
        return $v = 'ads';
    }
}
function get_pro_fol($name, $uid, $i)
{

    $con                  = mysqli_connect('localhost', 'root', '', 'userform');
    $name                 = mysqli_real_escape_string($con, $name); 
    $uid                  = (int)$uid; 
    $i                    = (int)$i;
    $active               = "";
    $fetch_client_from_db = "SELECT `name`,`ubadge`,`uid`,`c_jdate` FROM `usertable` WHERE `uid` = '$uid' ;";
    $sql_qr               = mysqli_query($con, $fetch_client_from_db);
    $img                  = get_img_us($uid, $con);
    if(mysqli_num_rows($sql_qr) > 0 ){
        $row = mysqli_fetch_assoc($sql_qr);
        if(isset($row['c_jdate'])){
            $lastWeek  = time() - (7 * 24 * 60 * 60);
            $join_date = strtotime($row['c_jdate']);

            if($join_date >= $lastWeek){
                //show New badge
                $badge = '<span class="cbadge_new pe-none">NEW</span>';
            }else
                $badge = '';
        }else{
            $badge = '';
        }

        if($i == 0){
            $active = " active";
        }
        $card = '<div class="slide">
                    <div class="card">
                        <!-- <div class="back-img"></div> -->
                           <img class="img-fluid pe-none" alt="'.$name.' '.$active.'" src="'.$img.'" />                      
                        
                        '.$badge.'
                        <div class="card-body">
                            <h4 class="card-title text-center"><a class="lp_cl btn btn-link" role="link" href=@'.$name.'>'.ucwords($name).'</a></h4>
                            <p class="card-text text-center pe-none" >Followed By : </p>
                            <button type="button" class="follow btn btn-primary btn-lg btn-block shadow-none">Follow</button>

                        </div>
                    </div>                   
            </div>
        ';
       return $card;
    }else{
        return 'Wrong';
    }


}
//-------------------------
	//create a key for hash_hmac function
	if (empty($_SESSION['key'])){
		$_SESSION['key'] = bin2hex(random_bytes(32));
    }

	//create CSRF token
	$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);

//----------------------
$email = "";
$name = "";
$msg='';
$errors = array();






    //if user click signup button
    if(isset($_POST['signup'])){
        $name      = mysqli_real_escape_string($con, $_POST['name']);
        $email     = mysqli_real_escape_string($con, $_POST['email']);
        $password  = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        
        
        $long      = 11;
        $idforuser = "";
        for($i = 1; $i < $long ; $i++) {
            $idforuser .= mt_rand(1,9);
        }

        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "E-mail that you have entered is Already Exist!<br>
                                If You forget Your Password <a href='Reset/Password.php'>Click Here<a> ";
        }
        //-------------
        $uid_check = "SELECT * FROM usertable WHERE `uid` = '$idforuser'";
        $resul = mysqli_query($con, $uid_check);
        if(mysqli_num_rows($resul) > 0){
            $errors['email'] = "Unacceptable Error !";
        }


        if(count($errors) === 0){

                //----------------------------------------------
                $inva = 'In Your Name';
                $inva2 = 'In You E-mail';

                if(CheckData($name, $inva)){

                    $msg = CheckData($name, $inva);
        
                }elseif(CheckData($email, $inva2)){
        
                    $msg = CheckData($email, $inva2);
        
                }else{
        
                    $encpass = password_hash($password, PASSWORD_DEFAULT);
                    $longkey = 7;
                    $ids = "";
                    for($i = 1; $i < $longkey ; $i++) {
                        $ids .= mt_rand(1,9);
                    }
                    $code = (int)$ids;
                    
        
                    $status = "notverified";
                    $time_ag = date("Y-m-d H:i:s");
                    
                    $insert_data = "INSERT INTO `usertable`(`id`, `uid`, `c_jdate`, `name`, `email`, `password`, `code`, `status` ,`ui`,`post_timer`) VALUES 
                    (
                    '',
                    '$idforuser',
                    '$time_ag',
                    '$name',
                    '$email',
                    '$encpass',
                    '$code',
                    '$status',
                    '0',
                    '0'
                    )";
                    $dastad_check = mysqli_query($con, $insert_data);
        
        
                    if(isset($dastad_check)){
        
                        $subject = "Email Verification Code";
                        $message = "Your Verification Code is $code";
                        $sender = "From: moroccan.memes.reply@gmail.com";
                        if(isset($message)){
                            $info = "It's look like you haven't still verify your E-mail - ".$email." (<a href='#' onclick='funt();funtc();'><i class='fa fa-undo'></i></a>)";
                            $_SESSION['email']  = $email;
                            $_SESSION['info']   = $info;
                            $_SESSION['uid']    = $idforuser;
                            $_SESSION['status'] = $status;
                            $_SESSION['msg'] = $message;
                            header('location: user-otp.php');
                            exit();
                        }else{
                            $errors['otp-error'] = "Failed while sending code!";
                        }
        
                        //echo $name.'<br>'.$email.'<br>'.$encpass.'<br>'.$code.'<br>'.$status.'<br>';
                    }else{
                        $errors['db-error'] = "Failed while inserting data into database!";
                    }    
                }

                //----------------------------------------------
        
        }

    }
    //Resend OTP Code
    if(isset($_POST['resend'])){

                
            $longd     = 7;
            $cd = "";
            for($i = 1; $i < $longd ; $i++) {
                $cd .= mt_rand(1,9);
            }
            $_SESSION['info'] = "";
            $upd_code = "UPDATE `usertable` SET `code`= '$cd',`status`='notverified' WHERE `email` = '$_SESSION[email]'";
            $updt     = mysqli_query($con, $upd_code);
            if(isset($updt)){
                $subject = "Resend Verification Code";
                $message = "Your Account Verification Code is : $cd";
                $sender  = "From: moroccan.memes.reply@gmail.com";

                if(mail($_SESSION['email'], $subject, $message, $sender)){
                    $msg = '<div class="alert alert-success" role="alert"> <strong>Excellent !!</strong> We Sent To You Another Verification Code check Your E-mail : '.$_SESSION['email'].'</div>';
                }else{
                    $msg = '<div class="alert alert-danger"><strong>Something !</strong> Went Wrong.</div>';
                }
            }
    }

    //if user click verification code submit button
    if(isset($_POST['check'])){
            $_SESSION['info'] = "";
            $otp_code = (int) $_POST['otp'];
            if(empty($otp_code)){
                $msg = '<div class="alert alert-danger"><strong>The Code Field !</strong> Is Empty</div>';
            }else{
                $check_code = "SELECT * FROM `usertable` WHERE `code` = '$otp_code' AND `email` = '$_SESSION[email]'";
                $code_res = mysqli_query($con, $check_code);

                if(mysqli_num_rows($code_res) > 0){
                    $fetch_data       = mysqli_fetch_assoc($code_res);
                    $fetch_code       = $fetch_data['code'];
                    $email            = $fetch_data['email'];
                    $uid              = $fetch_data['uid'];
                    $ui               = $fetch_data['ui'];
                    $code             = 0;
                    $status           = 'verified';
                    $update_otp       = "UPDATE usertable SET `code` = $code, `status` = '$status', `ui` = 1 WHERE `code` = $fetch_code";
                    $update_res       = mysqli_query($con, $update_otp);
                    if($update_res){
                        $_SESSION['name']   = $name;
                        $_SESSION['email']  = $email;
                        $_SESSION['uid']    = $uid;
                        $_SESSION['status'] = $status;
                        $_SESSION['ui']     = $ui;
                        header('location: home');
                        exit();
                    }else{
                        $errors['otp-error'] = "Failed while updating code!";
                    }
                }else{
                    $errors['otp-error'] = "You've entered incorrect code!";
                }
            }
    }
    
    // LOGIN 
    if(isset($_POST['login'])){
        if (hash_equals($csrf, $_POST['csrf'])) {
        $email          = mysqli_real_escape_string($con, $_POST['email']);
        $password       = mysqli_real_escape_string($con, $_POST['password']);
        $inva           = "In Your E-Mail";
        if(CheckData($email, $inva)){

            $errors['email'] = strip_tags(CheckData($email, $inva)) ;

        }else{
            $check_email    = "SELECT * FROM usertable WHERE email = '$email'";
            $res            = mysqli_query($con, $check_email);

            if(mysqli_num_rows($res) > 0){
                $fetch      = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
                if(password_verify($password, $fetch_pass)){

                    $_SESSION['email']  = $fetch['email'];
                    $_SESSION['uname']  = $fetch['name'];
                    $_SESSION['uid']    = $fetch['uid'];
                    $_SESSION['status'] = $fetch['status'];
                    $_SESSION['ui']     = $fetch['ui'];

                    if($_SESSION['status'] == 'verified'){

                        $_SESSION['message_reg'] = "Log in Successfuly";
                        $_SESSION['icon']        = "success";
  
                        header('location: home');
                        exit();
                    }else{

                        $info = "It's look like you haven't still verify your E-mail - ".$email." (<a  onclick='funt();funtc();'><i class='fa fa-undo'></i></a>)";
                        $_SESSION['info'] = $info;
                        header('location: user-otp.php');

                    }
                }else{
                    $errors['email'] = "Incorrect email or password! Please if you forget Your Password <a href='Reset/Password.php?em=".$email." '>Click Here<a>";
                }
            }else{
                $errors['email'] = "It's look like you're not a yet member! Click on the bottom link to signup.";
            }
        }
         //here 
      } else{
        $errors['email'] = 'CSRF Token Failed!';
      }
    }
    // IF USER CLICK RESET(PASWWORD) BUTTON
    if(isset($_POST['reset'])){

        $email          = mysqli_real_escape_string($con, $_POST['email']);
        $name           = mysqli_real_escape_string($con, $_POST['name']);
        
        //check 
        if(empty($email)){
            $errors['email'] = "Empty E-mail !!";
        }elseif(empty($name)){
            $errors['email'] = "Empty Name !!";
        }else{
            $check_email    = "SELECT * FROM usertable WHERE email = '$email'";
            $res            = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){

                $fetch = mysqli_fetch_assoc($res);
                $fetch_name = $fetch['name'];

                if($fetch_name === $name){

                    // PG START HERE
                    $longd     = 7;
                    $otver     = "";
                    for($i = 1; $i < $longd ; $i++) {
                        $otver .= mt_rand(1,9);
                    }
    
                    //------//
                    $subject = "Reset Password";
                    $message = "Hello ($fetch_name), Someone try to Change Your password account (Hopefully You) Anyway this is the code : $otver";
                    $sender  = "From: moroccan.memes.reply@gmail.com";

                    if(mail($email, $subject, $message, $sender)){
                        $update_pass   = "UPDATE `usertable` SET `code`='$otver' WHERE `email` = '$email'";
                        $ifyesorno     = mysqli_query($con, $update_pass);
                        if(isset($ifyesorno)){

                            
                            $cdn = "ValueIsThisThing";
                            $encrypt = password_hash($cdn, PASSWORD_DEFAULT);
                            
                            $msg = '<div class="alert alert-success" role="alert"> Check out Your E-mail ('.strip_tags($email).') We Sent To You You New Code Verification</div>';
                            $_SESSION['nameserveedbyses'] = TRUE;
                            $_SESSION['mailto'] = $email;
                            $_SESSION['nameto'] = $fetch_name;
                            $_SESSION['infos'] = $msg;
                            
                            header('location: PBOCHS.php');
                                

                        }else{
                            $errors['email'] = "Something Went Wrong please Try Again Later ";
                        }
                    }else{
                        $errors['email'] = "Something Went Wrong <br> (We Can't Mail You)";
                    }
                }else{
                    $errors['email'] = "It's look like your Name you entered is Invalid.";   
                }
            }else{
                $errors['email'] = "It's look like you're not a yet member! <a href=''>Click Here</a> to signup.";
            }
        }

    }
    


//---------------------------------------------------------------------------------------------------------------------------------
?>