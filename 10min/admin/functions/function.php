<?php
require("../database/db.php");

if(isset($_POST['admin_login'])){
	// Login user


	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email); 

	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password); 
	$password= md5($password);

	$check_email = mysqli_query($con,"SELECT * FROM admin WHERE email='$email' && password='$password' LIMIT 1");

	if(mysqli_num_rows($check_email) == 1){
		       
		        $_SESSION['admin'] = $email;
 
                header('location:../dashboard.php');
                exit();
		
	}else{

		echo "<script>window.location='../index.php?incorrect=true';</script>";
	}

}



// Logout function

if(isset($_GET['logout'])){
	// remove all session variable
        session_unset();
 
        // destroy the session
        session_destroy();
 
        header('location: ../index.php');
}

// Insert Category

if(isset($_POST['insert_cat'])){
	$cat_name = ucfirst($_POST['cat_name']);

	$insert = mysqli_query($con,"INSERT INTO category(title) VALUES('$cat_name')");
	if($insert){
		echo "<script>window.location='../insert_cat.php?successful';</script>";
	}else{
		echo "<script>window.location='../insert_cat.php?failure';</script>";
	}
}


// Insert Category

if(isset($_POST['insert_lang'])){
	$lang_name = ucfirst($_POST['lang_name']);

	$insert = mysqli_query($con,"INSERT INTO language(name) VALUES('$lang_name')");
	if($insert){
		echo "<script>window.location='../insert_lang.php?successful';</script>";
	}else{
		echo "<script>window.location='../insert_lang.php?failure';</script>";
	}
}


// Edit Admin Profiel Details


if(isset($_POST['update_admin'])){

    $admin_id = $_POST['admin_id'];

  	$name = stripslashes($_POST['admin_name']);
	$name = mysqli_real_escape_string($con,$name); 

	$email = stripslashes($_POST['admin_email']);
	$email = mysqli_real_escape_string($con,$email); 

    $update = mysqli_query($con,"UPDATE admin SET email='$email',name='$name',date_modified=NOW() WHERE id='$admin_id'");
		if($update){
			$_SESSION['admin'] = $email;
			echo "<script>window.location='../account.php?profile=successful';</script>";

	}else{
            echo("Error description: " . mysqli_error($con));
            // echo "<script>window.location='../account.php?profile=failure';</script>";
	}


}

// Update Admin Password

if(isset($_POST['update_password'])){
	$new_pass = stripslashes($_POST['new_pass']);
	$admin_id = $_POST['admin_id'];
	if($new_pass!=''){
		$new_pass = mysqli_real_escape_string($con,$new_pass); 
	    $new_pass= md5($new_pass);
	    $update = mysqli_query($con,"UPDATE admin SET password='$new_pass',date_modified=NOW() WHERE id='$admin_id'");
	    if($update){
	    	echo "<script>window.location='../account.php?password=successful';</script>";
	    }else{
	    	echo("Error description: " . mysqli_error($con));
	    }
	}
	
}

// Update Category 

if(isset($_POST['edit_cat'])){
	$edit_id = $_POST['edit_id'];
	$cat_name = ucfirst($_POST['cat_name']);
	$update_cat = mysqli_query($con,"UPDATE category SET title='$cat_name' WHERE id='$edit_id'");
	 if($update_cat){
	    	echo "<script>window.location='../view_cat.php?edit_cat=successful';</script>";
	    }else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}

// Update Language 

if(isset($_POST['edit_lang'])){
	$edit_id = $_POST['edit_id'];
	$lang_name = ucfirst($_POST['lang_name']);
	$update_lang = mysqli_query($con,"UPDATE language SET name='$lang_name' WHERE id='$edit_id'");
	 if($update_lang){
	    	echo "<script>window.location='../view_lang.php?edit_lang=successful';</script>";
	    }else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}


// Delete USER

if(isset($_GET['del_user'])){
	$del_id = $_GET['del_user'];

	$delete_query = mysqli_query($con,"DELETE FROM users WHERE id='$del_id' LIMIT 1");
	if($delete_query){
		$delete_video = mysqli_query($con,"UPDATE video SET status='2' WHERE user_id='$del_id'");
		if($delete_video){
			echo "<script>window.location='../users.php?del_user=successful';</script>";
		}else{
	    	echo("Error description: " . mysqli_error($con));
	    }
	}

}

// Approve Video 

if(isset($_GET['approve'])){
	$approve_id = $_GET['approve'];
	$update_status = mysqli_query($con,"UPDATE video SET status='1' WHERE id='$approve_id'");
	if($update_status){
		echo "<script>window.location='../approval.php?status=successful';</script>";
	}else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}


// Disapprove Video 

if(isset($_GET['disapprove'])){
	$disapprove_id = $_GET['disapprove'];
	$update_status = mysqli_query($con,"UPDATE video SET status='2' WHERE id='$disapprove_id'");
	if($update_status){
		echo "<script>window.location='../del_videos.php?disapprove=successful';</script>";
	}else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}

// Delete Video Details Permanently
if(isset($_GET['delete_video'])){
	$deleted_id = $_GET['delete_video'];
	$delete_query = mysqli_query($con,"DELETE FROM video WHERE id='$deleted_id' LIMIT 1");
	if($delete_query){
		echo "<script>window.location='../del_videos.php?delete=successful';</script>";
	}else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}

// MESSAGE SEEN FUNCTION

if(isset($_GET['msg_id'])){
	$msg_id = $_GET['msg_id'];
	$change_status = mysqli_query($con,"UPDATE contact SET status='1' WHERE id='$msg_id'");
	if($change_status){
		echo "<script>window.location='../message.php?seen=successful';</script>";
	}else{
	    	echo("Error description: " . mysqli_error($con));
	    }
}


?>