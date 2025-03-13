<?php
require_once "../controllerUserData.php";

if(isset($_POST["view"])){
 if($_POST["view"] != ''){
  $update_query = "UPDATE `comments` SET `comment_status`= 1 WHERE comment_status=0 AND `uid_u_noti` = '$_SESSION[uid]'";
  mysqli_query($con, $update_query);
 }      
 $query = "SELECT * FROM `comments` WHERE `uid_u_noti` = '$_SESSION[uid]'  ORDER BY `comments`.`comment_id` DESC";
 $resulst = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($resulst) > 0){
  $output = '
              <form action="Reset/Notifications.php?t=1" method="post" >
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-sm" name="delt">Delete all</button>
              </form>
              
  ';
   $x=1;
  while($row = mysqli_fetch_array($resulst)){

    $row0       = $row["n_gen"];
    $row1       = $row["comment_subject"];
    $row2       = $row["comment_text"];
    $row3       = $row["comment_id"];
    $uid_author = (int)$row["uid_benef"];
    $time       = time_ago($row["comment_time"]);



    $query2 = "SELECT `uid`,`name` FROM `usertable` WHERE `uid`= '$uid_author'";
    $query3 = mysqli_query($con, "SELECT `uid`,`u_img` FROM `bycrypt` WHERE `uid`= '$uid_author'");
    $row_2  = mysqli_fetch_array($query3);
    $recup  = mysqli_query($con, $query2);
    $rows   = mysqli_fetch_array($recup);
    $img_aut = get_img_us($uid_author , $con);

    
     if( $row0 == 0){
        if($row1 == 'New Post From ()'){
          $row1 = $rows['name']." Added a New Post";
        }
      $output .= '
                  <!-- -->
                  <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"><a href="@'.$rows['name'].'"><img src="'. $img_aut .'" alt="'.$x.'"></a> </div>
                    <div class="chat_ib">
                      <h5><strong>'.ucwords($row1).'</strong> <span class="chat_date">'.$time.'</span> 
                      
                    </h5>
                      <p>'.ucwords($row2) .'</p>
                      <a class="btn-delete-noti" href="?delete='.$row3.'" >
                        <svg style="color:red;float: right;position: relative;right:15px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                      </a> 
                    </div>
                  </div>
                </div>
                
          ';

     }else{
        if($row2 == '#...'){
          $row2 = $rows['name']." Added a new Photo .";
        }
        $strict2 = explode("|",$row1);
        if($strict2[1] == 'New Post From ()'){
          $str_tit = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9c0 .013 0 .027.002.04V12l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15 9.499V3.5a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm4.502 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg> '.$rows['name'].' Added a new Photo';
        }
                  $output .= '
                  <!-- -->
                  <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"><a href="@'.$rows['name'].'"><img src="'.$img_aut.'" alt="'.$x.'"></a> </div>
                    <div class="chat_ib">
                      <a href="watch.php?p='.$strict2[0].'" class="link_post">
                      <h5><strong>'.ucwords($str_tit).'</strong> <span class="chat_date">'.$time.'</span></h5> 
                      <p>'.ucwords($row2) .'</p>
                      </a>
                      <a class="btn-delete-noti" href="?delete='.$row3.'" >
                        <svg style="color:red;float: right;position: relative;right:15px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                      </a> 
                    </div>
                  </div>
                </div>
                
                  ';
     }



              $x++;
  }


 }else{
  $output .= '<li><a href="#" class="text-bold text-italic" id="btn-refresh" style="text-align: center;display: block;">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM `comments` WHERE `uid_u_noti` = '$_SESSION[uid]' AND `comment_status`=0 ";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}


//<li class="col-it"><a href="@'.$rows['name'].'"><img src="'.($row_2['u_img'] == '' ? 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png' : $row_2['u_img']).'" style="width:80px;border-radius:12px" /><br><span class="px-date">'.$time.'</span></a></li>
//<li class="col-it rew"><a ><strong>'.$row1.'</strong><br><small>'.$row2 .'</small></a><a href="?delete='.$row3.'" ><svg style="color:red;float: right;top: 1px;position: absolute;right:1px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
//<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
//</svg></a></li><hr> 



?>
