<?php
include("function.php");
$object = new busapp();

session_start();
if(isset($_SESSION['id']))
{
  $uid = $_SESSION['id'];
  $uname = $_SESSION['username'];
}

if(isset($_GET['status']))
    {
        if($_GET['status']='viewseats')
        {
            $busid = $_GET['id'];
            $returnvalue=$object->view_seats($busid);
        }
    }
    if(isset($uid)!= null)
    {
        if(isset($_POST['submit']))
        {
            $return = $object->add_seat($_POST);
            
        }
    }
    else
    { ?>
<script>
alert("Sign in first");
</script>
<?php }

if(isset($_GET['userlogout']))
    {
        if($_GET['userlogout']=='logout')
        {
          $object->user_logout();
        }
    }
  ?>
<script>
//resubmission problem solution
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href)
}
</script>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <?php include_once("includes/link.php"); ?>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/viewseats.css">

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


  <?php
    if(isset($returnvalue))
    {
        $row = mysqli_fetch_assoc($returnvalue);
    }
    ?>
  <!-- form start -->
  <form action="" method="POST" class="seatform">
    <input name="busidno" id="busidno" type="hidden" value="<?php echo $row['bus_id'] ?>">
    <input name="busnames" id="busnames" type="hidden" value="<?php echo $row['bus_name'] ?>">
    <input name="seatnumber" id="seatnumber" type="hidden" value="<?php echo $row['seatsize'] ?>">
    <input name="price" id="price" type="hidden" value="<?php echo $row['price'] ?>">
    <?php
        if(isset($uid))
        {?>
    <input name="useridno" id="useridno" type="hidden" value="<?php echo $uid ?>">
    <input name="usernames" id="usernames" type="hidden" value="<?php echo $uname ?>">
    <?php }
        ?>

    <?php
        $bid = $row['bus_id'];
        $testype_name = $object->displayseat($bid);
        $boarding = $object->boardingpoint($bid);
        ?>
    <!-- form fill up stat ........ -->
    <div class="container inputform ">
      <div class="row">
        <h4>Ticket Booking</h4>
      </div>
      <?php if(isset($return))
        {
            echo "Success";
        } ?>
      <div id="msg" name="msg"></div>
      <p>Bus Name: </p>
      <input class="form-control disabled" type="text" value="<?php echo $row['bus_name'] ?>" readonly="readonly" required >
      <p>Customer User Name: </p>
      <?php
            if(isset($uid))
            {?>
      <input class="form-control disabled" type="text" value="<?php echo $uname ?>" disabled required >
      <?php }
            else
            { ?>
      <input class="form-control" type="text" value="Sign In First" disabled>
      <?php }
            ?>
      <p>Ticket no: </p>
      <input class="form-control" type="text" name="seatno" id="seatno" readonly="readonly" required >
      <p>Amount:</p>
      <input class="form-control" type="text" name="seatamount" id="seatamount" readonly="readonly" required>
      <p>Boarding Point:</p>
      <select class="form-control" id="busboarding" name="busboarding" required>
        <?php
              while($point = mysqli_fetch_assoc($boarding))
            { ?>
        <option> <?php echo $point['boarding_pnt'];?> </option>
        <?php }
            ?>

        <!-- form fillup end -->

        <!-- <p>Extra:</p> -->
        <input type="hidden" name="seatnoe" id="seatnoe">
    </div>
    <div class="container">
      <!-- show seat ...... -->
      <div class="row" id="maindiv" name="maindiv">
      </div>
      <!-- show seat end ....... -->
      <button class="btn submitbtn " name="submit" id="submit"><b>GET TICKET</b></button><br><br>
      <!-- ------display from seat database------ -->
      <!-- <p> display from seat no1</p> -->
      <?php
            if(isset($testype_name)){
            $name = mysqli_fetch_assoc($testype_name);
            if(isset($name['bus_id']) == null )
            { ?>
      <input placeholder="amount1 display seat" type="hidden" name="amount1" id="amount1" value="0">
      <input placeholder="no1 display seat" type="hidden" name="no1" id="no1" value="0">
      <h5>All seat are available</h5>
      <?php }
           else {
            ?>
      <input placeholder="amount1 display seat" type="hidden" name="amount1" id="amount1"
        value="<?php echo $name['amount']; ?>">
      <input placeholder="no1 display seat" type="hidden" name="no1" id="no1" value="<?php echo $name['seatnoextra']?>">

      <h5> Booked seat no: <?php echo $name['seatnoextra']?> [You can't booked this seats] </h5>

      <?php }} ?>
    </div>
  </form>
  <!-- form end ...... -->

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
  <script src="js/viewseats.js"></script>
</body>

</html>