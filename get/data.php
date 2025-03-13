<?php
    require '../controllerUserData.php';
	if (isset($_POST['getData'])) {
		$conn = new mysqli('localhost', 'root', '', 'userform');

		$start = (int)$_POST['start'];
		$limit = (int)$_POST['limit'];

//         $query = "SELECT  `pst_hash`,`p_gender`
//         FROM  `whole_posts_users`
// INNER JOIN `usfol_tab`
//         WHERE `p_privacy` = 1 AND
//   `usfol_tab`.`uid_notb`='$_SESSION[uid]' AND `uid_benef` = `whole_posts_users`.`uid_author` ORDER BY `whole_posts_users`.`date_p` DESC LIMIT $start, $limit";


/*         $query = "SELECT  `pst_hash`,`p_gender`
        FROM  `whole_posts_users`
INNER JOIN `usfol_tab`
        WHERE `p_privacy` = 1 AND
  `usfol_tab`.`uid_notb`='$_SESSION[uid]' AND `uid_benef` = `whole_posts_users`.`uid_author` ORDER BY `whole_posts_users`.`date_p` DESC LIMIT $start, $limit";

 */
 		$query  =  "SELECT  `pst_hash`,`p_gender`
        			FROM  `whole_posts_users`
					ORDER BY `whole_posts_users`.`date_p` 
					DESC LIMIT $start, $limit";
		$sql = $conn->query($query);
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_assoc()) {
                // $val =  '<br>'.$data["pst_hash"];
                $val = get_gen_of_psts($data['p_gender'], $data['pst_hash']);
                $response .= "<br>$val<br>";
               
				
			}

			exit($response);
		} else{
            exit('reachedMax');
        }
	}



	


?>