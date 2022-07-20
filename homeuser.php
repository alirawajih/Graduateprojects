<?php
include'./inc/inc.php';
session_start();
if(!isset($_SESSION["loggeduser"])){
  header('location:log.php');

}
$msg="";
/*$sql = 'SELECT * FROM emag';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo'<pre>';
print_r($users);
echo'</pre>';*/
if (isset($_POST['submit'])){
$target = "win/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];

$sql = "INSERT INTO emag(images,name)
 VALUES('$image','$fname') ";
 mysqli_query($conn, $sql);
 /*if(move_uploaded_file($_FILES['image']['name'],$target)){
$msg="upload image successfully";
 }else{
  $msg="upload image not successfully";
 }*/
}

$namehotel=$_POST['hotelname'];
$rating=$_POST['rating'];
$locathion=$_POST['locathion'];
$explain=$_POST['explain'];
if(isset($_POST['addhotel'])){
  $sql = "INSERT INTO hotel(name,locathion,web,rating)
 VALUES('$namehotel','$locathion','$explain','$rating') ";
 if(empty(!$namehotel)){
 mysqli_query($conn, $sql);
 }
 
}
?>
<html>
<head>
 <center>Some departments and colleges in some universities to Jordan</center>

</head>

<body>
  <?php
  $email = $_SESSION["loggeduser"];
  $view = "SELECT * FROM regist WHERE email ='$email' ";
  $result = mysqli_query($conn,$view);
  if(!$result){
    echo"error:".mysqli_error($conn);
  }
  $row = mysqli_fetch_array($result);
  $firstname=$row['firstname'];
$lastname=$row['lastname'];
$phone=$row['phone'];

  ?>
  <h3> user profile</h3>
  <label>first name</label>
  <p><?php echo $firstname  ?></p>
  <label>last name</label>
  <p><?php echo $lastname  ?></p>
  <label>phone</label>
  <p><?php echo $phone  ?></p>
  <a href="logout.php" >Loginout</a>
  <br>
  <a href="sign.php" >to creat Account</a>
  

<form method="post" enctype="multipart/form-data">
<center>add hotel</center>

<div class="form-group">
   <input type="text" class="form-input" name="hotelname" id="hotelname" placeholder="hotelname" />
</div>
<div class="form-group">
 <input type="text" class="form-input" name="rating" id="rating" placeholder="rating" />
</div>
<div class="form-group">
 <input type="text" class="form-input" name="locathion" id="locathion" placeholder="locathion" />
</div>
<div class="form-group">
  <input type="text" class="form-input" name="explain" id="explain" placeholder="explain" />
</div>
<div class="form-group">
 <input type="submit" name="addhotel" id="addhotel" class="form-submit" value="addhotel" />
</div>
<?php
$sql = 'SELECT * FROM hotel';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo'<pre>';
print_r($users);
echo'</pre>';?>
</form>
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  <?php
$nameRestaurants=$_POST['Restaurantsname'];
$locathion_res=$_POST['locathion'];
$rat = $_POST['rat'];
$type = $_POST['type'];

  if(isset($_POST['addRestaurants'])){
    $sql = "INSERT INTO restaurants(name,locathion,rating,foodserved)  
   VALUES('$nameRestaurants','$locathion_res','$rat','$type') ";
   if(empty(!$nameRestaurants)){
   mysqli_query($conn, $sql);
   
     }}
?>
 <form method="post" enctype="multipart/form-data">
<center>add Restaurants</center>

<div class="form-group">
   <input type="text" class="form-input" name="Restaurantsname" id="Restaurantsname" placeholder="nameRestaurants" />
</div>
<div class="form-group">
   <input type="text" class="form-input" name="rat" id="rat" placeholder="rating" />
</div>
<div class="form-group">
   <input type="text" class="form-input" name="type" id="type" placeholder="The type of food served" />
</div>
<div class="form-group">
  <input type="text" class="form-input" name="locathion" id="locathion" placeholder="locathion" />
</div>
<div class="form-group">
 <input type="submit" name="addRestaurants" id="addRestaurants" class="form-submit" value="addRestaurants" />
