
<?php 
require('admin/database/db.php');
include("inc/header.php"); 
?>

		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-8">
        <h1 class="text-center">Edit Profile</h1><br>
			    <form method="post" action="functions/function.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="user_name" value="<?php echo $username; ?>" required="required">
            </div>
            <div class="form-group">
              <label for="name">Current Work Profile:</label>
              <input type="text" class="form-control" name="work" value="<?php echo $work; ?>" required="required">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>" required="required">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </div>
            
            <center><button type="submit" class="btn btn-success btn-lg" name="update_profile">Update</button></center>
          </form>
			</div>
      </div>
      <div class="row" style="margin-top: -130px;">
      <div id="heading" class="col-lg-8">
        <h1 class="text-center">Change Password</h1><br>

          <form method="post" action="functions/function.php">
            <div class="form-group">
              <label for="new_pass">New Password:</label>
              <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Enter New Password.. " required="required">
            </div>
            <div class="form-group">
            <label for="confirm_new">Confirm Password:</label>
            <input type="password" class="form-control" name="confirm_new" id="confirm_new" placeholder="Again Enter New Password... ">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </div>
            
            <center><button type="submit" class="btn btn-success btn-lg" id="update_password" name="update_password" disabled="disabled">Update</button></center>
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
      $("#confirm_new").on("keyup",function(){
        var pass = $("#new_pass").val();
        var c_pass = $("#confirm_new").val();
        if(pass == c_pass){
          $('#update_password').removeAttr("disabled");
        }else{
          $('#update_password').attr("disabled", 'disabled');
        }

      });
       $("#new_pass").on("keyup",function(){
        var pass = $("#new_pass").val();
        var c_pass = $("#confirm_new").val();
        if(pass == c_pass){
          $('#update_password').removeAttr("disabled");
        }else{
          $('#update_password').attr("disabled", 'disabled');
        }

      });
    </script>

  </body>

</html>
