<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="img/images.png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="login">
    <div class="container">
        <div class="row tm-register-row tm-mb-35">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-l">
                <form action="login.php" method="post" class="tm-bg-black p-5 h-100">
                    <div class="input-field">
                        <input placeholder="Your Email" id="username" name="email" type="text" class="validate">
                    </div>
                    <div class="input-field mb-5">
                        <input placeholder="Password" id="password" name="password" type="password" class="validate">
                    </div>
                    <div class="tm-flex-lr">
                        <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">Login</button>
                    </div><br/>
                    <a href="sign.php">Create Account</a>
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

</html>
