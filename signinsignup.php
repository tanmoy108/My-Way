<?php

include("function.php");
$objlogin = new busapp();

if(isset($_POST['signupbtn']))
{
    $rtndata = $objlogin->adduser($_POST);
}

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
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="style/siginsignup.css">

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

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="post" class="sign-in-form">
                    <h2 class="title">SIGN IN</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" name="emailsignin" id="emailsignin" >
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="passwordsignin" id="passwordsignin">
                    </div>
                    <input type="submit" value="Login" name="signinbtn" id="signinbtn" class="btn solid">
                    <?php 
                        if(isset($rtnlogindata))
                        { ?>
                            <p class="errormsg" ><?php echo($rtnlogindata); ?></p>
                            <?php
                        }

                    ?>
                    <p class="social-text">Or Sign in with social platform</p>
                    <div class="social-media">
                        <!-- <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a> -->
                        <a href="#" class="social-icon"> <i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"> <i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"> <i class="fab fa-linkedin-in"></i></a>
                    </div>
                </form>

                <form action="" method="post" class="sign-up-form">
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

                    <h2 class="title">SIGN UP</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" id="username"  pattern="[a-z0-9]{5,}" title="five or more characters" required >
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please type valid email" required >
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                    </div>
                    <button name="signupbtn" id="signupbtn" class="btn solid">Sign Up</button>
                    <p class="social-text">Or Sign up with social platform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"> <i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"> <i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"> <i class="fab fa-linkedin-in"></i></a>
                    </div>
                </form>
            </div>

        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem deserunt dolorum voluptates.</p>
                    <button class="btn transparent" id="sign-up-btn">SIGN UP</button>
                </div>
                <a href="index.php"><img src="image/img1.svg" class="image" alt=""></a>
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have a account?</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem deserunt dolorum voluptates.</p>
                    <button class="btn transparent" id="sign-in-btn">SIGN IN</button>
                </div>
                <a href="index.php"><img src="image/img2.svg" class="image" alt=""></a>
            </div>

        </div>
    </div>
    <!-- <script src="js/firebaseauth.js"></script> -->
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
    <script src="js/signinsignup.js"></script>
</body>

</html>