</div>
<?php
$sql = 'SELECT * FROM restaurants';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo'<pre>';
print_r($users);
echo'</pre>';
?>
</form>
////////////////////////////////////////////////////////////////////
<?php
$namesuggestions=$_POST['namesuggestions'];
$locathion_sugg=$_POST['locathionsugg'];
$price = $_POST['price'];
$type_sugg = $_POST['Typesugg'];

  if(isset($_POST['suggestion'])){
    $sql = "INSERT INTO suggestion(name,locathion,price,Typeofsugges)  
   VALUES('$namesuggestions','$locathion_sugg','$price','$type_sugg') ";
 
   if(empty(!$namesuggestions)){
   mysqli_query($conn, $sql);
   
   
     }}

?>
  

<form method="post" enctype="multipart/form-data">
<center>Additional suggestions</center>
<div class="form-group">
   <input type="text" class="form-input" name="namesuggestions" id="suggestions" placeholder="suggestions" />
</div>
<div class="form-group">
 <input type="text" class="form-input" name="locathionsugg" id="locathionsugg" placeholder="locathion of suggestions" />
</div>
<div class="form-group">
  <input type="text" class="form-input" name="Typesugg" id="Typesugg" placeholder="Type of suggestions" />
</div>
</div>
<div class="form-group">
  <input type="text" class="form-input" name="price" id="price" placeholder="price in JD" />
</div>
<div class="form-group">
 <input type="submit" name="suggestion" id="addsuggestions" class="form-submit" value="addsuggestions" />
</div>
<?php
$sql = 'SELECT * FROM suggestion';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo'<pre>';
print_r($users);
echo'</pre>';
?>
  
</form> 
//////////////////////////////////////////////////////////////
<?php
$nametourist=$_POST['nametourist'];
$locathion_tour=$_POST['locathiontourist'];
$price_tour = $_POST['pricetour'];
$type_tour = $_POST['Typetour'];

  if(isset($_POST['tourist'])){
    $sql = "INSERT INTO tourist(name,locathion,price,Type)  
   VALUES('$nametourist','$locathion_tour','$price_tour','$type_tour') ";
 
   if(empty(!$nametourist)){
   mysqli_query($conn, $sql);
   
   
     }}

?>+
  

<form method="post" enctype="multipart/form-data">
<center>tourist sites</center>
<div class="form-group">
   <input type="text" class="form-input" name="nametourist" id="nametourist" placeholder="name tourist sites" />
</div>
<div class="form-group">
 <input type="text" class="form-input" name="locathiontourist" id="locathiontourist" placeholder="locathion of tourist" />
</div>
<div class="form-group">
  <input type="text" class="form-input" name="pricetour" id="price" placeholder="price in JD" />
</div>
<div class="form-group"> 
  <label for="Religious" class="radio-inline">
  <input type="radio" name="Typetour" value="Religious" id="Religious">Religious</label>    
  <label for="Medical" class="radio-inline">
    <input type="radio" name="Typetour" value="Medical" id="Medical">Medical</label>  
 <label for="heritage" class="radio-inline">
   <input type="radio" name="Typetour" value="heritage" id="heritage">heritage</label>
</div>
<div class="form-group">
 <input type="submit" name="tourist" id="addtourist" class="form-submit" value="add tourist" />
</div>
<?php
$sql = 'SELECT * FROM tourist ';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo'<pre>';
print_r($users);
echo'</pre>';
?>

/////////////////////////////////////
////////////////////////////////////
  <?php
if(isset($_POST["submit"])){
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false){
              $image = $_FILES['image']['tmp_name'];
              $imgContent = addslashes(file_get_contents($image));
              $fname = $_POST['fname'];
            $db = $conn;

        
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $dataTime = date("Y-m-d H:i:s");

            $insert = $db->query("INSERT into emag (image, created,name) VALUES ('$imgContent', '$dataTime','$fname')");
            if($insert){
                echo "File uploaded successfully.";
            }else{
                echo "File upload failed, please try again.";
            } 
        }else{
            echo "Please select an image file to upload.";
        }
    }
    ?>
    <br>
    <form action="home.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <table border="2">
    <tr>
      <td>Enter Name</td>
      <td><input type="text" name="fname" placeholder="Enter Name" Required></td>
    </tr>
    <tr>
      <td>Select Image</td>
      <td><input type="file" name="image" ></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Upload"></td>			
    </tr>
  </table>
        
    </form>
    
    
////////////////////////////
/////////////////////////
</body>
</html>