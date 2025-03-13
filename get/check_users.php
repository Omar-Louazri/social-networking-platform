<?php
require_once '../controllerUserData.php';
if (isset($_POST['post'])) {
    $name = mysqli_real_escape_string($con,$_POST['value']);

    $conn = new mysqli('localhost', 'root', '', 'userform');
    $query = "SELECT `name` FROM `usertable` WHERE `name` LIKE '%$name%'";

    if($sql = $conn->query($query)) {
        if ($sql->num_rows > 0) {
            exit("taken");
        } else{
            exit('');
        }
    }
}


?>