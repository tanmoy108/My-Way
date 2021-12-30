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
  <!-- navbar start .....................-->
  <nav class="navbar navbar-expand-md navbar-light fixed-top scroll-color">
    <a class="navbar-brand" href="#index"><img style="width:150px" ; src="image/logo black.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav mr-auto mx-auto text-center ">
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="#index">Home</a>
        </li>
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="#reviews">Reviews</a>
        </li>
        <li class="nav-item mx-4 my-2">
          <a class="nav-link text-uppercase font-weight-bold" href="team.php">Team</a>
        </li>
      </ul>
      <?php 
      
      if(isset($uid) == null)
        { ?>
      <div class="signinsignup text-center" id="hello">
        <a class="btn signninbtn px-3 py-2 my-2" href="signinsignup.php">JOIN US !</a>
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


  <!-- welcome part start -->
  <section class="container-fluid image" id="index">
    <div class="container">
      <div class="row welcome">
        <div class="col-lg-6 col-md-7 col-sm-6 indexleft">
          <div class="box">
            <h1>Plan Your Trip <br> Book With us</h1>
            <p>MyWay is a premium online booking portal which allows you to purchase tickets for various bus services,
              launch services, movies and events across the country.
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
            <p class="card-text">You have choose a location where you will visit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box2 mx-auto"><i class="far fa-calendar-alt fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Pick-up date</h4>
            <p class="card-text">Then pick up a date when you will visit that location</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box3 mx-auto"><i class="fas fa-address-book fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Book your bus</h4>
            <p class="card-text">By pressing Search button select the bus you like </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
          <div class="box4 mx-auto"><i class="far fa-credit-card fa-2x"></i></div>
          <div class="card-body text-center ">
            <h4 class="card-title">Online Payment</h4>
            <p class="card-text">At last confirm your ticket through payment</p>
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
  <!-- Description end -->

  <!-- customer reviews start -->
  <section class="slider mt-5" id="reviews">
    <div class="swiper mySwiper">
      <h5 class="text-center mb-5 customer-reviews">Customer Reviews</h5>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="testimonialbox">
            <img src="image/right-quote.png" alt="quote" class="quote">
            <div class="content">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos quidem recusandae possimus rerum non
              perferendis, repellendus quas at fugiat eligendi, alias modi commodi neque error aliquid
              <div class="details">
                <div class="img-box">
                  <img src="image/tanmoy1.jpg" alt="">
                </div>
                <h3>Sh Tanmoy<br> <span>Web Designer</span> </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonialbox">
            <img src="image/right-quote.png" alt="quote" class="quote">
            <div class="content">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos quidem recusandae possimus rerum non
              perferendis, repellendus quas at fugiat eligendi, alias modi commodi neque error aliquid
              <div class="details">
                <div class="img-box">
                  <img src="image/tawfique.jpg" alt="">
                </div>
                <h3>Tawfique<br> <span>Web Designer</span> </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonialbox">
            <img src="image/right-quote.png" alt="quote" class="quote">
            <div class="content">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos quidem recusandae possimus rerum non
              perferendis, repellendus quas at fugiat eligendi, alias modi commodi neque error aliquid
              <div class="details">
                <div class="img-box">
                  <img src="image/siam.jpeg" alt="">
                </div>
                <h3>Siam<br> <span>Web Developer</span> </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- customer reviews end -->

  <!-- connter start............... -->

  <div class=" container counter-up my-5">
    <div class="row content">
      <div class=" col-lg-4 col-md-4 col-sm-12 box">
        <div class="icon"><i class="fas fa-ticket-alt fa-3x"></i></div>
        <div class="count">1000</div>
        <div class="text">Ticket Available Per Day</div>
      </div>
      <div class=" col-lg-4 col-md-4 col-sm-12 box">
        <div class="icon"><i class="fas fa-map-marker-alt fa-3x"></i></div>
        <div class="count">60</div>
        <div class="text">Districts Covered</div>
      </div>
      <div class=" col-lg-4 col-md-4 col-sm-12 box">
        <div class="icon"><i class="fas fa-users fa-3x"></i></div>
        <div class="count">500</div>
        <div class="text">Happy Customers</div>
      </div>
    </div>
  </div>

  <!-- counter end .....................-->

  <!-- footer start..................... -->
  <Footer>
    <div class="container-fluid footer py-5">
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

  <!--link start-->
  <?php include_once("includes/script.php"); ?>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- dynamic date -->
  <script src="js/date.js"></script>

  <!-- swiper js-->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    loop: true,
  });
  </script>

  <!-- waypoint jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"
    integrity="sha512-oy0NXKQt2trzxMo6JXDYvDcqNJRQPnL56ABDoPdC+vsIOJnU+OLuc3QP3TJAnsNKXUXVpit5xRYKTiij3ov9Qg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- counter up -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
    integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
  $('.count').counterUp({
    delay: 10,
    time: 2000
  });
  </script>

  <!-- external js -->
  <script src="js/autocompleteajax.js"></script>


</body>

</html>