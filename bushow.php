<?php
include("function.php"); 
$obj = new busapp();
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
  <link rel="stylesheet" href="style/bushowstyle.css">
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><i class="fab fa-amazon fa-3x text-dark "></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      <div class="signinsignup text-center">
        <a class="btn signninbtn px-3 py-2" href="signinsignup.php">JOIN US !</a>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

  <div class="container mt-5">
    <form action="bushow.php" method="POST">
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-2">
          <input class="form-control" type="text" name="fromroute" id="fromroute" placeholder="From">
        </div>
        <div class="col-lg-3 col-sm-6  mb-2">
          <input class="form-control" type="text" name="toroute" id="toroute" placeholder="To">
        </div>
        <div class="col-lg-3 col-sm-6  mb-2">
          <input class="form-control" type="text" name="dateroute" id="dateroute" placeholder="  Date"
            onfocus="(this.type='date')">
        </div>
        <div class="col-lg-3 col-sm-6  mb-2">
          <input type="submit" name="submit" id="submit" value="SEARCH" class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>


  <div class="container-fluid bg-light p-4 mt-5">
    <?php if($result1->num_rows > 0)
              {
                $row=mysqli_fetch_assoc($result1);
                ?>

    <h4> <?php echo  $row['from_route'] ?> <small>to</small> <?php echo $row['to_route'] ?> </h4>
    <b class="bold"><?php echo $row['bus_date'] ?> </b>

    <?php }
              
              else
              {?>
    <h4>no data found</h4>
    <?php  
              }?>
  </div>


  <?php 
      if($result->num_rows > 0)
      {
        while($row=mysqli_fetch_assoc($result))
        { ?>


  <div class="container rounded p-3 mt-3">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 d-flex align-items-center">
        <img class="rounded" src="admin/upload/<?php echo $row['picture'];?>" alt="" width="100%">
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12 ">
        <h3><?php echo $row['bus_name']?></h3>

        <?php 
        $busid = $row['bus_id'];
        $result2 = $obj->priceshow("SELECT * FROM bus_inside WHERE bus_id=$busid");
        $row2=mysqli_fetch_assoc($result2);
        ?>

        <strong>Type: <small><?php echo $row['bus_type']?></small> </strong><br>
        <strong>Departure Time: <small><?php echo $row['departure']?></small> </strong><br>
        <strong>Arrival Time: <small><?php echo $row['arrival']?></small> </strong><br>
        <strong>Seat Capacity: <small>32</small></strong>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-end justify-content-end">
        <div class="d-flex align-items-center flex-column">
          <h5><?php echo $row2['price']?> TK</h5>
          <button class="btn btn-danger">View Seats</button>
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




  <?php include_once("includes/script.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/date.js" ></script>
  <script src="autocompleteajax.js"></script>

</body>

</html>