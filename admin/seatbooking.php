<?php
    include("../function.php");
    $objbooking  = new busapp();

    session_start();
    $id = $_SESSION['adminid'];
    $name = $_SESSION['adminname'];
    if($id == null)
    {
        header("location:../admin.php");
    }
    if(isset($_GET['status']))
    {
        if($_GET['status']='booking')
        {
            $busid = $_GET['id'];
            $recvdata=$objbooking->show_bus_id($busid);
        }
    }
    if(isset($_POST['submit']))
    {
      $objbooking->add_price($_POST);
      $objbooking->add_boarding($_POST);
    }

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <?php include_once("../includes/link.php"); ?>
  <link rel="stylesheet" href="../adminstyle/seatbooking.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
  <div class="button">
    <a href="dashcondition.php"><i class="fa-2x fas fa-arrow-left"></i> </a>
  </div>
  <div class="body">
    <div class="row mainbox">
      <div class="col-lg-6 col-md-4">
        <img src="upload/<?php echo $recvdata['picture'];?>" alt="">
        <div class="info mt-3">
          <p> <strong>Name:</strong> <?php echo $recvdata['bus_name']; ?> (<?php echo $recvdata['bus_type']; ?>)</p>
          <p> <strong>Destination:</strong> <?php echo $recvdata['from_route']; ?> to
            <?php echo $recvdata['to_route']; ?></p>
          <p> <strong>Date :</strong> <?php echo $recvdata['bus_date']; ?></p>
          <p> <strong>Departure Time:</strong> <?php echo $recvdata['departure']; ?></p>
          <p> <strong>Arrival Time:</strong> <?php echo $recvdata['arrival']; ?></p>
        </div>

      </div>
      <div class="col-lg-6 col-md-8">
        <div class="box">
          <Form class="forminput" name="add_info" id="add_info" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $recvdata['bus_id']; ?>">
            <input type="hidden" name="bus_name" id="bus_name" value="<?php echo $recvdata['bus_name']; ?>">
            <label for=""> <strong>Seat number:</strong></label>
            <input class="form-control mb-3" type="number" name="seatnumber" id="seatnumber" placeholder="Enter Seat Number"
              pattern="[0-9]" required>
            <label for=""> <strong>Seat Price:</strong></label>
            <input class="form-control mb-3" type="number" name="price" id="price" placeholder="Enter Price"
              pattern="[0-9]" required>
            <label for=""> <strong>Boarding Point:</strong></label>
            <div class="boarding" id="dynamic_field">
              <div class="row mb-3">
                <div class="col-9">
                  <input type="text" name="name[]" placeholder="Boarding Point Name:" class="form-control address_list"
                    required />
                </div>
                <div class="col-3">
                  <button type="button" name="add" id="add" class="btn btn-success"><i
                      class="fas fa-plus-circle"></i></button>
                </div>
              </div>
            </div>
            <input type="submit" name="submit" id="submit" class="btn" value="SUBMIT" />
          </Form>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../adminjs/seatbooking.js"></script>
</body>

</html>