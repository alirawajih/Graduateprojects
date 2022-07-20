<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/images.png">

  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  </style>
</head>
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/Slider-01.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="img/Slider-02.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
        </div>      
      </div>
    
      <div class="item">
        <img src="img/Slider-03.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
  <h3>Our Team</h3>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Ali</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="img/avatar-3637425_960_720.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Name</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="img/avatar-3637425_960_720.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Name</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="img/avatar-3637425_960_720.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div class="bg-1">
  <div class="container">
    <h3 class="text-center">Our services</h3><br/>    
    <div class="row text-center">
        <?php 
            Include "inc/inc.php";

            $query = mysqli_query($conn,"SELECT * FROM `categories` GROUP BY `CatagoryName`");

            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-sm-4">
                        <div class="thumbnail">
                        <img src="dashboard/pages/<?php echo $row['Media']; ?>" alt="Paris" style="width:400px;height:200px">
                        <h1><?php echo $row['CatagoryName']; ?></h1>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
  </div>
</div>
<?php Include "Footer.php"; ?>

</body>
</html>
