
<?php 
require('database/db.php');
include("inc/header.php"); 
?>

    <main>

    <style type="text/css">

      #heading{
    color: white !important;
    margin: 120px auto;
}


    </style>

    <?php
    $fetch_videos = mysqli_query($con,"SELECT id FROM video WHERE status='1'");
    $count_video = mysqli_num_rows($fetch_videos);

    $fetch_users = mysqli_query($con,"SELECT id FROM users");
    $count_users = mysqli_num_rows($fetch_users);

    $fetch_msg = mysqli_query($con,"SELECT id FROM contact WHERE status='0'");
    $count_msg = mysqli_num_rows($fetch_msg);

    $fetch_approval = mysqli_query($con,"SELECT id FROM video WHERE status='0'");
    $count_approval = mysqli_num_rows($fetch_approval);

    ?>

		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-12">

                <div class="row">
                    <div class="col-6 col-lg-3" style="margin-bottom: 50px;">
                        <div class="card text-white bg-info" style="max-width: 20rem;">

                        <div class="card-body">
                        <h4 class="card-title text-center">VIDEOS</h4>
                        <p class="card-text"><h3 class="text-center"><b><?php echo $count_video; ?></b></h3></p>
                        <!-- Links -->
                        </div>

                        </div>
                    </div>

                    <div class="col-6 col-lg-3" style="margin-bottom: 50px;">
                        <div class="card text-white bg-success" style="max-width: 20rem;">

                        <div class="card-body">
                        <h4 class="card-title text-center">USERS</h4>
                        <p class="card-text"><h3 class="text-center"><b><?php echo $count_users; ?></b></h3></p>
                        <!-- Links -->
                        </div>

                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-lg-3" style="margin-bottom: 30px;">
                        <div class="card text-white bg-dark" style="max-width: 20rem;">

                        <div class="card-body">
                        <h4 class="card-title text-center">MESSAGE</h4>
                        <p class="card-text"><h3 class="text-center"><b><?php echo $count_msg; ?></b></h3></p>
                        <!-- Links -->
                        </div>

                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning" style="max-width: 20rem;">

                        <div class="card-body">
                        <h4 class="card-title text-center text-dark">ARROVAL</h4>
                        <p class="card-text"><h3 class="text-center text-dark"><b><?php echo $count_approval; ?></b></h3></p>
                        <!-- Links -->
                        </div>

                        </div>
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
