<?php
$passw="test";
$pass=password_hash($passw,PASSWORD_DEFAULT);
if(password_verify($passw,$pass)){
    
    echo"good";

}else{
    echo"no";
}



?>
