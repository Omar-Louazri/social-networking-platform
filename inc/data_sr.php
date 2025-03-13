<script>
$(document).ready(function () {
    
    var start = 0;
    var limit = 10;
    var reachedMax = false;

    

    getUsers();
    getData();
        $(window).scroll(function () {
            if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
                if(reachedMax == false){
                    // follow users here
                    

                }else{
                    var y = $(window).scrollTop();
                    $(window).scrollTop(y-1000);
                    // console.log(reachedMax);
                }
                
            }
        });
    function getData() {
        $.ajax({
            url: './get/data.php',
            type: 'POST',
            method: 'POST',
            dataType: 'text',
            cache:false,
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            beforeSend: function (){
                $('.loader_posts').fadeIn(200);
            },success: function(response) {
                
                if (response == "reachedMax"){
                    reachedMax = true;
                    // console.log(response);
                    $('.loader_posts').fadeOut(200);
                }else {
                    var y = $(window).scrollTop();
                    start += limit;
                    $('.loader_posts').fadeOut(200);
                    $(window).scrollTop(y-250);
                    $(".results").append(response);

                    

                }
            }
        });

        if (reachedMax){
            return; 
        }
           
    }
    var load_s = 0;
    var load_bn = 10;
    var reached_Max = false;

    function getUsers(){
        $.ajax({
            url: './get/users.php',
            type: 'POST',
            method: 'POST',
            dataType: 'text',
            cache:false,
            data: {
                getdata: 1,
                load_s: load_s,
                load_bn: load_bn
            },
            beforeSend: function (){
                $('.loader_posts').fadeIn(200);
            },success: function(response) {
                
                if (response == "reachedMax"){
                    reached_Max = true;
                    console.log(response);
                    $('.loader_posts').fadeOut(200);
                }else {
                    $('.loader_posts').fadeOut(200);
                    load_s += load_bn;
                    $("#tab_f").append(response);
                    var url = "js/drag.js";
                    $.getScript(url);
                }
            }
        });
    }


    
});
</script>