
<?php
require('admin/database/db.php');
if(isset($_SESSION['user_email'])){
    echo "<script>window.location='index.php';</script>";
    exit();
};
?>
<?php include("inc/header.php"); ?>

    <main>
		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-8">
        <h1 class="text-center">Register an Account</h1><br>
        <?php 
        if(isset($_GET['user_exist'])){
           echo "<div class='alert alert-warning' role='alert'><b>Attention : </b>Email Address Already Exists !</div>"; 
        }
        ?>
        
			    <form method="post" action="functions/function.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" required="required">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required="required">
            </div>
             <div class="form-group">
              <label for="work">Work Profile:</label>
              <input type="text" class="form-control" id="work" name="work" required="required">
            </div>
            <div class="form-group">
              <label for="desc">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required="required">
            </div>
            <div class="form-group">
              <label for="desc">Confirm Password:</label>
              <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" required="required">
            </div>
            
            <center><button type="submit" id="register" class="btn btn-success btn-lg" name="register" disabled="disabled">Submit</button></center>
          </form>
			</div>

			</div>
		</div>    	
    </main>


    <!-- Page Content -->




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$("#confirm_pass").on("keyup",function(){
    		var pass = $("#password").val();
    		var c_pass = $("#confirm_pass").val();
    		if(pass == c_pass){
    			$('#register').removeAttr("disabled");
    		}else{
    			$('#register').attr("disabled", 'disabled');
    		}

    	});
    </script>

  </body>

</html>
