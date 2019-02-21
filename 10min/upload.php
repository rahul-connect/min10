
<?php
require('admin/database/db.php');
if(!isset($_SESSION['user_email'])){
    echo "<script>window.location='index.php?login';</script>";
    exit();
};

include("inc/header.php"); 

?>

    <main>
		<div class="container">
			<div class="row">
			<div id="heading" class="col-lg-8">
        <h1 class="text-center">Upload a Video</h1><br>
			    <form method="post" action="functions/function.php" class="upload_form">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" required="required">
            </div>
            <div class="form-group">
              <label for="category">Select Category:</label>
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
              <label for="language">Select Language:</label>
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
            <div class="form-group">
              <label for="desc">Description:</label>
              <textarea class="form-control" rows="5" id="desc" name="description" required="required"></textarea>
            </div>
            <div class="form-group">
            <label for="file"><b>Video File:</b></label>
              
             <button type="button" class="btn btn-primary" id="upload_widget_opener">Upload Video</button>

            
            <div id="msg"></div>
            </div>
  
            <input type="hidden" value="" id="video_url" name="video_url">
            <input type="hidden" value="" id="video_thumbnail" name="video_thumbnail">
            <input type="hidden" value="" id="cloud_id" name="cloud_id">
            <input type="hidden" value="<?php echo $user_id; ?>" id="user_id" name="user_id">
            
            
            <center><button type="submit" class="btn btn-success btn-lg" name="upload_video">Submit</button></center>


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


<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>  
<script type="text/javascript">  
  document.getElementById("upload_widget_opener").addEventListener("click", function() {
    cloudinary.openUploadWidget({ cloud_name: 'min10', upload_preset: 'vopjhwfc',multiple:false,resource_type:'video'}, 
      function(error, result) { 
      	//console.log(error, result);
      	//console.log(result[0].path);
      	console.log(result[0].thumbnail_url);
      	console.log(result[0].url);
      	console.log(result[0].public_id);

      	var video_url = result[0].url;
      	var video_thumbnail = result[0].thumbnail_url;
      	var cloud_id = result[0].public_id;

      	if(error==null){
      		if(result){
      		$("#upload_widget_opener").hide();
      		$("#video_url").val(video_url);
      		$("#video_thumbnail").val(video_thumbnail);
      		$("#cloud_id").val(cloud_id);
      		$("#msg").html("<div class='alert alert-success' role='alert'>File Uploaded Successfully. Click <b>Submit</b> button to Complete.</div>");
      	}
      }else{

      }
      	

      	 });
  }, false);
</script>


  </body>

</html>

