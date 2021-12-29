<?php
    include("../function.php");
    $objsidemenu = new busapp();
    session_start();
    $id = $_SESSION['adminid'];
    $name = $_SESSION['adminname'];
    if($id == null)
    {
        header("location:../admin.php");
    }

    if(isset($_GET['adminlogout']))
    {
        if($_GET['adminlogout']=='logout')
        {
            $objsidemenu->admin_logout();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"> -->
    <!-- <link rel="stylesheet" href="../adminstyle/sidemenu.css"> -->
    <?php include_once("../includes/link.php"); ?>
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Lato", sans-serif;
        }

        #mainbox {
            font-size: 1em;
            cursor: pointer;
            transition: all .6s;
            display: inline;
            margin-left: 300px;
        }

        .sidemenu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 300px;
            background-color: #222;
            z-index: 1;
            padding-top: 100px;
            margin-right: 40px;
            transition: all .5s;
            overflow-x: hidden;
        }

        .sidemenu .circle {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            margin-left: 100px;
            margin-bottom: 50px;
            background: url(../image/tanmoy.png);
            background-position: center;
            background-size: cover;
        }

        .sidemenu h3 {
            text-align: center;
            color: rgb(209, 207, 207);
            letter-spacing: 3px;
            font-size:20px;
        }

        .sidemenu a {
            text-decoration: none;
            font-size: 16px;
            color: rgb(143, 141, 141);
            display: block;
        }

        .sidemenu .link {
            text-align: center;
            padding-top: 15px;
            padding-bottom: 15px;

        }

        .sidemenu .link:hover {
            color: white;
            background-color: rgba(82, 82, 82, 0.39);
            text-decoration: none;
        }

        .sidemenu .closebutton {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 32px;
            cursor: pointer;
        }

        .sidemenu .closebutton:hover {
            text-decoration: none;
            color: #FE6B32;
        }
    </style>
</head>

<body>
    <div id="mainbox" onclick="openfunction()">&#9776;open</div>
    <div>
        <?php 
    
    if(isset($view))
    {
        if($view == "dashboard")
        {
            include("dashboard.php");
        }
        else if($view == "ticket")
        {
            include("ticket.php");
        }
        else if($view == "customer")
        {
            include("customer.php");
        }
    }  
    ?>
    </div>
    <div id="menu" class="sidemenu">
        <div class="circle"></div>
        <h3><?php echo($name); ?></h3>
        <a href="dashcondition.php" class="link">Bus</a>
        <a href="ticketcondition.php" class="link">Ticket</a>
        <a href="customercondition.php" class="link">Customer</a>
        <a href="?adminlogout=logout" class="link">Logout</a>
        <a href="#" class="closebutton" onclick="closefunction()">&times;</a>
    </div>

    <!-- <script src="../adminjs/adminscript.js"></script> -->
    <?php include_once("../includes/script.php"); ?>
    <script>
        function openfunction() {
            document.getElementById("menu").style.width = "300px";
            document.getElementById("mainbox").style.marginLeft = "300px";
            document.getElementById("dashboard").style.marginLeft = "300px";
            document.getElementById("customer").style.marginLeft = "300px";
            document.getElementById("ticket").style.marginLeft = "300px";
        }

        function closefunction() {
            document.getElementById("menu").style.width = "0px";
            document.getElementById("mainbox").style.marginLeft = "0px";
            document.getElementById("dashboard").style.marginLeft = "0px";
            document.getElementById("customer").style.marginLeft = "0px";
            document.getElementById("ticket").style.marginLeft = "0px";
        }
    </script>
</body>

</html>