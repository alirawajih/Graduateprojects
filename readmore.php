<html>
<head>
<link rel="icon" type="image/png" href="img/images.png">

  <title>Read More</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
 .bg {
  background-image: url("img/img_mountains_wide.jpg");
  height: 300px; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
img {
  float: left;
  border-radius: 25px;
  border: 2px solid #73AD21;
}
p{
    margin: left 100px;
}
</style>
<body>
<?php Include "navigation.php"; ?>
<div class="bg"></div><br/>
<div class="container">
  <div class="row">
      <?php 
        Include "inc/inc.php";

        $tripId = $_GET['tripId'];

        $query = mysqli_query($conn,"SELECT * FROM `trips` WHERE `tripId` = '$tripId'");

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <p style="margin: left 100px;"> <img src="dashboard/pages/<?php echo $row['Media']; ?>" alt="Pineapple">  &nbsp; &nbsp; &nbsp;<?php echo $row['TripDescription']; ?></p>
                <?php
            }
        }
      ?>
  </div><br/>
</div>
<?php Include "Footer.php"; ?>
</body>
</html>