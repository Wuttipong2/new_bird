<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>edit page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
	
</body>
</html>








<?php
include('config.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{
	$u_card = $_POST['card_no'];
	$u_f_name = $_POST['user_first_name'];
	$u_l_name = $_POST['user_last_name'];
	$u_father = $_POST['user_father'];
	$u_aadhar = $_POST['user_aadhar'];
	$u_birthday = $_POST['user_dob'];
	$u_gender = $_POST['user_gender'];
	$u_email = $_POST['user_email'];
	$u_phone = $_POST['user_phone'];
	$u_state = $_POST['state'];
	$u_dist = $_POST['dist'];
	$u_village = $_POST['village'];
	$u_police = $_POST['police_station'];
	$u_pincode = $_POST['pincode'];
	$u_mother = $_POST['user_mother'];
	$u_family = $_POST['family'];
	$u_staff_id = $_POST['staff_id'];
	
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE student_data SET u_card='$u_card', u_f_name = '$u_f_name', u_l_name = '$u_l_name', u_father = '$u_father', u_mother = '$u_mother', u_aadhar = '$u_aadhar', u_birthday = '$u_birthday', u_gender = '$u_gender', u_email = '$u_email', u_phone = '$u_phone', u_state = '$u_state', u_dist = '$u_dist', u_village = '$u_village', u_police = '$u_police', u_pincode = '$u_pincode', u_family = '$u_family', staff_id = '$u_staff_id', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	

	if($run_update){
		echo "<script type='text/javascript'>";
		echo "alert('ยืนยันการแก้ไขสมาชิก!!!');";
		echo "alert('ระบบทำการแก้ไขสำเร็จ ไปดูกันเลย!!!');";
		echo "window.location = 'index_page.php'; ";
		echo "</script>";
	}else{
		echo "Data not update";
	}
}




?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>