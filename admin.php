<?php
include("function.php");

$objadmindata = new busapp();

if(isset($_POST['adminbutton']))
{
    $objadmindata->admin_login($_POST);
}
    session_start();
    if(isset( $_SESSION['adminid']))
    {
        $id = $_SESSION['adminid'];
    }
    
    if(isset($id))
    {
        header("location:admin/dashcondition.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <?php include_once("includes/link.php"); ?>
    <link rel="stylesheet" href="adminstyle/adminlogin.css">
</head>

<body>
    <div class="admin">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
            <a class="navbar-brand pl-3 " href="index.php"><i class="fab fa-amazon fa-3x text-light "></i></a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="loginright">
               <div class="header">
                    <h3>Admin Login</h3>
                    <small>Don't share this link</small>
                </div>
                <form action="" method="post" class="formadmin">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="admin_email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="admin_password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <div class="submitbtn">
                        <button type="submit" name="adminbutton" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
    <?php include_once("includes/script.php"); ?>
</body>

</html>