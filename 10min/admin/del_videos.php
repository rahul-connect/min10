
<?php 
require('database/db.php');
include("inc/header.php"); 
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
      <div id="heading" class="col-lg-10">
       <h1 class="text-center">Deleted Videos</h1><br>
       <table id="cat_table" class="table table-responsive table-hover">
		<thead class="thead-inverse">
		<tr>
		
		<th>Title</th>
		<th>Category</th>
		<th>Language</th>
		<th>User</th>
		<th class="text-center">Cloudinary ID</th>
		</tr>
		</thead>
		
		<tbody>
		<?php
		$fetch_deleted = mysqli_query($con,"SELECT * FROM video WHERE status=2");
		$i = 0;
		while($row = mysqli_fetch_array($fetch_deleted)){
            $id = $row['id'];
            $title = $row['title'];
             $cat_id = $row['category'];
             $lang_id = $row['language'];
             $cat = mysqli_query($con,"SELECT title FROM category WHERE id='$cat_id' LIMIT 1");
             $cat_name = mysqli_fetch_array($cat);
             $category = $cat_name['title'];
             $lang = mysqli_query($con,"SELECT name FROM language WHERE id='$lang_id' LIMIT 1");
             $lang_name = mysqli_fetch_array($lang);
             $language = $lang_name['name'];
              $user_id = $row['user_id'];
              $user_fetch = mysqli_query($con,"SELECT name FROM users where id='$user_id'");
              $user_name = mysqli_fetch_array($user_fetch);
              $username = $user_name['name'];
              $public_id = $row['cloud_id'];
       
            $i++;
			echo "
				<a href='view_deleted.php?id=<?php echo $id; ?>'>
				<tr class='text-center'>
				
				<td><a href='view_deleted.php?id=$id'>$title</a></td>
				<td>$category</td>
				<td>$language</td>
				<td>$username</td>
				<td>$public_id</td>
				</tr>
				
			";
		}
		?>
		
		</tbody>
		<tfoot>
		
		</tfoot>
		</table>
		       
          
      </div>

      </div>
      
      
    </div>      
    </main>


    <!-- Page Content -->




    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#cat_table").DataTable();
    	});
    </script>

  </body>

</html>




 