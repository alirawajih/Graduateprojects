<?php 
session_start();
Include "inc/inc.php";

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["tripId"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			        =>	$_GET["tripId"],
				'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
				'item_subcatagoryname'		=>	$_POST["hidden_subCatagoryName"],
				'item_title'			    =>	$_POST["hidden_Title"],
                'item_tripdescription'	    =>	$_POST["hidden_TripDescription"],
				'item_triprice'			    =>	$_POST["hidden_TripPrice"],
				'item_quantity'		        =>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			        =>	$_GET["tripId"],
				'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
				'item_subcatagoryname'		=>	$_POST["hidden_subCatagoryName"],
				'item_title'			    =>	$_POST["hidden_Title"],
                'item_tripdescription'		=>	$_POST["hidden_TripDescription"],
				'item_triprice'			    =>	$_POST["hidden_TripPrice"],
				'item_quantity'		        =>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
	}
	else
	{
		$item_array = array(
      'item_id'			            =>	$_GET["tripId"],
      'item_catagoryname'			=>	$_POST["hidden_CatagoryName"],
      'item_subcatagoryname'		=>	$_POST["hidden_subCatagoryName"],
      'item_title'			        =>	$_POST["hidden_Title"],
      'item_tripdescription'		=>	$_POST["hidden_TripDescription"],
      'item_triprice'			    =>	$_POST["hidden_TripPrice"],
      'item_quantity'		        =>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
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

  <title>Cart</title>
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
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
}
</style>
<body style="background-color:#ADD8E6">
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
                <form Method="Post">

                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                        ?>
                        <tr>
                                <td>
                                <div class="media">
                                <div class="media-body">
                                    <p><?php echo $values["item_title"]; ?></p>
                                </div>
                                </div>
                                </td>
                                <td>
                                <div class="media">
                                <div class="media-body">
                                    <p><?php echo $values["item_tripdescription"]; ?></p>
                                </div>
                                </div>
                                </td>
                                <td>
                                    <h5>JD <?php echo $values["item_triprice"]; ?></h5>
                                </td>
                                <td>
                                    <input class="form-control" style="color:#FFFFFF" type="number" name="quantity" value="<?php echo $values["item_quantity"]; ?>" min="1" max="10">
                                </td>
                                <td>
                                    <h5><?php echo number_format($values["item_quantity"] * $values["item_triprice"], 2);?></h5>
                                </td>
                                <td>
                                    <h5><a href="Cart.php?action=delete&tripId=<?php echo $values["item_id"]; ?>" class="btn btn-danger">Delete</a></h5>
                                </td>
                            </tr>                            
                        </tr>
                        <?php
                               $total = $total + ($values["item_quantity"] * $values["item_triprice"]);
                            }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td>JD <?php echo number_format($total, 2); ?></td>
                            <td></td>
					    </tr>
                        <?php
                        
                        }
                        ?>
                            <tr class="bottom_button">
                                <td>
                                <div class="shipping_box">
                                        <?php Include "inc/inc.php";
                                        
                                        $query = mysqli_query($conn,"SELECT * FROM `regist` WHERE `email` = '$_SESSION[loggeduser]'");

                                        if(mysqli_num_rows($query) > 0){
                                            while($r = mysqli_fetch_array($query)){
                                                ?>
                                                   <input type="hidden" name="firstname" value="<?php echo $r['firstname']; ?>">
                                                   <input type="hidden" name="lastname" value="<?php echo $r['lastname']; ?>">
                                                   <input type="hidden" name="phone" value="<?php echo $r['phone']; ?>">
                                                <?php
                                            }
                                        }
                                        ?>
                                <div>
                                    Your Trip Type
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="TripType" id="inlineRadio1" value="With Group" required>
                                <label class="form-check-label" for="inlineRadio1">With Group</label>
                                <input class="form-check-input" type="radio" name="TripType" id="inlineRadio1" value="Private">
                                <label class="form-check-label" for="inlineRadio1">Private</label>
                                </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                <input type="submit" name="CheckOut" value="CheckOut" class="btn btn-success">
                                </td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                        if(isset($_POST['CheckOut'])){
                            if(!isset($_SESSION['loggeduser'])){
                                ?>
                                    <script>
                                        alert("Please Must Your LogIn");
                                        window.location.href="log.php";
                                    </script>
                                <?php
                            }else{
                                ?>
                                <td>
                                    <div class="shipping_box">
                                        <?php 

                                        if(isset($_POST['CheckOut'])){
                                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                                            {
                                            $lastname = $_POST['lastname'];
                                            $firstname = $_POST['firstname'];
                                            $phone = $_POST['phone'];

                                            $quantity = $_POST['quantity'];
                                            $values["item_title"];
                                            $values["item_tripdescription"];
                                            $total = number_format($total, 2);
                                            $type = $_POST['TripType'];

                                            $Order = mysqli_query($conn,"INSERT INTO `reservations` (FirstName,LastName,phone,Title,Description,quantity,FinalAmount,Type) 
                                            VALUES ('$firstname','$lastname','$phone','$values[item_title]','$values[item_tripdescription]','$quantity','$values[item_triprice]','$type')");

                                            $Update = mysqli_query($conn,"UPDATE `trips` SET `QuantityAvailable` = `QuantityAvailable` - '$values[item_quantity]' WHERE `tripId` = '$values[item_id]'");

                                            unset($_SESSION["shopping_cart"]);

                                            if($Order == true){
                                                ?>
                                                <script>
                                                    alert("Success");
                                                    window.location.href="Cart.php";
                                                </script>
                                                <?php 
                                            }
                                        }
                                    }
                                        ?>
                                    </div>
                                </td>
                                    <?php
                            }
                        }
                    ?>
                    </from>
  </div>
</div>
<?php Include "Footer.php"; ?>
</body>
</html>