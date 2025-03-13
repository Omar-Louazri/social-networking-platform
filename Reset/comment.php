<?php

function CheckData($name_invalid, $inva){

        

    if(preg_match("/;/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ; ) '.$inva.'</p>';
    }elseif(preg_match("/</", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( < ) '.$inva.'</p>';
    }elseif(preg_match("/>/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( > ) '.$inva.'</p>';
    }elseif(preg_match("/:/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( : ) '.$inva.'</p>';
    }elseif(preg_match("/,/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( , ) '.$inva.'</p>';
    }elseif(preg_match("/-/", $name_invalid)){       
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( - ) '.$inva.'</p>';
    }elseif(preg_match("/`/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ` ) '.$inva.'</p>';
    }elseif(preg_match("/\(/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong>  [ ( ]  '.$inva.'</p>';
    }elseif(preg_match("/\)/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> [ ) ] '.$inva.'</p>';
    }elseif(preg_match("/&/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( & ) '.$inva.'</p>';
    }elseif(preg_match("/'/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( \' ) '.$inva.'</p>';
    }elseif(preg_match("/\"/", $name_invalid)){ 
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( " ) '.$inva.'</p>';
    }elseif(preg_match("/#/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( # ) '.$inva.'</p>';
    }elseif(preg_match("/\//", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( / ) '.$inva.'</p>';
    }elseif(preg_match("/=/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( = ) '.$inva.'</p>';
    }elseif(preg_match("/\*/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( * ) '.$inva.'</p>';
    }elseif(preg_match("/!/", $name_invalid)){
        return  '<p class="alert alert-danger"style="font-size:18px;"><strong>INVALID</strong> ( ! ) '.$inva.'</p>';
    }else{

    }
}
if(isset($_POST['submit'])){
    

    //START FUNCTION HERE

        
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        if(CheckData($name, "name")){

            echo CheckData($name, "name");

        }elseif(CheckData($comment, " In You comment")){

            echo CheckData($comment, " In You comment");

        }else{
            echo '<h1 style="text-align:center; color:lightgreen;">Successfully fucked up</h1>';
            echo $name.'<br>';
            echo $comment;
        }
    
}else{
    return "there is nothing";
}


?>