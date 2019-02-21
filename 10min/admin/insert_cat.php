
<?php 
require('database/db.php');
include("inc/header.php"); 

if(isset($_GET['edit'])){
  $edit = true;
  $id = $_GET['edit'];
  $fetch = mysqli_query($con,"SELECT * FROM category WHERE id='$id'");
  $category = mysqli_fetch_array($fetch);
  $value=$category['title'];
  $btn_name = "edit_cat";
}else{
  $edit=false;
  $value ='';
  $btn_name = "insert_cat";
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
       <h1 class="text-center">
      <?php
      if($edit){
        echo "EDIT";
      }else{
        echo "INSERT";
      }
      ?>
        CATEGORY
       </h1><br>
       <?php
        if(isset($_GET['successful'])){
            echo"<div class='alert alert-success' role='alert'><b>Category Inserted Successfully !!</b> .</div>";
        }
        if(isset($_GET['failure'])){
            echo"<div class='alert alert-danger' role='alert'><b>ERROR !!</b> Something Went Wrong.</div>";
        }
        ?>
          <form method="post" action="functions/function.php">
            <div class="form-group">
              <input type="text" class="form-control" name="cat_name" placeholder="Enter Category Name..." value="<?php echo $value; ?>" required="required">
              <?php
              if($edit){
                echo "
                <input type='hidden' name='edit_id' value='$id'>
                ";
              }
              ?>
            </div>
            
            <center><button type="submit" class="btn btn-success btn-lg" name="<?php echo $btn_name; ?>">Submit</button></center>
          </form>
          
          
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




