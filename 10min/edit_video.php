
<?php
require('admin/database/db.php');
if(!isset($_SESSION['user_email'])){
    echo "<script>window.location='index.php?login';</script>";
    exit();
}else if(!isset($_GET['edit_id'])){
  echo "<script>window.location='index.php?access_denied';</script>";
    exit();
}else{
  $video_id = $_GET['edit_id'];
}

include("inc/header.php"); 

$my_video = mysqli_query($con,"SELECT * FROM video WHERE id='$video_id' && user_id='$user_id' && status='1' ORDER BY id DESC");
$count_my_video = mysqli_num_rows($my_video);

if($count_my_video >0){
  $video = mysqli_fetch_array($my_video);
  $category_id = $video['category'];
  $language_id = $video['language'];


?>

    <main>
		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-8">
        <h1 class="text-center">Edit a Video</h1><br>
			    <form method="post" action="functions/function.php" class="upload_form">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" value="<?php echo $video['title']; ?>" name="title" required="required">
            </div>
            <div class="form-group">
              <label for="category">Select Category:</label>
              <select class="form-control" name="category" id="category">
              <?php
              $fetch_cat = mysqli_query($con,"SELECT * FROM category");
              while($row=mysqli_fetch_array($fetch_cat)){
                $cat_id = $row['id'];
                $title = $row['title'];
                if($category_id == $cat_id){
                    echo "
                    <option value='$cat_id' selected>$title</option>
                ";
                }else{
                  echo "
                    <option value='$cat_id'>$title</option>
                ";
                }

                
              }
              ?>
              </select>
            </div>
               <div class="form-group">
              <label for="language">Select Language:</label>
              <select class="form-control" name="language" id="language">
               <?php
              $fetch_lang = mysqli_query($con,"SELECT * FROM language");
              while($row=mysqli_fetch_array($fetch_lang)){
                $lang_id = $row['id'];
                $name = $row['name'];
                if($language_id==$lang_id){
                 echo "
                    <option value='$lang_id' selected>$name</option>
                ";
                }else{
                    echo "
                    <option value='$lang_id'>$name</option>
                ";
                }
                
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="desc">Description:</label>
              <textarea class="form-control" rows="5" id="desc" name="description"><?php echo $video['description']; ?></textarea>
            </div>

            <input type="hidden" value="<?php echo $video_id; ?>" name="video_id">
            <input type="hidden" value="<?php echo $user_id; ?>" id="user_id" name="user_id">
            
            
            <center><button type="submit" class="btn btn-success btn-lg" name="update_video">Submit</button></center>


          </form>
			</div>

			</div>
		</div>    	
    </main>


    <!-- Page Content -->

<?php }else{
   echo "<script>window.location='index.php?access_denied';</script>";
  } ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


  </body>

</html>

