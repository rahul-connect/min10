
<?php 
require('admin/database/db.php');
include("inc/header.php"); 
?>
<?php
$my_video = mysqli_query($con,"SELECT * FROM video WHERE user_id='$user_id' && status='1' ORDER BY id DESC");
$count_my_video = mysqli_num_rows($my_video);
?>
    <div class="container">
      <div class="row">
      <div id="heading" class="col-lg-10">
        <h1 class="text-center">My Videos</h1><br>
        <table id="databox" class="table">
        <thead>
        <tr>
        <th max-width="40%">Title</th>
        <th max-width="20%">Category</th>
        <th max-width="20%">Language</th>
        <th max-width="20%">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <?php
        if($count_my_video > 0){
          while($video = mysqli_fetch_array($my_video)){
              $cat_id = $video['category'];
              $lang_id = $video['language'];
              $cat = mysqli_query($con,"SELECT title FROM category WHERE id='$cat_id' LIMIT 1");
              $cat_name = mysqli_fetch_array($cat);
              $lang = mysqli_query($con,"SELECT name FROM language WHERE id='$lang_id' LIMIT 1");
              $lang_name = mysqli_fetch_array($lang);
          ?>
        <tr>
        <td><?php echo $video['title']; ?></td>
        <td><?php echo $cat_name['title']; ?></td>
        <td><?php echo $lang_name['name']; ?></td>
        <td>
          <div class="btn-group" role="group">
        <a href="edit_video.php?edit_id=<?php echo $video['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
        <a href="functions/function.php?user_id=<?php echo $user_id; ?>&del_id=<?php echo $video['id']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?');">Delete</button></a>
        </div>
        </td>
        </tr>
        <?php
        
          }
         
        }else{
          echo "<tr class='bg-secondary text-warning'>
               <td colspan='4' class='text-center'><h4>You have not Uploaded any Video</h4></td>
                </tr>";
        }
        ?>
      
        
        </tbody>

        </table>
          

      </div>
      </div>
     
    </div>      
    </main>


    <!-- Page Content -->




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>



  </body>

</html>
