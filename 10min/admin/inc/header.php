
<?php
if(isset($_SESSION['admin'])){
  $session = true;
  $admin_email = $_SESSION['admin'];
  $fetch = mysqli_query($con,"SELECT * FROM admin WHERE email='$admin_email'");
  $row = mysqli_fetch_array($fetch);
  $admin_id = $row['id'];
  $name = $row['name'];
}else{
  $session = false;
  echo "<script>window.location='index.php?access_denied'; </script>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Min10 </title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/full.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

  </head>

  <body>
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

          

            
             <li class='nav-item dropdown active'>
            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
            Category
            </a>
            <div class='dropdown-menu' aria-labelledby='Category'>
            <a class='dropdown-item' href='insert_cat.php''>Insert Category</a>
            <a class='dropdown-item' href='view_cat.php''>View Category</a>
            </div>
            </li>

            <li class='nav-item dropdown active'>
            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
            Language
            </a>
            <div class='dropdown-menu' aria-labelledby='Language'>
            <a class='dropdown-item' href='insert_lang.php''>Insert Language</a>
            <a class='dropdown-item' href='view_lang.php''>View Language</a>
            </div>
            </li>

            <li class='nav-item dropdown active'>
            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
            Video
            </a>
            <div class='dropdown-menu' aria-labelledby='Video'>
            <a class='dropdown-item' href='approval.php''>Pending Approval</a>
            <a class='dropdown-item' href='del_videos.php''>Deleted Videos</a>
            <a class='dropdown-item' href='view_videos.php''>All Videos</a>
            </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="users.php">Users
                <span class="sr-only">(current)</span>
              </a>
            </li>
             <li class="nav-item active">
              <a class="nav-link" href="message.php">Message
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="account.php">Account
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="functions/function.php?logout">Logout
                <span class="sr-only">(current)</span>
              </a>
            </li>
        
          </ul>
        </div>
      </div>
    </nav>
    </header>