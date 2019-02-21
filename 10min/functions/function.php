<?php
require("../admin/database/db.php");

// Register a User
if (isset($_POST['register'])){
	$name = stripslashes($_POST['name']);
	$name = mysqli_real_escape_string($con,$name);

	$work = stripslashes($_POST['work']);
	$work = mysqli_real_escape_string($con,$work); 

	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email); 

	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password); 
	$password= md5($password);

	$check_email = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

	if(mysqli_num_rows($check_email)){
		echo "<script>window.location='../register.php?user_exist=true';</script>";
	}else{

		$insert = mysqli_query($con,"INSERT INTO users(name,email,work,password) VALUES('$name','$email','$work','$password')");

	if($insert){
		  $_SESSION['user_email'] = $email; 
          header('location: ../index.php');
           exit();

	}else{
		echo "<script>alert('FAILURE');</script>";
	}

	}
}




// Login user
if (isset($_POST['login'])){

	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email); 

	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password); 
	$password= md5($password);

	$check_email = mysqli_query($con,"SELECT * FROM users WHERE email='$email' && password='$password'");

	if(mysqli_num_rows($check_email) == 1){
		       
		        $_SESSION['user_email'] = $email;
 
                header('location:../index.php');
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

// Function to Insert Video 

if(isset($_POST['upload_video'])){
	$title = stripslashes($_POST['title']);
	$title = mysqli_real_escape_string($con,$title);

	$category = $_POST['category'];
	$language = $_POST['language'];
	$description = $_POST['description'];
	$user_id = $_POST['user_id'];
	
	$video_url = mysqli_real_escape_string($con,$_POST['video_url']);
	$thumbnail = mysqli_real_escape_string($con,$_POST['video_thumbnail']);
	$cloud_id = mysqli_real_escape_string($con,$_POST['cloud_id']);


	if($title !='' && $category !='' && $language !='' && $description !="" && $video_url !='' && $thumbnail !='' && $cloud_id !='' && $user_id!=''){

	$insert = "INSERT INTO video(title,description,category,language,video_url,cloud_id,image,user_id) 
	                     VALUES('$title','$description','$category','$language','$video_url','$cloud_id','$thumbnail','$user_id')";
	                   
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<script>window.location='../index.php?upload=success';</script>";
	} else{
		//echo "<script>window.location='../index.php?upload=error';</script>";
		echo("Error description: " . mysqli_error($con));
	}

	}else{
		echo "<script>window.location='../upload.php?error=fieldempty';</script>";
	}
	

}


// Edit User Profiel Details


if(isset($_POST['update_profile'])){

    $user_id = $_POST['user_id'];

  	$name = stripslashes($_POST['user_name']);
	$name = mysqli_real_escape_string($con,$name);

	$work = stripslashes($_POST['work']);
	$work = mysqli_real_escape_string($con,$work); 

	$email = stripslashes($_POST['user_email']);
	$email = mysqli_real_escape_string($con,$email); 

	$check_email = mysqli_query($con,"SELECT * FROM users WHERE email='$email' && id !=$user_id");

	if(mysqli_num_rows($check_email)){
		echo "<script>window.location='../account.php?user_exist=true';</script>";
	}else{
		$update = mysqli_query($con,"UPDATE users SET name='$name',email='$email',work='$work' WHERE id='$user_id'");
		if($update){
			$_SESSION['user_email'] = $email;
			echo "<script>window.location='../account.php?update=success';</script>";
		}
	}


}


// Update User Password

if(isset($_POST['update_password'])){
	$new_pass = stripslashes($_POST['new_pass']);
	$user_id = $_POST['user_id'];
	if($new_pass!=''){
		$new_pass = mysqli_real_escape_string($con,$new_pass); 
	    $new_pass= md5($new_pass);
	    $update = mysqli_query($con,"UPDATE users SET password='$new_pass' WHERE id='$user_id'");
	    if($update){
	    	echo "<script>window.location='../index.php?update=success';</script>";
	    }
	}
	
}


// Function to Update Video 

if(isset($_POST['update_video'])){
	$title = stripslashes($_POST['title']);
	$title = mysqli_real_escape_string($con,$title);

	$category = $_POST['category'];
	$language = $_POST['language'];
	$description = $_POST['description'];
	$video_id = $_POST['video_id'];
	$user_id = $_POST['user_id'];

	if($title !='' && $category !='' && $language !='' && $description !="" && $video_id !='' && $user_id!=''){

	$update = "UPDATE video SET title='$title',description='$description',category='$category',language='$language' WHERE id='$video_id' && user_id='$user_id' && status='1'";

	$run_update = mysqli_query($con,$update);
	if($run_update){
		echo "<script>window.location='../my_video.php?edit=success';</script>";
	} else{
		echo "<script>window.location='../my_video.php?edit=error';</script>";
	}

	}else{
		echo "<script>window.location='../index.php?error=fieldempty';</script>";
	}

}



// Delete a video by User
if(isset($_GET['del_id'])){
	$user_id = $_GET['user_id'];
	$del_id = $_GET['del_id'];

	$delete = mysqli_query($con,"UPDATE video SET status='2' WHERE user_id='$user_id' && id='$del_id'");
	if($delete){
		echo "<script>window.location='../my_video.php?delete=1';</script>";
	}else{
		echo "<script>window.location='../my_video.php?delete=0';</script>";
	}

}



// Contact Us Function
if(isset($_POST['contact'])){
	$name = stripslashes($_POST['name']);
	$name = mysqli_real_escape_string($con,$name); 

	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email); 

	$message = stripslashes($_POST['message']);
	$message = mysqli_real_escape_string($con,$message);

	$insert = mysqli_query($con,"INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')");
	if($insert){
		echo "<script>window.location='../contact.php?msg=1';</script>";
	}else{
		echo "<script>window.location='../contact.php?msg=0';</script>";
	}

}



?>

