<?php
include("function.php");
$objindex = new busapp();
session_start();
if(isset($_SESSION['id']))
{
  $uid = $_SESSION['id'];
  $uname = $_SESSION['username'];
}

if(isset($_GET['userlogout']))
    {
        if($_GET['userlogout']=='logout')
        {
          $objindex->user_logout();
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Team</title>
  <?php include_once("includes/link.php"); ?>
  <!-- External CSS -->
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/team.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top scroll-color">
    <a class="navbar-brand" href="index.php"><img style="width:150px" ; src="image/logo black.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav mr-auto mx-auto text-center ">
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="index.php">Reviews</a>
        </li>
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="team.php">Team</a>
        </li>
      </ul>
      <?php 
      
      if(isset($uid) == null)
        { ?>
      <div class="signinsignup text-center" id="hello">
        <a class="btn signninbtn px-3 py-2 my-2" href="signin.php">JOIN US !</a>
      </div>
      <?php         
        }
        else{ ?>
      <div class="dropdown">
        <button class="btn dropdown-toggle my-2" type="button" id="dropdownMenuButton"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img style="width:30px" src="image/usericon.png" alt="usericon"> <?php echo($uname); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="?userlogout=logout">Logout</a>
        </div>
      </div>
      <?php
      }?>
    </div>
  </nav>
  <!-- end of navbar -->
  
<!-- team start ................ -->

  <section class="container team">
    <h3 class="h3">Our Team</h3>
    <p class="p">Coming together is a beginning. Keeping together is progress. Working together is success.</p>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="teamcard">
          <div class="teamimgbox one">
            <div class="teamimage"></div>
          </div>
          <div class="teamcontent">
            <h3>Tanmoy Sharma</h3>
            <b>Web Designer & Web Developer</b>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, dolore.</p>
            <div class="div">
              <a href="https://www.facebook.com/shtanmoy108/" target="_blank"><i
                  class="fab fa-facebook-square fa-2x mx-2"></i></a>
              <a href="https://www.behance.net/tanmoy46" target="_blank"><i class="fab fa-behance fa-2x mx-2"></i></a>
              <a href="https://github.com/tanmoy108" target="_blank"><i class="fab fa-github fa-2x mx-2"></i></a>
              <a href="https://www.instagram.com/shtanmoy108/" target="_blank"><i
                  class="fab fa-instagram-square fa-2x mx-2"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="teamcard">
          <div class="teamimgbox two">
            <div class="teamimage"></div>
          </div>
          <div class="teamcontent">
            <h3>John Doe</h3>
            <b>Web Developer</b>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, dolore.</p>
            <div class="div">
              <a href="#"><i class="fab fa-facebook-square fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-behance fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-github fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-instagram-square fa-2x mx-2"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="teamcard">
          <div class="teamimgbox three">
            <div class="teamimage"></div>
          </div>
          <div class="teamcontent">
            <h3>Mack Henry</h3>
            <b>Seo Specialist</b>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, dolore.</p>
            <div class="div">
              <a href="#"><i class="fab fa-facebook-square fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-behance fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-github fa-2x mx-2"></i></a>
              <a href="#"><i class="fab fa-instagram-square fa-2x mx-2"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- team end ............. -->

  <!-- footer start..................... -->
  <Footer>
    <div class="container-fluid footer mt-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <img style="width: 150px;" src="image/logo.png" alt="">
            <p>MyWay is a premium online booking portal which allows you to purchase tickets for various bus
              services, launch services, movies and events across the country.</p>
          </div>
          <div class="col-lg-4">
            <h3>Company Info</h3>
            <ul class="list-group">
              <li class="list-group-item">Terms & Conditions</li>
              <li class="list-group-item">FAQ</li>
              <li class="list-group-item">Privacy Policy</li>
              <li class="list-group-item">How To Buy Tickets</li>
            </ul>
          </div>
          <div class="col-lg-4 about">
            <h3>About MyWay</h3>
            <ul class="list-group">
              <li class="list-group-item">About us</li>
              <li class="list-group-item">Contact us</li>
              <li>
                <div class="icon">
                  <i class="fab fa-facebook-square fa-2x mx-2"></i>
                  <i class="fab fa-twitter fa-2x mx-2"></i>
                  <i class="fab fa-google fa-2x mx-2"></i>
                  <i class="fab fa-pinterest fa-2x mx-2"></i>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </Footer>
  <div class="container-fluid">
    <div class="row lastpart">
      <h4>© 2021 MyWay. All rights reserved. Design and Developed by <a style="color:#e7e7e7" ;
          href="https://github.com/tanmoy108" target="_blank">shtanmoy</a></h4>
    </div>
  </div>
  <!-- footer end ...................... -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include_once("includes/script.php"); ?>
</body>

</html>