<?php
session_start();

Include './inc/inc.php';

$email = $_POST['email'];
$password = $_POST['password'];
$md5 = md5($password);

$query = mysqli_query($conn,"SELECT * FROM `regist` WHERE `email` ='".$email."' and `pass` ='".$md5."'");
$row = mysqli_fetch_array($query);

if($row > 0){
    $_SESSION['loggeduser'] = $email;
    header('Location: hom.php');
}else{
    ?>
    <script>
        alert("Please Try Again");
        window.location.href = "log.php";
    </script>
    <?php
}
?>