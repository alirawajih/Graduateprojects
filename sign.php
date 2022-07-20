<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="img/images.png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Tooplate</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="register">
    <div class="container">
        <div class="row">
            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form action="" method="post" class="tm-signup-form">
                    <div class="input-field">
                        <input placeholder="Enter First Name" id="firstname" name="firstname" type="text" class="validate" required>
                    </div>
                    <div class="input-field">
                        <input placeholder="Enter Last Name" id="lastname" name="lastname" type="text" class="validate" required>
                    </div>
                    <div class="input-field">
                        <input placeholder="Enter Your Password" id="pass" name="pass" type="password" class="validate" required>
                    </div>                    
                    <div class="input-field">
                        <input placeholder="Enter Your Email" id="email" name="email" type="email" class="validate" required>
                    </div>
                    <div class="input-field">
                        <input placeholder="Enter Your Phone Number" id="phone" name="phone" type="tel" class="validate" required>
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" name="submit" id="submit" class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0">Sign Up</button>
                    </div>                  
                    <?php
                        Include './inc/inc.php';
                        $firstname=$_POST['firstname'];
                        $lastname=$_POST['lastname'];
                        $email=$_POST['email'];
                        $pass=$_POST['pass'];
                        $fainalpass=md5($pass);
                        $phone=$_POST['phone'];

                        if (isset($_POST['submit'])){
                            $sql = mysqli_query($conn,"INSERT INTO `regist` (firstname,lastname,phone,email,pass)
                            VALUES('$firstname','$lastname', '$phone','$email','$fainalpass')");
                            
                            if($sql == true){
                                ?>
                                <script>
                                    alert("Successfully");
                                    window.location.href="log.php";
                                </script>
                                <?php
                            }
                            }
                        ?>
                        <div align="center">
                    <a href="hom.php" align="center">Go To Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>
