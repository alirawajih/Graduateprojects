<?php session_start(); ?>
<html>
<head>
<link rel="icon" type="image/png" href="img/images.png">

  <title>Welcome <?php echo $_SESSION["loggeduser"]; ?></title>
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
</style>
<body>
<?php 
if(!isset($_SESSION['loggeduser'])){
  ?>
  <script>
    window.location.href="log.php";
  </script>
  <?php
}
?>
<?php Include "navigation.php"; ?>
<div class="bg"></div><br/>
<div class="container">
    <h1 align="center">Profile</h1>

  <form method="Post">
  <?php
  Include "inc/inc.php";

  $query = mysqli_query($conn,"SELECT * FROM `regist` WHERE `email` = '$_SESSION[loggeduser]'");

  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
      ?>

            <div class="form-group">
            <label for="email">First Name:</label>
              <input type="text" name="updateFirstName" class="form-control" value="<?php echo $row['firstname']; ?>">
            </div>
            <div class="form-group">
            <label for="email">Last Name:</label>
              <input type="text" name="updateLastName" class="form-control" value="<?php echo $row['lastname']; ?>">
            </div>
            <div class="form-group">
            <label for="email">Phone Number:</label>
              <input type="tel" name="updatePhone" class="form-control" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="form-group">
            <label for="email">Email Address:</label>
              <input type="email" name="updateEmail" class="form-control" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
            <label for="email">Password:</label>
              <input type="password" name="updatePassword" class="form-control" placeholder="Enter Your Password">
            </div>

            <button type="submit" name="Update" class="btn btn-default">Update</button>
            <?php 
            if(isset($_POST['Update'])){
                Include "inc/inc.php";

                $updateFirstName = $_POST['updateFirstName'];
                $updateLastName = $_POST['updateLastName'];
                $updatePhone = $_POST['updatePhone'];
                $updateEmail = $_POST['updateEmail'];
                $updatePassword = $_POST['updatePassword'];
                $md5 = md5($updatePassword);

                $Update = mysqli_query($conn,"UPDATE `regist` SET `firstname` = '$updateFirstName', `lastname` = '$updateLastName', `phone` = '$updatePhone', `email` = '$updateEmail', `pass` = '$md5'");

                if($Update == true)
                {
                    ?>
                    <script>
                        alert("Edited in success");
                        window.location.href="Profile.php";
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Please Try Again");
                    </script>
                    <?php
                }
            }
            ?>
      <?php
    }
  }
  ?>
  </form>
  
</div>

</body>
</html>