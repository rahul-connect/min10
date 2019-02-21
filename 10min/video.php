
<?php 
require('admin/database/db.php');
include("inc/header.php"); 

?>

<style type="text/css">
  video {
    width: 100%;
    height: auto;
}
</style>


<?php
if(!isset($_GET['id']) OR $_GET['id'] == null){
  echo "<script>window.location='index.php?access_denied';</script>";
}else{
  $video_id = $_GET['id'];
}
?>
         <?php
          $fetch = mysqli_query($con,"SELECT * FROM video WHERE id='$video_id' && status='1' LIMIT 1");
          $count = mysqli_num_rows($fetch);

          if($count > 0){
              $row=mysqli_fetch_array($fetch);
              $cat_id = $row['category'];
              $lang_id = $row['language'];
              $cat = mysqli_query($con,"SELECT title FROM category WHERE id='$cat_id' LIMIT 1");
              $cat_name = mysqli_fetch_array($cat);
              $category = $cat_name['title'];
              $lang = mysqli_query($con,"SELECT name FROM language WHERE id='$lang_id' LIMIT 1");
              $lang_name = mysqli_fetch_array($lang);
              $language = $lang_name['name'];
              $video_user = $row['user_id'];

              $u_name = mysqli_query($con,"SELECT * from users WHERE id='$video_user'");
              $fetch_user = mysqli_fetch_array($u_name);
              $video_user_name = $fetch_user['name'];
              $user_work = $fetch_user['work']; 

               }else{
            echo "<script>window.location='index.php?video_error';</script>";
            exit();
          }
            ?>

    <main>
		<div class="container" style="margin-top: 80px;">
			<div class="row">


        <div class="col-lg-9">
        <h2 class="text-center"><?php echo $row['title']; ?></h2><hr>
          
             
              <video  controls>
                <source src="<?php echo $row['video_url']; ?>">
              </video>

              <div class="card text-white border-light" style="max-width:100%;margin: 10px auto;background: #F2F2F2;">
              <div class="card-body" style="color: black !important;">
              <div class="row">
                  <div class="col-6 col-sm-4"><i class="fa fa-folder-o"></i> <?php echo $category; ?></div>
                  <div class="col-6 col-sm-4"><i class="fa fa-language"></i> <?php echo $language; ?></div>
                  <div class="col-12 col-sm-4"><i class="fa fa-user"></i> <?php echo $video_user_name;  ?> <br> (<?php echo $user_work;  ?>)</div>
              </div>
              </div>
              </div>

              <div class="card text-white" style="max-width:100%;margin: 40px auto;background: #F2F2F2;">
                <div class="card-body" style="color: black !important;"> 
                <h4 class="card-title text-center">Description</h4>
                <p class="card-text" style="text-align:justify;"><?php echo $row['description']; ?></p>
                </div>

    
        </div>
        </div>

                <div class="col-lg-3">
                <h2 class="text-center">More Videos</h2><hr>
                
                <?php
                $fetch = mysqli_query($con,"SELECT * FROM video WHERE status='1' && id!= $video_id ORDER BY id DESC LIMIT 5");
                $count = mysqli_num_rows($fetch);

          if($count > 0){
            while($row=mysqli_fetch_array($fetch)){
              $cat_id = $row['category'];
              $lang_id = $row['language'];
              $cat = mysqli_query($con,"SELECT title FROM category WHERE id='$cat_id' LIMIT 1");
              $cat_name = mysqli_fetch_array($cat);
              $lang = mysqli_query($con,"SELECT name FROM language WHERE id='$lang_id' LIMIT 1");
              $lang_name = mysqli_fetch_array($lang);

                ?>
                <div class="video_margin col-lg-12">
              <div class="card">
              <!-- Image -->
              <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Photo of sunset">

              <!-- Text Content -->
              <div class="card-body">
              <p class="card-text"><?php echo $row['title']; ?></p>
             <div style="margin: 10px auto;">
              <i class="fa fa-folder-o"></i> <?php echo $cat_name['title']; ?>&emsp;
              <i class="fa fa-language"></i> <?php echo $lang_name['name']; ?>
              </div>

              <a href="video.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-block">Watch</a>
              </div>
              </div>
            </div>
            <?php
          }
        }else{
          echo "<center><b>No Video Available</b></center>";
        }
            ?>
                

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
