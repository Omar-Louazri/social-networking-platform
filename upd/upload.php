<?php
	include '../controllerUserData.php';
	check_sess('../Login');
if(isset($_POST['image']))
{
	$data				= trim($_POST['image']);

	if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {




		$data = substr($data, strpos($data, ',') + 1);
		$type = strtolower(end($type)); // jpg, png, gif
	
		if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
			throw new \Exception('invalid image type');
			exit();
		}else{
			
			$size_in_bytes = (int) (strlen(rtrim($data, '=')) * 3 / 4);
			$size_in_kb    = (int) ($size_in_bytes / 1024);

			if($size_in_kb < 1700){
				$data = str_replace( ' ', '+', $data );		
				$data = base64_decode($data);
			
				if ($data === false) {
					throw new \Exception('base64_decode failed');
					exit();
				}else{
					$new_name = substr(uniqid(md5(time()) ,false), 25) . '.' . $type;
					$y = date('Y');
					$m = date('m');
					$d = date('d');
					$path_im = '../../sub/form/assets/avatars/';
					$img_curr_path = $path_im.$y.'/'.$m.'/'.$d.'/';
					$db_dir = $y.'/'.$m.'/'.$d.'/'.$new_name;

					if (!file_exists($img_curr_path)) {
						mkdir($img_curr_path, 0777, true);
					}


					file_put_contents($img_curr_path.$new_name, $data, FILE_APPEND | LOCK_EX);
					$sql = "UPDATE `bycrypt` SET `u_img`='assets/avatars/$db_dir' WHERE `uid` = '$_SESSION[uid]';";
					if($res = mysqli_query($con, $sql)){
						//check file
						$data = [
							'success'=>true,
							'uploaded'=>'100%',
							'hashed'=>'yes',
							'boh'=>'h.probably'
						];
						header('Content-Type: application/json');
						echo json_encode($data);
						exit;
					}
					// exit();
				}
			}else{
				// throw new \Exception('Large file failed');
				echo('Try a Tiny Image (less than 1.5 mb) ');
			}
			
		}
			
	} else {
		throw new \Exception('did not match data URI with image data');
		exit();
	}
	
	
}else{
	exit();
}

?>