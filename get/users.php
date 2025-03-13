<?php
    require '../controllerUserData.php';
	if (isset($_POST['getdata'])) {
		$conn = new mysqli('localhost', 'root', '', 'userform');


//         $queryss = "SELECT  `pst_hash`,`p_gender`
//         FROM  `whole_posts_users`
// INNER JOIN `usfol_tab`
//         WHERE `p_privacy` = 1 AND
//   `usfol_tab`.`ee`='$_SESSION[uid]' AND `uid_benef` = `whole_posts_users`.`uid_author` ORDER BY `whole_posts_users`.`date_p` DESC LIMIT $start, $limit"; #SELECT `uid_notb` FROM `usfol_tab` WHERE `usfol_tab`.uid_benef = '$_SESSION[uid]'
//																																	


		$query =   "SELECT `uid`,`name` FROM `usertable` WHERE `uid` 
					NOT IN ( 
							SELECT `uid_benef` FROM `usfol_tab` WHERE `usfol_tab`.uid_notb = '$_SESSION[uid]'
								) 
					AND `usertable`.`uid` != '$_SESSION[uid]'  
					ORDER BY `usertable`.`ubadge` DESC LIMIT 15";#--LIMIT $start, $limit


		if($sql = $conn->query($query)){
			if ($sql->num_rows > 0) {
				$response = "";
				$i = 0;
				while($data = $sql->fetch_assoc()) {
					$val =  get_pro_fol($data["name"], $data["uid"], $i);
				   
					
	
	
					// $val = get_gen_of_psts($data['p_gender'], $data['pst_hash']);
					$response .= "$val";
				   
					$i++;
				}
	
				exit($response);
			} else{
				exit('reachedMax');
			}
		}else{
			echo "No user to show";
		}
		
	}



	


?>