<?php
    include_once './controllerUserData.php';
    $str = "@testit&#160;@Itsme_warrior&#160;@TheMarrior&#160;hello&#160;guys&#160;welcome&#160;back<br>";
    echo convert_post_to_clickable_profile($str);
?>