<?php 
session_start();
Include "inc/inc.php";

if(isset($_POST["add_to_cart"]))
{
  $tripId = $_POST['tripId'];
  $quantity = $_POST['quantity'];

  $check = mysqli_query($conn,"SELECT * FROM `trips` WHERE `QuantityAvailable` < '$quantity' and `tripId` = '$tripId'");
  $res = mysqli_fetch_array($check);
  if($res == true){
    ?>
      <script>
        alert("The number of tickets available does not allow this");
      </script>
    <?php
  }
	elseif(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["tripId"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			          =>	$_GET["tripId"],
				'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
				'item_subcatagoryname'	=>	$_POST["hidden_subCatagoryName"],
				'item_title'			      =>	$_POST["hidden_Title"],
        'item_tripdescription'	=>	$_POST["hidden_TripDescription"],
				'item_triprice'			    =>	$_POST["hidden_TripPrice"],
				'item_quantity'		      =>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
      echo '<script>alert("success added item")</script>';
		}
		else
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			          =>	$_GET["tripId"],
				'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
				'item_subcatagoryname'	=>	$_POST["hidden_subCatagoryName"],
				'item_title'			      =>	$_POST["hidden_Title"],
        'item_tripdescription'	=>	$_POST["hidden_TripDescription"],
				'item_triprice'			    =>	$_POST["hidden_TripPrice"],
				'item_quantity'		      =>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
      echo '<script>alert("success added item")</script>';
		}
	}
	else
	{
		$item_array = array(
      'item_id'			          =>	$_GET["tripId"],
      'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
      'item_subcatagoryname'	=>	$_POST["hidden_subCatagoryName"],
      'item_title'			      =>	$_POST["hidden_Title"],
      'item_tripdescription'	=>	$_POST["hidden_TripDescription"],
      'item_triprice'			    =>	$_POST["hidden_TripPrice"],
      'item_quantity'		      =>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
    echo '<script>alert("success added item")</script>';
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["tripId"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="Cart.php"</script>';
			}
		}
	}
}
?>

<html>
<head>
<link rel="icon" type="image/png" href="img/images.png">

  <title>Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
 .bg {
  background-image: url("img/Slider-03.jpg");
  height: 300px; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
}
</style>
<body>
<?php 
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

  $subCatagoryName = $_GET['subCatagoryName'];
  $CatagoryName = $_GET['CatagoryName'];

  $query = mysqli_query($conn,"SELECT * FROM `trips` WHERE `CatagoryName` = '$CatagoryName' and `subCatagoryName` = '$subCatagoryName'");

  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
      ?>
  <form method="post" action="details.php?CatagoryName=<?php echo $row['CatagoryName']; ?>&subCatagoryName=<?php echo $row['subCatagoryName']; ?>&action=add&tripId=<?php echo $row["tripId"]; ?>">
  <div class="col-md-4">
          <div class="thumbnail">
              <img src="dashboard/pages/<?php echo $row['Media']; ?>" alt="Lights" style="width:350px;height:200px">
              <div class="caption">
                <h5 align="center" style="font-weight: bold;"><?php echo $row['Title']; ?></h5>
                <p align="center"><?php echo $first=substr($row['TripDescription'], 0,90); ?> <a style="color:#DC143C" href="readmore.php?tripId=<?php echo $row['tripId']; ?>">Read More</a></p>
                <div class="form-group">
									<p>Available: <input class="form-control" style="color:#FFFFFF" type="number" name="quantity" value="<?php echo $row['QuantityAvailable']; ?>" min="1" max="10"></p>
								</div>
                <div class="form-group">
									<p>Quantity: <input class="form-control" style="color:#FFFFFF" type="number" name="quantity" value="1" min="1" max="10"></p>
								</div>
                <p align="center" style="color:red"><?php echo $row['TripPrice']; ?> JD</p>
                <div class="center">
                <button type="submit" name="add_to_cart" class="btn btn-success">Add To Cart</button>
                </div>
              </div>
          </div>
  </div>
                <input type="hidden" name="hidden_CatagoryName" value="<?php echo $row["CatagoryName"]; ?>" />
								<input type="hidden" name="hidden_subCatagoryName" value="<?php echo $row["subCatagoryName"]; ?>" />
								<input type="hidden" name="hidden_Title" value="<?php echo $row["Title"]; ?>" />
								<input type="hidden" name="hidden_TripDescription" value="<?php echo $row["TripDescription"]; ?>" />
                <input type="hidden" name="hidden_TripPrice" value="<?php echo $row["TripPrice"]; ?>" />
								<input type="hidden" name="tripId" value="<?php echo $row["tripId"]; ?>" />
      </form>

      <?php
    }
  }
  ?>
  
  </div>
</div>
<?php Include "Footer.php"; ?>
</body>
</html>