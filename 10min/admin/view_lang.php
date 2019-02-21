
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
      <div id="heading" class="col-lg-8">
       <h1 class="text-center">VIEW LANGUAGES</h1><br>
        <?php
       if(isset($_GET['edit_lang'])){
            echo"<div class='alert alert-success' role='alert'><b>Language Updated Successfully !!</b> .</div>";
        }
       ?>
       <table id="cat_table" class="table table-responsive table-hover">
		<thead class="thead-inverse">
		<tr>
		<th>S.No</th>
		<th>Name</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		<?php
		$fetch_lang = mysqli_query($con,"SELECT * FROM language");
		$i = 0;
		while($row = mysqli_fetch_array($fetch_lang)){
            $id = $row['id'];
            $title = $row['name'];
            $time = $row['date'];
       
            $i++;
			echo "
				<tr class='text-center'>
				<td>$i</td>
				<td>$title</td>
				<td><div class='btn-group' role='group'>
        <a href='insert_lang.php?edit=$id'><button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>
        </div></td>
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




 