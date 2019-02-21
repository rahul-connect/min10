
<?php 
require('database/db.php');
if(isset($_SESSION['admin'])){
  $session = true;
  header('Location:dashboard.php');
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

    <title>Admin Login - Min10.Org</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/full.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>

    <main>

    <style type="text/css">

      #heading{
    color: black !important;
    margin: 140px auto;
}

body{
  background: url('../images/banner.jpg') no-repeat center center fixed !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}
    </style>

		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-6">

        <div class="card">
        <h3 class="card-header text-center">
        min10.Org
        </h3>
        <div class="card-body">
        <?php
        if(isset($_GET['incorrect'])){
            echo"<div class='alert alert-danger' role='alert'><b>ERROR !!</b> Username or Password incorrect.</div>";
        }
        ?>
        <form action="functions/function.php" method="post">
        <fieldset class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required="required">
        </fieldset>
        <fieldset class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required="required">
        </fieldset>
        <button type="submit" class="btn btn-success btn-block" name="admin_login">Login</button>
        </form>

</div>
</div>



          
			</div>

			</div>
      
      
		</div>    	
    </main>


    <!-- Page Content -->



    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
