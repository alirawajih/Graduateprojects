<html>
<head>
<link rel="icon" type="image/png" href="img/images.png">
  <title>Tourism</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
 .bg {
  background-image: url("img/Slider-02.jpg");
  height: 300px; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<body>


<?php 
session_start();
if(!isset($_SESSION['loggeduser'])){
  ?>
  <?php Include "headerIn.php"; ?>
  <?php
}else{
  ?>
  <?php Include "navigation.php"; ?>
  <?php
}
?>
<div class="bg"></div><br/>
<div class="container">
  <div class="row">

  <?php
  Include "inc/inc.php";

  $CatagoryName = $_GET['CatagoryName'];

  $query = mysqli_query($conn,"SELECT * FROM `trips` WHERE `CatagoryName` = '$CatagoryName' GROUP BY `subCatagoryName`");

  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
      ?>

    <div class="col-md-4">
      <div class="thumbnail">
        <a href="details.php?CatagoryName=<?php echo $row['CatagoryName']; ?>&subCatagoryName=<?php echo $row['subCatagoryName']; ?>">
          <img src="dashboard/pages/<?php echo $row['Media']; ?>" alt="Lights" style="width:350px;height:200px">
          <div class="caption">
            <h1 align="center"><?php echo $row['subCatagoryName']; ?></h1>
          </div>
        </a>
      </div>
    </div>

      <?php
    }
  }
  ?>
  
  </div>
</div>
<?php Include "Footer.php"; ?>
</body>
</html>