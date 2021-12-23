<?php

include("function.php");
$objlogin = new busapp();

if(isset($_POST['signinbtn']))
{
$rtnlogindata = $objlogin->user_login($_POST);
}
session_start();
if(isset($_SESSION['id']))
{
  $uid = $_SESSION['id'];
}
if(isset($uid))
{
    header("location:index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Sign In</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="style/signupsignin.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- Fontawsome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body onload="myfunction()">
    <div id="loading"></div>
    <a href="index.php"><img class="m-3" style="width: 150px;" src="image/logo.png" alt=""></a>
    <div class="container-fluid image2">
        
        <div class="container rounded_box">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-uppercase text-white text-right">login</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col signinright">
                    <form action="" method="post">
                        <div class="form-group input-container mb-5">
                            <input class="form-control input_field" type="email" placeholder="Email Address" name="emailsignin" id="emailsignin">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form-group input-container mb-5">
                            <input class="form-control input_field" type="password" placeholder="Password"name="passwordsignin" id="passwordsignin">
                            <i class="fas fa-lock"></i>
                        </div>

                        <input style="height:44px; border-radius: 49px;padding:0" type="submit" value="Login" name="signinbtn" id="signinbtn" class="btn signinbtn">

                        <!-- <input type="submit" value="Login" name="signinbtn" id="signinbtn" class="btn solid signinbtn"> -->
                        <br><a class="mt-2" style="display: block;text-align: center;" href="signup.php">Not a member yet ?
                            Signup</a>
                        <?php 
                            if(isset($rtnlogindata))
                            { ?>
                                <p class="errormsg" ><?php echo($rtnlogindata); ?></p>
                                <?php
                            }
    
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
     <script>
        var preloader = document.getElementById("loading");

        function myfunction() {
            preloader.style.display = 'none';
        }
    </script>
<script>
    //resubmission problem solution
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>
    <!-- <script>
        document.getElementById("signupbtn").addEventListener("click", function (event) {
            event.preventDefault()
        });
    </script> -->
    <!-- <script src="js/signinsignup.js"></script> -->
</body>

</html>