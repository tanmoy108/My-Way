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
  <title>MY WAY</title>
  <?php include_once("includes/link.php"); ?>
  <!-- External CSS -->
  <link rel="stylesheet" href="style/style.css">
</head>

<body onload="myfunction()">

  <div id="loading">

  </div>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top scroll-color">
    <a class="navbar-brand" href="index.php"><i class="fab fa-amazon fa-3x text-dark "></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav mr-auto mx-auto text-center ">
        <li class="nav-item mx-4">
          <a class="nav-link text-uppercase font-weight-bold" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-uppercase font-weight-bold" href="#">Blog</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-uppercase font-weight-bold" href="team.php">Team</a>
        </li>
      </ul>
      <?php 
      
      if(isset($uid) == null)
        { ?>
          <div class="signinsignup text-center" id="hello">
            <a class="btn signninbtn px-3 py-2" href="signinsignup.php">JOIN US !</a>
          </div>
      <?php         
        }
        else{ ?>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
         <?php echo($uname); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="?userlogout=logout">Logout</a>
        </div>
      </div>
      <?php
        }

?>

    </div>
  </nav>
  <!-- end of navbar -->


  <!-- welcome part start -->
  <section class="container-fluid image">
    <div class="container">
      <div class="row welcome">
        <div class="col-lg-6 col-md-7 col-sm-6 indexleft">
          <div class="box">
            <h1>Plan Your Trip <br> Book With us</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis nesciunt aut sit at
              maxime ducimus cumque non doloribus vero consectetur
            </p>
            <img src="image/store.png" alt="" style="width: 60%;">
          </div>
        </div>
        <div class="col-lg-6 col-md-5 col-sm-6 indexright">
          <img src="image/busimg.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- welcome part end -->

  <!-- schedule part start -->
  <section class="container">
    <form action="bushow.php" method="POST">
      <div class="row">
        <div class="col">
          <div class="schedulebox px-2">
            <div class="row scheduleinner">
              <div class="col-lg-3 col-sm-6 col-xs-12">

                <div class="form-group">
                  <input class="form-control" type="text" name="fromroute" id="fromroute" placeholder="  From">
                  <i class="fas fa-map-marker-alt"></i>
                </div>

              </div>
              <div class="col-lg-3 col-sm-6  col-xs-12">

                <div class="form-group">
                  <input class="form-control" type="text" name="toroute" id="toroute" placeholder="  To">
                  <i class="fas fa-map-marker-alt"></i>
                </div>

              </div>
              <div class="col-lg-3 col-sm-6 col-xs-12">

                <div class="form-group">
                  <input class="form-control" type="text" name="dateroute" id="dateroute" placeholder="  Date"
                    onfocus="(this.type='date')">
                  <i class="far fa-calendar-alt"></i>
                </div>

              </div>
              <div class="col-lg-3 col-sm-6  col-xs-12">

                <div class="form-group">
                  <input class="form-control" type="text" placeholder="  Return Date(optional)" disabled
                    onfocus="(this.type='date')">
                  <i class="far fa-calendar-alt"></i>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class=" col-12 schdulebutton mb-5">
          <!-- <a class="btn p-3" href="#"><i class="fas fa-search px-1"></i>SEARCH</a> -->
          <input type="submit" name="submit" id="submit" value="SEARCH" class="btn">
        </div>
      </div>
    </form>
  </section>

  <div class="listcol" style="margin-top: -126px;margin-left: 210px;">
    <div class="list-group" id="show-list-from">
    </div>
  </div>
  <div class="listcol" style="margin-top: -126px;margin-left: 450px;">
    <div class="list-group" id="show-list-to">
    </div>
  </div>

  <!-- schedule part end -->

  <!-- Description start -->
  <section class="container description">
    <h5 class="text-center">HOW IT WORKS</h5>
    <h3 class="text-center">Myway following 4 working Steps</h3>
    <div class="row mt-5">
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box1 mx-auto"><i class="fas fa-map-marker-alt fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Choose a location</h4>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box2 mx-auto"><i class="far fa-calendar-alt fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Pick-up date</h4>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box3 mx-auto"><i class="fas fa-address-book fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Book your bus</h4>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box4 mx-auto"><i class="far fa-credit-card fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Online Payment</h4>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section>

    <div class="animationbox">

      <div class="anibox"></div>
      <div class="anibox"></div>
      <div class="anibox"></div>
      <div class="anibox"></div>
      <div class="anibox"></div>

    </div>

  </section>
  <a href="admin.php">admin</a>
  <a href="admin/sidemenu.php">sidem</a>

  <!-- Description end -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include_once("includes/script.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/date.js"></script>
  <script src="js/autocompleteajax.js"></script>

 

</body>

</html>