<?php 
if( defined("load_new") && load_new == "somedata_here3425"){

    if(!isset($_SESSION['email'])){
        header("Location: ../home");
    }
    $email = mysqli_real_escape_string($con, $_SESSION['email']) ;
    $fetch_data = "SELECT * FROM usertable WHERE email = '$email'";

    $run_query = mysqli_query($con, $fetch_data);
    if(mysqli_num_rows($run_query) < 1){
    header("Location: ../Logout");
    }
    $fetch_info = mysqli_fetch_assoc($run_query);

    if($fetch_info['post_timer'] === '0'){
        // echo $fetch_info['post_timer'];
            // echo create_timer_post(1);

        ?>
    <!--- \\\\\\\Post-->

                    <div class="card gedf-card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">

                        
                        
                                        <li class="nav-item">
                                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">
                                                    Make a publication
                                                    </a>
                                        </li>
                                        <li class="nav-item">

                                            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                                        
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="videos-tab" data-toggle="tab" role="tab" aria-controls="videos" aria-selected="false" href="#videos">Videos</a>
                                        </li> -->


                                    </ul>
                                </div>
                            <div class="card-body">
                                <form action="inc/new.post.php" method="post" id="new_post" enctype="multipart/form-data">
                                    <div class="tab-content" id="myTabContent">
                                        
                                         
                                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                            <div class="form-group">
                                                <div class="row demo-item">
                                                        <div class="col-lg-12 demo">
                                                            <textarea id="t1" name="text_area" class="mention1" rows="3" placeholder="What are you thinking?"></textarea>
                                                        </div>
                                                </div>
                                        
                                            </div>
                                        </div>
    
                                                <!-- <label class="sr-only" for="message"></label>
                                                <textarea name="text_area"  class="inputbox form-control"  rows="3" ></textarea> -->
                                                                       
                                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input " name="image" id="customFile">
                                                    <label class="custom-file-label"  for="customFile">Upload image</label>
                                                </div>
                                                <div class="form-group">
                                                    <small id="Info_ab" class="form-text text-muted">If you Dont Have A description just Insert ( # )</small>
                                                    <label class="sr-only" for="message_msg">Description</label>
                                                    <textarea name="text_area_msg_sec" class="form-control inputbox" id="message_msg" rows="3"  placeholder="What are you thinking?"></textarea>
                                                </div>      
                                            </div>
                                            
                                        </div>


                                        <!-- <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="upload_video" id="customFile2">
                                                    <label class="custom-file-label"  for="customFile2">Upload Video</label>
                                                </div>
                                            </div>
                                    

                                            <div class="form-group">
                                                <small id="emailHelp" class="form-text text-muted">If you Dont Have A description just Insert ( # )</small>
                                                <label class="sr-only" for="message_vid">Description</label>
                                                <textarea name="text_area_vid_sec" class="form-control inputbox" id="message_vid" rows="3"  placeholder="What are you thinking?"></textarea>
                                            </div>                                    
                                        
                                        </div> -->
                                    </div>
                        
                                <div class="col-md-8" id="tab_to_show" style="display: none;">
                                    <div class="form-group">
                                        <label>Tags Area</label>
                                            <div class="input-group">
                                                <input type="text" data-role="tagsinput" name="tags" class="form-control">

                                            </div>
                                        <br />
                                    </div>
                                    </div>
                                <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><br>
                                <div id="output"></div>
                                <p>
                                
                            </p>
                                <div class="btn-toolbar justify-content-between">
                                    <div class="btn-group"  >
                                        <button type="submit"  name="submit_post_video" id="btn_vid" style="display:none;"  class="btn btn-warning "><i class="fa fa-user-check"></i> Sumbit</button>
                                        <button type="submit"  name="submit_post_img" id="btn_img" style="display:none;"   class="btn btn-danger "><i class="fa fa-user-check"></i> Sumbit</button>
                                        <button type="submit"  name="submit_post"    id="btn_text_area"   class="btn btn-success "><i class="fa fa-user-check"></i> Sumbit</button>
                                    </div>
                                        <button id="tag_tabs_open" type="button" class="btn btn-link">
                                            Open Tags
                                        </button>
                                        <button id="tag_tabs_close" style="display:none;" type="button" class="btn btn-link">
                                            Hide Tags
                                        </button>


                                    <div class="btn-group" >
                                        <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" data-disabled="true" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-globe"></i>
                                        </button>
                                    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" value="1" class="custom-control-input" checked>
                                                <label class="custom-control-label" style="margin-left: 25px;" for="customRadio1"><i class="fa fa-globe"></i> Public</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                                                <label class="custom-control-label" style="margin-left: 25px;" for="customRadio2"><i class="fa fa-users"></i> Friends</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" value="3" class="custom-control-input">
                                                <label class="custom-control-label" style="margin-left: 25px;" for="customRadio3"><i class="fa fa-user"></i> Just me</label>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                    </form>
                        </div>
                </div><br>

    <!-- Post /////-->
        <?php
    }else{



?>
<div class="container">
    <div class="row">
        <p id="demo" style="text-align:center;margin: auto;font-size: 35px;"></p>

        
    </div>
 
    
        <!-- <div class="progress"> -->
            <progress value="0" max="14400" id="progressBar" style="width:100%;"></progress>
        <!-- </div> -->
</div>


<script>
                
    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo $fetch_info['post_timer'];?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        // var timeleft = distance;
        // Time calculations for days, hours, minutes and seconds
        var days    = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

        document.getElementById("progressBar").value = 14400 - seconds;
        // seconds -= 1;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = 'EXPIRED<br><form action="Reset/Timer.php" method="post"><button type="submit" name="btn" class="btn btn-primary btn-lg btn-block btn-sm" name="delt">Refresh The Page</button></form>';
            // $("#progressBar").removeTarget.fadeOut(1000);
            document.getElementById("progressBar").remove();
        }
    }, 1000);
















</script>

<?php
    }
}else {
    header("Location: ../");
}
?>
                