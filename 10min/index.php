
<?php 
require('admin/database/db.php');
include("inc/header.php"); 
?>

    <main>

    <style type="text/css">

      #heading{
    color: white !important;
    margin: 140px auto;
}

body{
  background: url('images/banner.jpg') no-repeat center center fixed !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}
    </style>

		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-12">
      <?php
      if(isset($_GET['upload'])){
        echo"<div class='alert alert-success' role='alert'>SUCCESS ! YOUR VIDEO HAS BEEN SENT FOR APPROVAL.</div>";
      }
      ?>
          <?php  
            if($session){ 
              echo "
              <center><h2>Welcome </h2><br> <h1>$username</h1><br></center>
          <center><a href='upload.php'><button type='button' class='btn btn-success'>Upload a Video</button></a></center>

              ";


            }else{
              echo "
              <h2>This Website allows you to upload videos of 10 min explaining in your mother tongue in such a manner that a child can also understand it</h2><br>
          <center><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#login'>Sign in to upload</button></center>

              ";

            }
          ?>
			    
          
			</div>

			</div>
      
      
		</div>    	
    </main>


    <!-- Page Content -->



    <!--Login Modal-->

<!-- The modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="modalLabel" style="margin: 0 auto;">Login</h4>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="functions/function.php" method="post">
<fieldset class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" required="required">
</fieldset>
<fieldset class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" required="required">
</fieldset>
<button type="submit" class="btn btn-success" name="login">Submit</button> or <a href="register.php">Create an Account</a>
</form>


</div>

</div>
</div>
</div>







    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
