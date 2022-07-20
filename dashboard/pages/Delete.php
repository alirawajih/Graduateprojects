<?php 
    Include "../../inc/inc.php";

    $tripId = $_GET['tripId'];

    $query = mysqli_query($conn,"DELETE FROM `trips` WHERE tripId = '$tripId'");

    if($query == true){
        ?>
        <script>
            window.location.href="review.php";
        </script>
        <?php
    }
?>