
<?php 
require('admin/database/db.php');
include("inc/header.php"); 
?>
		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-8">
        <h1 class="text-center">Contact Us</h1><br>
        <?php
        if(isset($_GET['msg'])){
          $msg = $_GET['msg'];
          if($msg==1){
            echo"<div class='alert alert-success' role='alert'>Message Sent Successfully.</div>";
          }else{
            echo"<div class='alert alert-danger' role='alert'><b>ERROR !!</b> Message Failure.</div>";
          }
        }
        if(!$session){
          $username='';
          $user_email='';
        }
        ?>
			    <form method="post" action="functions/function.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name" required="required" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required="required" value="<?php echo $user_email; ?>">
            </div>
            <div class="form-group">
              <label for="desc">Description:</label>
              <textarea class="form-control" rows="5" name="message" id="desc" required="required"></textarea>
            </div>
            
            <center><button type="submit" class="btn btn-success btn-lg" name="contact">Submit</button></center>
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

  </body>

</html>
