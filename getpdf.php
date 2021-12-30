<?php 
include("function.php");
$objindex = new busapp();
session_start();
if(isset($_SESSION['busname']))
{
  $busname = $_SESSION['busname'];
  $username = $_SESSION['username'];
  $boardingpoint=$_SESSION['boarding'];
  $seatnumber=$_SESSION['seatnumber'];
  $price=$_SESSION['price'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ticket pdf</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once("includes/link.php"); ?>
    <link rel="stylesheet" href="style/getpdf.css">
  </head>
  <body>

  <div class="container mt-5">
    <button class="btn" onclick=print()>Print</button>
      <div class="row">
        <div class="col">
          <img style="width:150px" src="image/logo black.png" alt="">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
        <h4 class="header">bus ticket</h4>
        </div>
      </div>
      <div class="row">
          <table class="table">
            <tbody class="p-5">
              <tr>
                <th scope="row">Customer User Name</th>
                <td><?php echo $username ?></td>
              </tr>
              <tr>
                <th scope="row">Bus Name</th>
                <td><?php echo $busname ?></td>
              </tr>
              <tr>
                <th scope="row">Boarding Point</th>
                <td><?php echo $boardingpoint ?></td>
              </tr>
              <tr>
                <th scope="row">Seat Number</th>
                <td><?php echo $seatnumber ?></td>
              </tr>
              <tr>
                <th scope="row">Amount</th>
                <td><?php echo $price ?></td>
              </tr>
            </tbody>
          </table>
      </div>

      <footer>
        <div class="row">
          <div class="col-12 tag"><h4> <span style='font-size:25px;'>&#9996;</span> Happy Journey <span style='font-size:25px;'>&#9996;</span></h4></div>
          <div class="col-12">
            <h5>© 2021 MyWay. All rights reserved. Design and Developed by <a style="color:#e7e7e7" ;
            href="https://github.com/tanmoy108" target="_blank">shtanmoy</a></h5>
          </div>
        </div>
      </footer>
  </div>

  <script>
var mywindow = window.open("", ...);
mywindow.document.write("...");
mywindow.document.close();
setTimeout(function() {
  mywindow.print();
  mywindow.close();
}, 10);
  </script>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>