<?php 
Include "../../files/connected.php";
$id = $_GET['t_id'];

$query = mysqli_query($conn,"UPDATE `trips` SET `status` = 'unAvailable' WHERE `t_id` = '$id'");

if($query == true){
    ?>
    <script>
        window.location = "user.php";
    </script>
    <?php
}else
{
    ?>
    <script>
        alert("There was a problem, please try again later");
    </script>
    <?php 
}
?>