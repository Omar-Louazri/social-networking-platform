<?php
require_once "../controllerUserData.php";

//add 2hours from now defined('FOOS')

$new_time = create_timer_post();
if (isset($_POST['submit_post'])) {

    if (isset($_POST['text_area'])) {
        $inva      = "In Your Text_Area .";


        $p_gen     = 1;
        $uid_s     = (int)$_SESSION['uid'];
        $p_privacy = (int)$_POST['customRadio'];

        $description = str_replace('\\r\\n', '<br>', $_POST['text_area']);
        $without_span = strip_tags($description, '<br>') ;
        
        







        $tagsX              = htmlspecialchars($_POST['tags'], ENT_QUOTES, 'UTF-8');
        // $text_f_trans       = $_POST['text_area'];
        $text_f_trans       = htmlspecialchars($without_span, ENT_QUOTES, 'UTF-8');
        $tags               = mysqli_real_escape_string($con, $tagsX);
        

        if (empty($_POST['text_area'])) {
            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Empty Text_area .</div>';
        } elseif (CheckData_ofurls($text_f_trans, $inva)) {
            echo  '<div class="alert alert-danger"style="font-size:12px;" authk="danger">' . strip_tags(CheckData_ofurls($text_f_trans, $inva)) . '</div>';
        } elseif ($p_privacy > 4) {
            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339349" target="_blank"> Click here to know more (ERROR 339349) </a> .</div>';
        } elseif ($p_privacy < 0) {
            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339323" target="_blank"> Click here to know more (ERROR 339323) </a> .</div>';
        } else {


            $description = mysqli_real_escape_string($con, $without_span);


            $description = str_replace(' ', '&#160;', $description);

            $description = make_clickable($description);
            $hash        = grs(11);
            $comm        = strip_tags(substr($description, 0, 55)) . '...';
            // generate ids 
            $comment_id_post = grs(11);
            $report_sec_id = grs(11);
            $react_sec_id = grs(11);

            // end generate ids | start time
            $time_ag = date("Y-m-d H:i:s");
            $sub       = $hash . "|New Post From ()";

            // INSERT START HERE 


            $query_instr = "INSERT INTO `whole_posts_users`(
                            `pst_hash`,
                            `uid_author`,
                            `p_gender`,
                            `p_photos`,
                            `p_video`,
                            `p_privacy`,
                            `p_description`,
                            `comts_id_re`,
                            `date_p`,
                            `report_sec`,
                            `react_sec`,
                            `pst_tags`
                        ) VALUES (

                                '$hash',
                                '$_SESSION[uid]',
                                '$p_gen',
                                'assets/loadings/no_img.png',
                                'assets/loadings/no_video.mp4',
                                '$p_privacy',
                                '$description',
                                '$comment_id_post',
                                '$time_ag',
                                '$report_sec_id',
                                '$react_sec_id',
                                '$tags'
                                )";
            $exe_que   = mysqli_query($con, $query_instr);
            echo set_timer($new_time, $_SESSION['uid'], $con);
            echo $description;
            if(isset($exe_que)){

                echo  '<div class="alert alert-success"><strong>'. strip_tags(insert_noti($uid_s , $sub, $comm, $p_gen, $con)) .'</strong> Posted  Successfully Uploaded <span id="countdown">5 seconds</span><br><a href="watch.php?p='.$hash.'" target="_blank" ><span id="demo_host_name"></span>watch.php?p='.$hash.' .</a></div>
                    <script>
                        document.getElementById("demo_host_name").innerHTML = window.location.hostname + "/" ;
                        var timeleft = 4;
                        var downloadTimer = setInterval(function(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            document.getElementById("countdown").innerHTML = "Finished";
                            location.reload();
                        } else {
                            document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                        }
                        timeleft -= 1;
                        }, 1000);
                        setTimeout(function () {
                            Toast.show("Posted Successfully Uploaded", "success");
                        }, 5000);
                    </script>';


            //         //------END  window.open("http://philmontscoutranch.org/Camping/75.aspx", "_blank");  window.location.hostname + "/watch.php?p=3422243242"
            }

        }
    } else {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Empty Text_area Or Something Went Wrong <a href="support.php?p=30389">Click here to Contact the Support (ERROR 30389)</a>  .</div>';
    }

    // ----------- End


} elseif (isset($_POST['submit_post_img'])) {

    $inva      = "In Your Textarea | If you Dont Have A description just Insert ( # ) .";

    $uid_s          = (int)$_SESSION['uid'];
    $p_gen          = 2;
    $p_privacy      = (int)$_POST['customRadio'];
    $tagsX     = htmlspecialchars($_POST['tags'], ENT_QUOTES, 'UTF-8');
    $tags      = mysqli_real_escape_string($con, $tagsX);
    $text_f_trans = htmlspecialchars($_POST['text_area_msg_sec'], ENT_QUOTES, 'UTF-8');

    if (empty($_POST['text_area_msg_sec'])) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Empty Text_area .</div>';
    } elseif (CheckData_ofurls($text_f_trans, $inva)) {

        echo  '<div class="alert alert-danger"style="font-size:12px;" authk="danger">' . strip_tags(CheckData_ofurls($text_f_trans, $inva)) . '</div>';
    } elseif ($p_privacy > 4) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339349" target="_blank"> Click here to know more (ERROR 339349) </a> .</div>';
    } elseif ($p_privacy < 0) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339323" target="_blank"> Click here to know more (ERROR 339323) </a> .</div>';
    } else {

        $description = mysqli_real_escape_string($con, $text_f_trans);
        $description = str_replace('\\r\\n', '<br>', $description);


        $description = str_replace(' ', '&#160;', $description);
        // $description = preg_replace('$(\s|^)(https?://[a-z0-9_./?=&-]+)(?![^<>]*>)$i', ' <a href="$2" target="_blank">$2</a> ', $description." ");
        // $description = preg_replace('$(\s|^)(www\.[a-z0-9_./?=&-]+)(?![^<>]*>)$i', '<a target="_blank" href="http://$2"  target="_blank">$2</a> ', $description." ");
        $description = make_clickable($description);

        $hash        = grs(11);
        $comm        = strip_tags(substr($description, 0, 55)) . '...';
        // generate ids 
        $longd            = 11;
        $comment_id_post  = "";
        $report_sec_id    = "";
        $react_sec_id     = "";
        for ($i = 1; $i < $longd; $i++) {
            $comment_id_post .= mt_rand(1, 9);
        }
        for ($i = 1; $i < $longd; $i++) {
            $report_sec_id .= mt_rand(1, 9);
        }

        for ($i = 1; $i < $longd; $i++) {
            $react_sec_id .= mt_rand(1, 9);
        }

        //img property
        if (isset($_FILES['image'])) {

            $image          = $_FILES['image'];
            $image_name     = strip_tags($image['name']);
            $image_tmp      = $image['tmp_name'];
            $image_size     = $image['size'];
            $image_error    = $image['error'];

            $image_exe = explode('.', $image_name);
            $image_exe = strtolower(end($image_exe));

            $allowd = array('png', 'gif', 'jpg', 'jpeg');

            if (in_array($image_exe, $allowd)) {
                if ($image_error === 0) {
                    if ($image_size <= 3000000) {
                        $new_name = uniqid('post_', false) . '.' . $image_exe;
                        $image_dir = "../assets/p_images/" . $new_name;
                        $image_db = 'assets/p_images/' . $new_name;
                        if (move_uploaded_file($image_tmp, $image_dir)) {
                            // end generate ids | start time
                            $time_ag = date("Y-m-d H:i:s");
                            $nquery_img = "INSERT INTO `whole_posts_users`(
                                    `pst_hash`,
                                    `uid_author`,
                                    `p_gender`,
                                    `p_photos`,
                                    `p_video`,
                                    `p_privacy`,
                                    `p_description`,
                                    `comts_id_re`,
                                    `date_p`,
                                    `report_sec`,
                                    `react_sec`,
                                    `pst_tags`
                                ) VALUES (
                                        
                                        '$hash',
                                        '$uid_s',
                                        '$p_gen',
                                        '$image_db',
                                        'assets/loadings/no_video.mp4',
                                        '$p_privacy',
                                        '$description',
                                        '$comment_id_post',
                                        '$time_ag',
                                        '$report_sec_id',
                                        '$react_sec_id',
                                        '$tags'
                                        )";
                            $sub       = $hash . "|New Post From ()";

                            $upd = mysqli_query($con, $nquery_img);
                            // echo set_timer($new_time, $_SESSION['uid'], $con);

                            // ---------------------------------------


                            // INSERT START HERE 

                            if (isset($upd)) {

                                echo  '<div class="alert alert-success"><strong>' . strip_tags(insert_noti($uid_s, $sub, $comm, $p_gen, $con)) . '</strong> Image Updated Successfully <span id="countdown">5 seconds</span><br><a href="watch.php?p=' . $hash . '" target="_blank" ><span id="demo_host_name"></span>watch.php?p=' . $hash . ' .</a></div>
                                                <script>
                                                document.getElementById("demo_host_name").innerHTML = window.location.hostname + "/" ;
                                                var timeleft = 4;
                                                var downloadTimer = setInterval(function(){
                                                if(timeleft <= 0){
                                                    clearInterval(downloadTimer);
                                                    document.getElementById("countdown").innerHTML = "Finished";
                                                    location.reload();
                                                } else {
                                                    document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                                                }
                                                timeleft -= 1;
                                                }, 1000);
                                                setTimeout(function () {
                                                    Toast.show("Posted Successfully Uploaded", "success");
                                                }, 5000);
                                                </script>';


                                //------END  window.open("http://philmontscoutranch.org/Camping/75.aspx", "_blank");  window.location.hostname + "/watch.php?p=3422243242"
                            } else {
                                echo  '<div class="alert alert-danger"><strong>Undone !!</strong> Please try again later</div>
                                            <script>
                                                
                                                setTimeout(function () {
                                                    Toast.show("Please Try Again later", "error");
                                                }, 3000);
                                                
                                            </script>';
                            }

                            // -----------------------------------------





                        } else {
                            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> There is a error while uploading Photo .</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> The image is to big (try one (<3MB))</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload" style="color:darkred"></i> There is a error while uploading Photo (Error 404) .</div>';
                }
            } else {
                echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Please image should have a (png/jpeg/jpg/gif) at the end .</div>';
            }
        } else {
            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Please Upload image !! .</div>';
        }




        // end







    }
} elseif (isset($_POST['submit_post_video'])) {
    $inva      = "In Your Textarea .";


    $uid_s          = (int)$_SESSION['uid'];
    $p_gen          = 3;
    $p_privacy      = (int)$_POST['customRadio'];
    $tagsX     = htmlspecialchars($_POST['tags'], ENT_QUOTES, 'UTF-8');
    $tags      = mysqli_real_escape_string($con, $tagsX);
    $text_f_trans = htmlspecialchars($_POST['text_area_vid_sec'], ENT_QUOTES, 'UTF-8');

    if (empty($_POST['text_area_vid_sec'])) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Empty Text_area | If you Dont Have A description just Insert ( # )  .</div>';
    } elseif (CheckData_ofurls($text_f_trans, $inva)) {

        echo  '<div class="alert alert-danger"style="font-size:12px;" authk="danger">' . strip_tags(CheckData_ofurls($text_f_trans, $inva)) . '</div>';
    } elseif ($p_privacy > 4) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339349" target="_blank"> Click here to know more (ERROR 339349) </a> .</div>';
    } elseif ($p_privacy < 0) {
        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Please select You Privacy (Public / Followers only / Only-You)<a href="support.php?p=339323" target="_blank"> Click here to know more (ERROR 339323) </a> .</div>';
    } else {

        $description = mysqli_real_escape_string($con, $text_f_trans);
        $description = str_replace('\\r\\n', '<br>', $description);
        $description = str_replace(' ', '&#160;', $description);
        // $description = preg_replace('$(\s|^)(https?://[a-z0-9_./?=&-]+)(?![^<>]*>)$i', ' <a href="$2" target="_blank">$2</a> ', $description." ");
        // $description = preg_replace('$(\s|^)(www\.[a-z0-9_./?=&-]+)(?![^<>]*>)$i', '<a target="_blank" href="http://$2"  target="_blank">$2</a> ', $description." ");

        $description = make_clickable($description);
        $hash        = grs(11);
        $comm        = strip_tags(substr($description, 0, 55)) . '...';
        // generate ids 
        $longd            = 11;
        $comment_id_post  = "";
        $report_sec_id    = "";
        $react_sec_id     = "";
        for ($i = 1; $i < $longd; $i++) {
            $comment_id_post .= mt_rand(1, 9);
        }
        for ($i = 1; $i < $longd; $i++) {
            $report_sec_id .= mt_rand(1, 9);
        }

        for ($i = 1; $i < $longd; $i++) {
            $react_sec_id .= mt_rand(1, 9);
        }




        if (isset($_FILES['upload_video'])) {
            //upload_video

            $video          = $_FILES['upload_video'];
            $video_name     = $video['name'];
            $video_tmp      = $video['tmp_name'];
            $video_size     = $video['size'];
            $video_error    = $video['error'];

            $video_exe = explode('.', $video_name);
            $video_exe = strtolower(end($video_exe));

            $allowd = array('mp4', 'avi', 'mkv', 'mov');
            //mp4/avi/mkv/mov
            if (in_array($video_exe, $allowd)) {
                if ($video_error === 0) {
                    if ($video_size <= 30000000) {
                        $new_name = uniqid('post_v_', false) . '.' . $video_exe;
                        $video_dir = "../assets/p_videos/" . $new_name;
                        $video_db = 'assets/p_videos/' . $new_name;
                        if (move_uploaded_file($video_tmp, $video_dir)) {

                            // end generate ids | start time
                            $time_ag = date("Y-m-d H:i:s");
                            $nquery_img = "INSERT INTO `whole_posts_users`(
                                    `pst_hash`,
                                    `uid_author`,
                                    `p_gender`,
                                    `p_photos`,
                                    `p_video`,
                                    `p_privacy`,
                                    `p_description`,
                                    `comts_id_re`,
                                    `date_p`,
                                    `report_sec`,
                                    `react_sec`,
                                    `pst_tags`
                                ) VALUES (
                                        
                                        '$hash',
                                        '$uid_s',
                                        '$p_gen',
                                        'assets/loadings/no_img.png',
                                        '$video_db',
                                        '$p_privacy',
                                        '$description',
                                        '$comment_id_post',
                                        '$time_ag',
                                        '$report_sec_id',
                                        '$react_sec_id',
                                        '$tags'
                                        )";
                            $sub       = $hash . "|New Post From ()";

                            $upd = mysqli_query($con, $nquery_img);
                            echo set_timer($new_time, $_SESSION['uid'], $con);

                            // ---------------------------------------


                            // INSERT START HERE 

                            if (isset($upd)) {

                                echo  '<div class="alert alert-success"><strong>' . strip_tags(insert_noti($uid_s, $sub, $comm, $p_gen, $con)) . '</strong> Video Updated Successfully <br><a href="watch.php?p=' . $hash . '" target="_blank" ><span id="demo_host_name"></span>watch.php?p=' . $hash . ' .</a></div>
                                                <script>
                                                // document.getElementById("demo_host_name").innerHTML = window.location.hostname + "/" ;
                                                // var timeleft = 4;
                                                // var downloadTimer = setInterval(function(){
                                                // if(timeleft <= 0){
                                                //     clearInterval(downloadTimer);
                                                //     document.getElementById("countdown").innerHTML = "Finished";
                                                //     location.reload();
                                                // } else {
                                                //     document.getElementById("countdown").innerHTML = timeleft + " seconds ";
                                                // }
                                                // timeleft -= 1;
                                                // }, 1000);
                                                // setTimeout(function () {
                                                //     Toast.show("Posted Successfully Uploaded", "success");
                                                // }, 5000);
                                                </script>';
                            } else {
                                //echo $description;
                                echo  '<div class="alert alert-danger"><strong>Undone !!</strong> Please try again later</div>
                                                <script>
                                                    
                                                    setTimeout(function () {
                                                        Toast.show("Please Try Again later", "error");
                                                    }, 3000);
                                                    
                                                </script>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> There is a error while uploading video | TRY AGAIN LATER To know more <a href="support.php?u=349348">Click here</a> .</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> The Video is to big (try one (<30MB))</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload" style="color:darkred"></i> There is a error while uploading video (Error 404) .</div>';
                }
            } else {
                echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Please Video should have a (mp4/avi/mkv/mov) at the end .</div>';
            }
        } else {
            echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger"><i class="fa fa-upload"></i> Please Upload Video !! .</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger"style="font-size:12px;" authk="danger">Something Went wrong please try again later <a href="support.php?p=34095">Click here To Know More (ERROR 34095)</a>.</div>';
}




//<video width="540" height="310" controls><source src="videos/1.mp4" type="video/mp4"></video>

?>
