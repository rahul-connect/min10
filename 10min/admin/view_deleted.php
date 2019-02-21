<?php 
require('database/db.php');
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
          $fetch = mysqli_query($con,"SELECT * FROM video WHERE id='$video_id' && status='2' LIMIT 1");
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
              $cloud_id = $row['cloud_id'];

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

        <div class="col-lg-9" style="margin: 0 auto;">
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

             <div class="card text-white" style="max-width:100%;margin: 40px auto;">
                <div class="card-body" style="color: black !important;"> 
                <h4 class="card-title text-center">Cloudinary Public ID</h4><hr>
                <p class="card-text" style="text-align:justify;font-size: 30px;"><?php echo $row['cloud_id']; ?></p>
                </div>
             </div>
              
              <center><div style="margin-bottom: 100px">
             <a href="functions/function.php?delete_video=<?php echo $video_id; ?>"<button type="button" class="btn btn-danger btn-lg btn-block">Delete Video Deatils Permanently</button></a>
             </div></center>

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
