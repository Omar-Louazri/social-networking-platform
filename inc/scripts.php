


    <script src="js/notification.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/malshup_vr.js"></script>
    <script src="js/suggestions.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" ></script>
   <script>
    const drop_btn=document.querySelector(".drop-btn"),drop_btn2=document.querySelector(".drop-btn2"),drop_noti=document.querySelector(".drop-noti"),tooltip=document.querySelector(".tooltip"),menu_wrapper=document.querySelector(".wrapper"),noti_wrapper=document.querySelector(".wrapper-noti"),menu_bar=document.querySelector(".menu-bar"),setting_drop=document.querySelector(".setting-drop"),help_drop=document.querySelector(".help-drop"),contact_drop=document.querySelector(".contact-drop"),setting_item=document.querySelector(".setting-item"),help_item=document.querySelector(".help-item"),contact_item=document.querySelector(".contact-item"),setting_btn=document.querySelector(".back-setting-btn"),help_btn=document.querySelector(".back-help-btn"),contact_btn=document.querySelector(".back-contact-btn");var style=menu_wrapper.style.display;drop_btn.onclick=(()=>{tooltip.style.display="block",(style="none")&&(menu_wrapper.style.display="flex",drop_btn.style.display="none",drop_btn2.style.display="block",noti_wrapper.style.display="none")}),drop_btn2.onclick=(()=>{tooltip.style.display="none",(style="none")&&(menu_wrapper.style.display="none",drop_btn.style.display="block",drop_btn2.style.display="none")}),drop_noti.onclick=(()=>{menu_wrapper.style.display="none",tooltip.style.display="none",drop_btn.style.display="block",drop_btn2.style.display="none",noti_wrapper.style.display="block"}),contact_item.onclick=(()=>{menu_bar.style.marginLeft="-100%",setTimeout(()=>{contact_drop.style.display="block"},100)}),setting_item.onclick=(()=>{menu_bar.style.marginLeft="-100%",setTimeout(()=>{setting_drop.style.display="block"},100)}),help_item.onclick=(()=>{menu_bar.style.marginLeft="-100%",setTimeout(()=>{help_drop.style.display="block"},100)}),contact_btn.onclick=(()=>{contact_drop.style.display="none",menu_bar.style.marginLeft="0px"}),setting_btn.onclick=(()=>{setting_drop.style.display="none",menu_bar.style.marginLeft="0px"}),help_btn.onclick=(()=>{help_drop.style.display="none",menu_bar.style.marginLeft="0px"});const Toast={init(){this.hideTimeout=null,this.el=document.createElement("div"),this.el.className="toast",document.body.appendChild(this.el)},show(e,t){clearTimeout(this.hideTimeout),this.el.textContent=e,this.el.className="toast toast--visible",t&&this.el.classList.add(`toast--${t}`),this.hideTimeout=setTimeout(()=>{this.el.classList.remove("toast--visible")},5e3)}};document.addEventListener("DOMContentLoaded",()=>Toast.init());
  

    // p1.addEventListener('touchstart',(e)=> {
    //     e.preventDefault();
    //     startingX = e.touches[0].clientX;
    //     console.log("start");
    // });    
 
    // function touchfuncmove(e) {
    //     e.preventDefault();
    //     var touche = e.touches[0];
    //     var change = startingX - touche.clientX;
    //     p1.style.top = '-' + change + 'px';
    // }
    
    </script>

      

          <script> 
            // wait for the DOM to be loaded 
            $(document).ready(function() {
                
                $('.dropdown-toggle').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    return false;
                });

                $('textarea.mention1').mentiony({
                    onDataRequest: function (mode, keyword, onDataRequestCompleteCallback) {
                        
                        $.ajax({
                            method: "POST",
                            url: "fetches/fetch_tag.php",
                            data : {
                                post: 1,
                                query : keyword
                            },
                            dataType: "JSON",
                            success: function (response) {
                                var data =  response;
                              
                                data = $.grep(data, function( item ) {
                                    return item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1;
                                });
                                onDataRequestCompleteCallback.call(this, data);
                            }

                        });

                 
                        
                    },
                    timeOut: 0,
                    debug: 1,
                });
           
                $("#btn-xm").on("click", function(e){
                    e.preventDefault();
                    const href = $(this).attr('href')
                    Swal.fire({
                        title: 'Do you want to Delete this notification ?',
                        showDenyButton: true,
                        confirmButtonText: `Delete`,
                        denyButtonText: `Cancel`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                        document.location.href = href;
                        } else if (result.isDenied) {
                            Swal.fire('Canceled', '', 'info')
                        }
                    })
                });
                $(".report_post").on("click", function(e){
                    e.preventDefault();
                    const href = $(this).attr('href')
                        Swal.fire({
                            title: 'Do you want to Report This POST ?',
                            showDenyButton: true,
                            denyButtonText: `Report`,
                            confirmButtonText: `Cancel`
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Canceled', '', 'info')
                            } else if (result.isDenied) {
                                document.location.href = href;
                            }
                        })
                });
                $(".save_post").on("click", function(e){
                    e.preventDefault();
                    const href = $(this).attr('href')
                        Swal.fire({
                            title: 'Do you want to Save This POST ?',
                            showDenyButton: true,
                            confirmButtonText: 'Save',
                            denyButtonText: `Cancel`,
                            showCloseButton: true
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                document.location.href = href;
                            } else if (result.isDenied) {
                                Swal.fire('Canceled', '', 'info')
                            }
                        })
                });
             
                function check_if_there_is_nothing(){
                    if($('.count').text().length == 0){
                        $('.count').css('background', '#e34e4e00');
                    }else{
                        $('.count').css('background', '#e34e4e');
                    }
                }
                setInterval(function(){ 
                    check_if_there_is_nothing();; 
                }, 3000);

                $("#tag_tabs_open").click(function(){
                    $("#tab_to_show").show(400);
                    $("#tag_tabs_open").hide();
                    $("#tag_tabs_close").show();
                    
                });
                $("#tag_tabs_close").click(function(){
                    $("#tab_to_show").hide(400);
                    $("#tag_tabs_close").hide();
                    $("#tag_tabs_open").show();
                });

                $("#images-tab").click(function(){
                    $("#tab-down").css({
                        "opacity":"0",
                        "display":"block",
                        "position":"fixed",
                        "background": "#0000005e",
                        "top": "100%"
                    }).show(800).animate({opacity:1,top:0});
                    $("body").css("overflow", "hidden");
                });
                $(".exit-icon").on('click',()=>{
                    $("#tab-down").css({
                        "opacity":"1",
                        "background": "#FFF1",
                        "top": "0%"
                    }).animate({opacity:0,top:"100%"}).hide(800);
                    $("body").css("overflow", "auto");
                });
                $("#posts-tab").click(function(){
                    $("#btn_img").hide(500);
                    $("#btn_vid").hide(500);
                    $("#btn_text_area").show(200);
                    $('#output').html("");
                    $('.progress-bar').width('0%');
                });
                $("#videos-tab").click(function(){
                    $("#btn_img").hide(600);
                    $("#btn_vid").show(200);
                    $("#btn_text_area").hide(500);
                    $('#output').html("");
                    $('.progress-bar').width('0%');
                });
                        // bind 'myForm' and provide a simple callback function 
                        $(function() {
                            $("#new_post").ajaxForm({
                                beforeSend:function() {
                                    $('#output').html("<img src='public/loadings/Spinner-1.7s-271px.gif' style='text-align:center;width:100px'/>");
                                    $('.progress-bar').width('0%');
                                },uploadProgress: function(event, position, total, percentageComplete){
                                    $('.progress-bar').animate({
                                        width: percentageComplete + '%'
                                    }, {
                                        duration: 100
                                    });
                                },success:function(data) {
                                    $('.progress-bar').width('100%');
                                    $('#output').html(data);
                                    
                                }
                            });
                        });
                        $(".btn_show_comments").click(function(){
                            var cid = $(this).attr("data-id");
                            $("#"+cid).toggle(500);
                            console.log(cid);
                        });
            });


            document.addEventListener("DOMContentLoaded", function() {

                var p1 = document.querySelector("#slide-to-down"),
                tab = document.querySelector("#tab-down"),
                startingY,tc;
                
                p1.addEventListener('touchstart', (e)=>{
                    startingY = e.touches[0].clientY;

                    // console.log(startingY);
                });
                p1.addEventListener('touchmove', (e)=>{
                    var touche = e.touches[0];
                    var change = Math.abs(startingY - touche.clientY);
                    tc = (90 * window.innerHeight) / 100;
                    var percentage = Math.floor((change * 100) / Math.floor(tc));
                    tab.style.top = percentage + '%';
                    e.preventDefault();
                });
                p1.addEventListener('touchend', (e)=>{
                    var tous = e.changedTouches[0];
                    var change = Math.abs(startingY - tous.clientY);
                    var the3ofsc = tc / 4;
                    if(change > the3ofsc){
                        tab.style.top = '100%';
                        tab.style.opacity = '0';
                        tab.style.transition = 'all .3s';
                        $("body").css("overflow", "auto");
                    }else{
                        tab.style.top = '0%';
                        tab.style.transition = 'all .3s';
                        
                    }


                });
                // p1.addEventListener('mousedown', (e)=>{
                //     console.log(e.clientY);
                // });
                
            });

        </script>
