<!doctype html>
<html lang="en">

<head>
  <title>Team</title>
  <?php include_once("includes/link.php"); ?>
      <!-- External CSS -->
      <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top scroll-color">
    <a class="navbar-brand pl-3 " href="#"><i class="fab fa-amazon fa-3x text-dark "></i></a>
    <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav"> <span
        class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav mx-auto text-center ">
        <li class="nav-item px-3 "><a class="nav-link text-uppercase font-weight-bold" href="index.php">Home</a></li>
        <li class="nav-item px-3 "><a class="nav-link text-uppercase font-weight-bold" href="blog.php">Blog</a></li>
        <li class="nav-item px-3 "><a class="nav-link text-uppercase font-weight-bold" href="team.php">Team</a></li>
      </ul>
      <div class="signinsignup text-center">
        <a class="btn" href="signup.php">Sign up</a>
        <a class="btn signninbtn px-3 py-2" href="signin.php">Sign in</a>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

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
          <div class="teamimgbox two">
            <div class="teamimage"></div>
          </div>
          <div class="teamcontent">
            <h3>Tanmoy Sharma</h3>
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
            <h3>Tanmoy Sharma</h3>
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include_once("includes/script.php"); ?>
</body>

</html>