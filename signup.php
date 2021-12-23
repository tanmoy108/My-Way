<?php

include("function.php");
$objlogin = new busapp();

if(isset($_POST['signupbtn']))
{
    $rtndata = $objlogin->adduser($_POST);
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
    <title>Sign Up</title>
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
        <script src="js/sweetalert.min.js"></script>
</head>

<body onload="myfunction()">
    <div id="loading"></div>
   <a href="index.php"><img class="m-3" style="width: 150px;" src="image/logo.png" alt=""></a>
    <div class="container-fluid image2">
        <div class="container rounded_box">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-uppercase text-white text-right">signup</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col signinright">
                    <form  action="" method="post" class="sign-up-form">
                        <?php 
                    if(isset($rtndata))
                    {
                        ?>
                    <script>
                        swal({
                            title: "<?php echo "$rtndata";?>",
                            icon: "success",
                            button: "ok",
                        });
                        
                    </script>
                    <?php
                    }
                    ?>

                        <div class="form-group input-container mb-5">
                            <input type="text" class="form-control input_field" placeholder="Username" name="username" id="username"  pattern="[a-z0-9]{5,}" title="five or more characters" required >
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group input-container mb-5">
                            <input type="email"
                            class="form-control input_field" placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please type valid email" required >
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form-group input-container mb-5">

                            <input type="password" class="form-control input_field" placeholder="Password" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                            <i class="fas fa-lock"></i>
                        </div>
                        <button name="signupbtn" id="signupbtn" class="btn solid signinbtn">Sign Up</button>
                        <!-- <a class="btn solid signinbtn" href="#"
                        name="signupbtn" id="signupbtn"
                        >SIGN UP</a> -->
                        <br><a class="mt-2" style="display: block;text-align: center;" href="signin.php">Already Have an account ?
                            Signin</a>
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