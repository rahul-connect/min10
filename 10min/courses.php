
<?php 
require('admin/database/db.php');
include("inc/header.php"); 
?>
<?php
if(isset($_GET['filter'])){
  $filter_cat = $_GET['category'];
  $filter_lang = $_GET['language'];
  $fetch = mysqli_query($con,"SELECT * FROM video WHERE category='$filter_cat' && language='$filter_lang' && status='1' ORDER BY id DESC");
}else{
  $fetch = mysqli_query($con,"SELECT * FROM video WHERE status='1' ORDER BY id DESC");
}
?>

    <main>
		<div class="container" style="margin-top: 80px;">
			<div class="row">
			  <div class="col-lg-3">
              <div class="card">
                <div class="card-header text-center bg-warning text-dark">
                    <b>FILTER RESULT</b>
                </div>
                <div class="card-body">
                  <form action="" method="get">
                     <div class="form-group">
              <label for="category"><i class="fa fa-folder-o"></i> Select Category:</label>
              <select class="form-control" name="category" id="category">
               <?php
              $fetch_cat = mysqli_query($con,"SELECT * FROM category");
              while($row=mysqli_fetch_array($fetch_cat)){
                $cat_id = $row['id'];
                $title = $row['title'];
                echo "
                    <option value='$cat_id'>$title</option>
                ";
              }
              ?>
              </select>
            </div>
               <div class="form-group">
              <label for="language"><i class="fa fa-language"></i> Select Language:</label>
              <select class="form-control" name="language" id="language">
                  <?php
              $fetch_lang = mysqli_query($con,"SELECT * FROM language");
              while($row=mysqli_fetch_array($fetch_lang)){
                $lang_id = $row['id'];
                $name = $row['name'];
                echo "
                    <option value='$lang_id'>$name</option>
                ";
              }
              ?>
              </select>
            </div>
            <center><button type="submit" class="btn btn-success" name="filter" value='true'>Submit</button></center>
                  </form>
                </div>
                </div><br>

        </div>

        <div class="col-lg-9">
        <h2 class="text-center">
        <?php if(isset($_GET['filter'])){
        	echo "Search Results";
        }else{
        	echo "Recent Videos";
        }

        ?>
        </h2><hr>
          <div class="row"> <!--Row Start-->
          <?php
          
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
          
             <div class="video_margin col-lg-4">
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
            echo "
            <div class='col-lg-12 bg-danger' style=\"border-radius:10px;\">
            <h2 class='text-white text-center'>No Video Available</h2>
            </div>
            ";
          }

          ?>

            


          </div> <!--Row End-->



  
        


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
