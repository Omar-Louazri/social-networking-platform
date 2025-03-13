<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>


<!DOCTYPE html>
 <html>
 <head>
  <title>Document</title>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/jquery_1.7.js"></script> 
    <script src="js/malshup_vr.js"></script> 
 
 </head>
 <body>
  <div class="container">
   <br />
   <h3 style="text-align:center;">Ajax File Upload Progress Bar using PHP JQuery</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading"><b>Ajax File Upload Progress Bar using PHP JQuery</b></div>
    <div class="panel-body">
     <form id="uploadImage" action="upload.php" method="post">
      <div class="form-group">
       <label>File Upload</label>
       <input type="file" name="uploadFile" id="uploadFile" enctype="multipart/form-data" />
      </div>
      <div class="form-group">
       <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
      </div>
      <div class="progress">
       <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div id="targetLayer" style="display:none;"></div>
     </form>
     <div id="loader-icon" style="display:none;"><img src="public/loadings/Spinner-1.7s-271px.gif" /></div>
    </div>
   </div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){
 $('#uploadImage').submit(function(event){
        if($('#uploadFile').val()){

        event.preventDefault();
        $('#loader-icon').show();
        $('#targetLayer').hide();
        $(this).ajaxSubmit({

            target: '#targetLayer',
                beforeSubmit:function(){
                    $('.progress-bar').width('0%');
                },
                uploadProgress: function(event, position, total, percentageComplete){
                    $('.progress-bar').animate({
                        width: percentageComplete + '%'
                    }, {
                        duration: 1000
                    });
                },success:function(){
                    $('#loader-icon').hide();
                    $('#targetLayer').show();
            },
            resetForm: true
        });
        }
        return false;
 });
});
</script>





