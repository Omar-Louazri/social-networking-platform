
<?php
//index.php
include '../controllerUserData.php';
check_sess("../Login");


// echo date('D, d M Y H:i:s');
?>



	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<link rel="stylesheet" href="./style.css">


		<title>Upload profile image area</title>
	</head>
	<body>
		<div class="container" align="center">
			<br />
			<h3 align="center">Crop Image Before Upload </h3>
			<br />
			<div class="row">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4">
				<a href="../" class="btn btn-block btn-danger">Back</a><br>
					<div class="image_area">
						<form method="POST">
							<label for="upload_image">
								<img src="<?php echo '../'. get_img_us($_SESSION['uid'],$con);?>" id="uploaded_image" class="img-responsive img-circle" />
								<div class="overlay">
									<div class="text">Click to Change Profile Image</div>
								</div>
								<input type="file" name="image" class="image" id="upload_image" style="display:none" />
							</label>
						</form>
	





			    </div>
    		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
										<div class="div_" style="max-height: 100%; max-width:100%;">
											<img src="" id="sample_image" />
										</div>
			                    		
			                		</div>
			                		<div class="col-md-4">
										
											<div class="preview"></div>
											<div class="circle-border">
										</div>
			                		</div>
			            		</div>
			        		</div>
							<br>
							<div class="progress">
								<div class="progress-bar" id="uploadProgressBar" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<br>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" id="crop" class="btn btn-primary">Crop</button>
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      		</div>
			    	</div>
			  	</div>
			</div>			
		</div>
	</body>
</html>
<script src="../js/dropzone.js"></script>
<script src="../js/cropper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<script>

	$(document).ready(function(){
		
		var $modal = $('#modal');
		var image = document.getElementById('sample_image');
		var cropper;
		function arrayCompare(a1, a2) {
			if (a1.length != a2.length) return false;
			var length = a2.length;
			for (var i = 0; i < length; i++) {
				if (a1[i] !== a2[i]) return false;
			}
			return true;
		}

		function inArray(needle, haystack) {
			var length = haystack.length;
			for(var i = 0; i < length; i++) {
				if(typeof haystack[i] == 'object') {
					if(arrayCompare(haystack[i], needle)) return true;
				} else {
					if(haystack[i] == needle) return true;
				}
			}
			return false;
		}

		$('#upload_image').change(function(event){
			var files = event.target.files,
				lgn,ext;
			var done = function(url){
				lgn = Math.floor(files[0].name.split('.').length - 1);
				ext = files[0].name.split('.')[lgn];
				let arr = ['png','jpg','jpeg','gif'];
				if(inArray(ext, arr)){
					image.src = url;
					$modal.modal('show');
				}else{
					console.log("SOMETHING WENT WRONG");
				}
				
			};
			if(files && files.length > 0)
			{
				reader = new FileReader();
				reader.onload = function(event)
				{
					done(reader.result);
				};
				reader.readAsDataURL(files[0]);
			}
		});
		$modal.on('shown.bs.modal', function() {
			cropper = new Cropper(image, {
				aspectRatio: 1,
				viewMode: 3,
				preview:'.preview',
				autoCropArea: 1
			});
		}).on('hidden.bs.modal', function(){
			cropper.destroy();
			cropper = null;
		});
		$('#crop').click(function(){
			canvas = cropper.getCroppedCanvas({
					width:600,
					height:600
			});
			canvas.toBlob(function(blob){
				url = URL.createObjectURL(blob);
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function(event){
					$('#crop').prop('disabled', true);
					var base64data = reader.result;
					function uploadProgressHandler(event) {
						var percent = (event.loaded / event.total) * 100;
						var progress = Math.round(percent);

						$("#uploadProgressBar").text(progress + "%");
						$("#uploadProgressBar").attr('aria-valuenow', progress);
						$("#uploadProgressBar").css("width", progress + "%");
						$("#status").html(progress + "% uploaded... please wait");
					}
					function loadHandler(event) {
						$("#uploaded_image").attr("src", base64data);
						
						setTimeout(function(){ 
							$modal.modal('hide'); 
							$('#crop').prop('disabled', false);
						}, 1000);

					}

					function errorHandler(event) {
						$("#status").html("Upload Failed");
					}

					function abortHandler(event) {
						$("#status").html("Upload Aborted");
					}

					
					$.ajax({
						url:'upload.php',
						method: 'POST',
						dataType: "json",
						data: {
							image:base64data,
							csrf:"0879872",
							captcha:"784356738"
						},
						xhr: function () {
							var xhr = new window.XMLHttpRequest();
							xhr.upload.addEventListener("progress",uploadProgressHandler,false);
							xhr.addEventListener("load", loadHandler, false);
							xhr.addEventListener("error", errorHandler, false);
							xhr.addEventListener("abort", abortHandler, false);

							return xhr;
						}
					});


				};
			});

		});
	});
</script>



