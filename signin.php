<!doctype html>
<html lang="en">

<head>
    <title>Sign In</title>
    <?php include_once("includes/link.php"); ?>
        <!-- External CSS -->
        <link rel="stylesheet" href="style.css">
</head>

<body onload="myfunction()">
    <div id="loading"></div>
    <div class="container-fluid image2">
        <div class="container rounded_box">
            <div class="row">
                <div class="col">
                    <h2 class="text-uppercase display-4 text-center">login</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 col-sm-12 signinleft">
                    <img src="image/secure_login.svg" alt="signin">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12  signinright">
                    <form action="">
                        <div class="form-group input-container mb-5">
                            <input class="form-control input_field" type="email" placeholder="Email Address">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form-group input-container mb-5">
                            <input class="form-control input_field" type="password" placeholder="Password">
                            <i class="fas fa-lock"></i>
                        </div>
                        <a class="btn signinbtn" href="#">SIGN IN</a>
                        <br><a class="mt-2" style="display: block;text-align: center;" href="signup.html">Not a member yet ?
                            Signup</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="index.php">home</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include_once("includes/script.php"); ?>
    <script>
        var preloader = document.getElementById("loading");

        function myfunction() {
            preloader.style.display = 'none';
        }
    </script>
</body>

</html>