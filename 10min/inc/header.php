<?php
if(isset($_SESSION['user_email'])){
  $session = true;
  $user_email = $_SESSION['user_email'];
  $fetch = mysqli_query($con,"SELECT * FROM users WHERE email='$user_email'");
  $row = mysqli_fetch_array($fetch);
  $user_id = $row['id'];
  $username = $row['name'];
  $work = $row['work'];
}else{
  $session = false;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Min10 - Education within minutes</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  </head>

  <body>
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Min10.Org</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="courses.php">Courses</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About</a>
            </li>

            
            
            <?php
              if($session){
                echo "
                <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle active' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
            Profile
            </a>
            <div class='dropdown-menu' aria-labelledby='Profile'>
            <a class='dropdown-item' href='upload.php''>Upload Video</a>
            <a class='dropdown-item' href='my_video.php''>My Videos</a>
            <a class='dropdown-item' href='account.php'>Account</a>
            <a class='dropdown-item' href='functions/function.php?logout''>Logout</a>
            </div>
            </li>

            
                ";
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    </header>