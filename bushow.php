<?php
include("function.php"); 
$obj = new busapp();

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
          $obj->user_logout();
        }
    }
if(isset($_POST['submit']))
{
    $frominfo = $_POST["fromroute"];
    $toinfo = $_POST["toroute"];
    $dateinfo =$_POST["dateroute"];
    $result1 = $obj->bushow("SELECT * FROM add_bus WHERE from_route ='$frominfo' AND to_route ='$toinfo' AND bus_date ='$dateinfo'");
    $result = $obj->bushow("SELECT * FROM add_bus WHERE from_route ='$frominfo' AND to_route ='$toinfo' AND bus_date ='$dateinfo'");
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Bus Show</title>
  <?php include_once("includes/link.php"); ?>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/bushowstyle.css">


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

  <!-- schedule start ................ -->
  <section class="busearch">
    <div class="container">
      <form action="bushow.php" method="POST" class="formschedule">
        <div class="row">
          <div class="col-lg-3 col-sm-6 mb-2">
            <input class="form-control" type="text" name="fromroute" id="fromroute" placeholder="From">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="col-lg-3 col-sm-6  mb-2">
            <input class="form-control" type="text" name="toroute" id="toroute" placeholder="To">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="col-lg-3 col-sm-6  mb-2">
            <input class="form-control" type="text" name="dateroute" id="dateroute" placeholder="  Date"
              onfocus="(this.type='date')">
            <i class="far fa-calendar-alt"></i>
          </div>
          <div class="col-lg-3 col-sm-6  mb-2 schbtn">
            <input type="submit" name="submit" id="submit" value="SEARCH" class="btn searchbtn">
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- schedule end ........... -->

  <!-- destination name start ...... -->
  <div class="container-fluid bg-light p-4 mt-5">
    <?php if($result1->num_rows > 0)
              {
                $row=mysqli_fetch_assoc($result1);
                ?>

    <h4 class="destinationame"> <?php echo  $row['from_route'] ?> <small>to</small> <?php echo $row['to_route'] ?> </h4>
    <b class="destinationdate"><?php echo $row['bus_date'] ?> </b>

    <?php }
              
              else
              {?>
    <h4 class="alert">Sorry, we didn't find any routes for your search.</h4>
    <?php  
              }?>
  </div>

  <!-- destination name end ...... -->
  <!-- bus show start ................. -->
  <?php 
      if($result->num_rows > 0)
      {
        while($row=mysqli_fetch_assoc($result))
        { ?>


  <div class="container roundedbox p-4 mt-3">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12 d-flex align-items-center my-2">
        <img class="rounded mb-3" src="admin/upload/<?php echo $row['picture'];?>" alt="" width="100%">
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12 info my-2 ">
        <h3><?php echo $row['bus_name']?></h3>

        <?php 
        $busid = $row['bus_id'];
        $result2 = $obj->priceshow("SELECT * FROM bus_inside WHERE bus_id=$busid");
        $row2 = mysqli_fetch_assoc($result2);
        ?>

        <strong>Type: <small><?php echo $row['bus_type']?></small> </strong><br>
        <strong>Departure Time: <small><?php echo $row['departure']?></small> </strong><br>
        <strong>Arrival Time: <small><?php echo $row['arrival']?></small> </strong><br>
        <?php if(isset($row2['seatsize']) && isset($row2['price'] )){ ?>
        <strong>Seat Capacity: <small><?php echo $row2['seatsize']?></small></strong>
      </div>
      <div class="col-lg-4 col-md-3 col-sm-12 d-flex align-items-end justify-content-end bottomedia my-2">
        <div class="d-flex align-items-center flex-column">
          <h5><?php echo $row2['price']?> TK</h5>
          <?php 
          } ?>
          <a class="btn seatbtn" href="viewseats.php?status=viewseats&&id=<?php echo $row2['bus_id']?>"
            target="_blank">View Seats</a>
        </div>
      </div>
    </div>
  </div>
  <?php 
          }
        }?>

  <div class="listcol" style="margin-top: -126px;margin-left: 210px;">
    <div class="list-group" id="show-list-from">
    </div>
  </div>
  <div class="listcol" style="margin-top: -126px;margin-left: 450px;">
    <div class="list-group" id="show-list-to">
    </div>
  </div>
  <!-- bus show end ................. -->

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

  <!-- external js -->
  <?php include_once("includes/script.php"); ?>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- date -->
  <script src="js/date.js"></script>
  <!-- external js -->
  <script src="autocompleteajax.js"></script>

</body>

</html>