
<?php 
require('database/db.php');
include("inc/header.php"); 
?>

<?php
if(isset($_GET['view']) && $_GET['view'] !=''){
  $msg_id = $_GET['view'];
  $fetch_msg = mysqli_query($con,"SELECT * FROM contact WHERE id='$msg_id' LIMIT 1");
  $row = mysqli_fetch_array($fetch_msg);
  $user_name = $row['name'];
  $user_email = $row['email'];
  $message = $row['message'];
}else{

}
?>
    <main>

    <style type="text/css">

      #heading{
    color: black !important;
    margin: 140px auto;
}

    </style>

    <div class="container">
      <div class="row">
      <div id="heading" class="col-lg-8">
       <h1 class="text-center">MESSAGE</h1><br>
      
       
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" value="<?php echo $user_name; ?>" readonly="true">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="<?php echo $user_email; ?>" readonly="true">
            </div>
            <div class="form-group">
              <label for="desc">Description:</label>
              <textarea class="form-control" rows="15" id="desc" readonly="true"><?php echo $message; ?></textarea>
            </div>
            
            <center><a href="functions/function.php?msg_id=<?php echo $msg_id; ?>"><button type="submit" class="btn btn-success btn-lg" name="seen_msg"><i class="fa fa-eye"></i> Seen</button></a></center>
          
		       
          
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




 