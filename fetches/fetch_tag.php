<?php
include_once '../controllerUserData.php';
//fetch.php;

$p = (int)$_POST['post'];

if (isset($p) && isset($_SESSION['uid'])) {
    if ($p == 1) {
        $key = mysqli_real_escape_string($con, htmlspecialchars($_POST['query']));
        $conn = new mysqli('localhost', 'root', '', 'userform');

        if (empty($key)) {
            $query = "SELECT `name`,`uid`,`ubadge` FROM `usertable` INNER JOIN `usfol_tab` ON `usfol_tab`.`uid_notb` = `usertable`.`uid` WHERE `usfol_tab`.`uid_benef` = '$_SESSION[uid]' ORDER BY `ubadge` DESC LIMIT 10;";

        if($sql = $conn->query($query)) {
            if ($sql->num_rows > 0) {
                $i = 1;
                $lop = array();

                while ($data = $sql->fetch_assoc()) {

                    $lop[] = array('id' => "$i", 'name' => "$data[name]", 'avatar' => get_img_us($data['uid'], $conn), 'info' => 'a', 'href' => "@$data[name]");
                    $i++;
                }



                echo json_encode($lop);
                exit();
            } 
        }else {
            exit("No user to show");
        }
        } else {
            $query = "SELECT 
                            `usfol_tab`.*,
                             `usertable`.`name`,`usertable`.`ubadge`
                      FROM `usfol_tab` 
                      INNER JOIN `usertable` 
                      WHERE `usfol_tab`.`uid_benef` = '$_SESSION[uid]' 
                      AND `usfol_tab`.`uid_notb` = `usertable`.`uid` 
                      AND `usertable`.`name` LIKE '%$key%' ORDER BY `ubadge` DESC LIMIT 10; ";
            if($sql = $conn->query($query)) {
                if ($sql->num_rows > 0) {
                        if ($sql->num_rows < 1) {
                            $query = "SELECT `uid`,`name` FROM `usertable` WHERE `name` LIKE '%$key%' ORDER BY `ubadge` DESC LIMIT 10; ";
                            $sql = $conn->query($query);
                            if ($sql->num_rows > 0) {
                                $i = 1;
                                $lop = array();
                                while ($data = $sql->fetch_assoc()) {
                                    $lop[] = array('id' => "$i", 'name' => "$data[name]", 'avatar' => get_img_us($data['uid'], $conn), 'info' => 'a', 'href' => "@$data[name]");
                                    $i++;
                                }
                                echo json_encode($lop);
                                exit();
                            } else {
                                exit();
                            }
                        } else {
                            $i = 1;
                            $lop = array();

                            while ($data = $sql->fetch_assoc()) {

                                $lop[] = array('id' => "$i", 'name' => "$data[name]", 'avatar' => get_img_us($data['uid_notb'], $conn), 'info' => 'a', 'href' => "@$data[name]");
                                $i++;
                            }
                            echo json_encode($lop);
                            exit();
                        }


                    
                    } else {
                        $query = "SELECT `uid`,`name` FROM `usertable` WHERE `name` LIKE '%$key%' ORDER BY `ubadge` DESC LIMIT 10; ";
                                $sql = $conn->query($query);
                                if ($sql->num_rows > 0) {
                                    $i = 1;
                                    $lop = array();
                                    while ($data = $sql->fetch_assoc()) {
                                        $lop[] = array('id' => "$i", 'name' => "$data[name]", 'avatar' => get_img_us($data['uid'], $conn), 'info' => 'a', 'href' => "@$data[name]");
                                        $i++;
                                    }
                                    echo json_encode($lop);
                                    exit();
                                } else {
                                    exit();
                                }
                    }
                } else {
                    exit('');
                }
        }
    } else {
        exit();
    }
} else {
}
