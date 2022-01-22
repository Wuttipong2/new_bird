			<?php 

								session_start();
								include('config.php');

								if (!$_SESSION['userid']) {
									header("Location: index_page.php");
								} else {



									//Add  new member code 

							if(isset($_POST['submit'])){
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
								


								//image upload

								$msg = "";
								$image = $_FILES['image']['name'];
								$target = "upload_images/".basename($image);

								if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
									$msg = "Image uploaded successfully";
								}else{
									$msg = "Failed to upload image";
								}

								include('config.php');

								$insert_data = "INSERT INTO student_data (u_card, u_f_name, u_l_name, u_father, u_aadhar, u_birthday, u_gender, u_email, u_phone, u_state, u_dist, u_village, u_police, u_pincode, u_mother, u_family, staff_id,image,uploaded) 
								VALUES ('$u_card','$u_f_name','$u_l_name','$u_father','$u_aadhar','$u_birthday','$u_gender','$u_email','$u_phone','$u_state','$u_dist','$u_village','$u_police','$u_pincode','$u_mother','$u_family','$u_staff_id','$image',NOW())";
								$result = mysqli_query($con,$insert_data);

								$insert_data2 = "INSERT INTO member_data (u_card, u_f_name, u_l_name, u_father, u_aadhar, u_birthday, u_gender, u_email, u_phone, u_state, u_dist, u_village, u_police, u_pincode, u_mother, u_family, staff_id,image,uploaded) 
								VALUES ('$u_card','$u_f_name','$u_l_name','$u_father','$u_aadhar','$u_birthday','$u_gender','$u_email','$u_phone','$u_state','$u_dist','$u_village','$u_police','$u_pincode','$u_mother','$u_family','$u_staff_id','$image',NOW())";
								$result2 = mysqli_query($con,$insert_data2);

								
								if($result2){
									echo "<script type='text/javascript'>";
									echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว!!!');";
									echo "window.location = 'index_page.php'; ";
									echo "</script>";
									
								}else{
									echo "<script type='text/javascript'>";
									echo "alert('เกิดข้อผิดพลาดเพิ่มข้อมูลไม่สำเร็จ!!!');";
									echo "window.location = 'index_page.php'; ";
									echo "</script>";
									
								}

							}
							?>






			<!DOCTYPE html>
			<html>
			<head>
				<title>Admin view Page</title>

				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
							<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

								<link rel="stylesheet" href="style.css">

								<style>
												.showtitle {
													font-family: 'Tangerine', serif;
												background: linear-gradient( 45deg, #ffa69e, #faf3dd, #b8f2e6, #aed9e0, #5e6472);
												font-size: 90px;
													font-weight: bold;
													
												}
												.showadminid{
													font-family: 'Lucida Console', Monaco, monospace;
													font-size: 100px;
													font-weight: bold;
												}

												body{
												background-image: url("https://media.istockphoto.com/photos/marble-picture-id471870535?k=20&m=471870535&s=612x612&w=0&h=jNTRzlsVPfKYq_sZEf0uheriLZHdny8Fus9iuRgI1ro=");
												
											}

											.table-bordered{
											border : 2px solid #000000;

										}

										.table-striped{
											border: 2px solid #000000;

										}
										.table-hover{
											border: 2px solid #000000;

										}

										.table-td{
											border: 2px solid #000000;

										}
										

										
											

												</style>
				
			</head>
			<body>

			<script type="text/javascript">
												WebFontConfig = {
													google: { families: [ 'Tangerine::latin' ] }
												};
												(function() {
													var wf = document.createElement('script');
													wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
													'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
													wf.type = 'text/javascript';
													wf.async = 'true';
													var s = document.getElementsByTagName('script')[0];
													s.parentNode.insertBefore(wf, s);
												})(); </script>




				<div class="container">
			<a href="https://lexacademy.in" target="_blank"><img src="https://lexacademy.in/wp-content/uploads/2021/07/lex-academy-online-learning-platform-1.png" alt="" width="350px" ></a>
					

			
			<!-- adding alert notification  -->
			<?php
				if($added){
					echo "
						<div class='btn-success' style='padding: 15px; text-align:center;'>
							Your menber Data has been Successfully Added.
						</div><br>
					";
				}

			?>

			
							<div class="showadminid">
							<center><h1>You are Admin ID:<?php echo $_SESSION['userid']; ?></h1></center>
							<center><h3 >Hi, Welcome <?php echo $_SESSION['user']; ?>  Admin ID:<?php echo $_SESSION['userid']; ?> Userlevel:<?php echo $_SESSION['userlevel']; ?> </h3></center>
							</div>
						<div class="container text-center">
							<a href="https://lexacademy.in" target="_blank"><img src="https://lexacademy.in/wp-content/uploads/2021/07/lex-academy-online-learning-platform-1.png" alt="" width="350px" ></a><br>
							<h1 class="showtitle">Show all member information</h1>

					
				
				<a href="logout.php" class="btn btn-success pull-left"><i class="fa fa-lock"></i> Logout</a>
				<button class="btn btn-success pull-left ml-3" type="button" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Add New member
			</button>
			<a href="export.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Data</a><be>
			<br>
				
					<table class="table table-bordered table-striped table-hover text-center mt-2 " id="#myTable"><br>
									<thead>
										<tr>
										<th class="text-center" scope="col">S.L</th>
											<th class="text-center" scope="col">ชื่อ-สกุล</th>
											<th class="text-center" scope="col">รหัสสมาชิก</th>
											<th class="text-center" scope="col">เบอร์โทร</th>
											<th class="text-center" scope="col">วันที่เข้าทำงาน</th>
											<th class="text-center" scope="col">ดูข้อมูล</th>
											<th class="text-center" scope="col">แก้ไข</th>
											<th class="text-center" scope="col">ลบ</th>
										</tr>
									</thead>
									
								
										<?php
												
												include('config.php');

										$get_data = "SELECT * FROM student_data order by 1 desc";
										$run_data = mysqli_query($con,$get_data);
										$i = 0;
										while($row = mysqli_fetch_array($run_data))
										{
											$sl = ++$i;
											$id = $row['id'];
											$u_card = $row['u_card'];
											$u_f_name = $row['u_f_name'];
											$u_l_name = $row['u_l_name'];
											$u_phone = $row['u_phone'];
											$u_family = $row['u_family'];
											$time = $row['uploaded'];

											$image = $row['image'];

											echo "

											<tr>
											<td class='text-center'>$sl</td>
											<td class='text-left'>$u_f_name   $u_l_name</td>
											<td class='text-left'>$u_card</td>
											<td class='text-left'>$u_phone</td>
											<td class='text-center'>$time</td>
										
											<td class='text-center'>
												<span>
												<a href='#' class='btn btn-success mr-2 text-center profile' data-toggle='modal' data-target='#view$id' title='Profile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
												</span>
												
											</td>
											<td class='text-center'>
												<span>
												<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

													
													
												</span>
												
											</td>
											<td class='text-center'>
												<span>
													<a href='#' class='btn btn-danger deleteuser' title='Delete'>
														<i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
													</a>
												</span>
												
											</td>
										</tr>


											";
										}

										?>


						
						
					</table>
					<form method="post" action="export.php">
				<input type="submit" name="export" class="btn btn-success pull-left ml-3 mr-3 mb-3" value="Export Data" />
				</form><br><br>
				</div>


				<!---Add in modal---->

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content center">
				<div class="modal-header center">
					
					<center><img src="https://lexacademy.in/wp-content/uploads/2021/07/lex-academy-online-learning-platform-1.png" width="300px" height="80px" alt=""></center>
					<button type="button left" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body w-100 text-left">
					<form method="POST" enctype="multipart/form-data">
						
						<!-- This is test for New Card Activate Form  -->
						<!-- This is Address with email id  -->
						<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='inputEmail4'>รหัสสมาชิก :</label>
					<input type='text' class='form-control' name='card_no' placeholder='Enter 12-digit member Id.' maxlength='12'  required>
					</div>
					<div class='form-group col-md-6'>
					<label for='inputPassword4'>เบอร์โทรศัพท์ :</label>
					<input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='10' required>
					</div>
					</div>
					
					
					<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='firstname'>ชื่อจริง :</label>
					<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name'required>
					</div>
					<div class='form-group col-md-6'>
					<label for='lastname'>นามสกุล :</label>
					<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name'required>
					</div>
					</div>
					
	
					
					<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='email'>Email :</label>
					<input type='email' class='form-control' name='user_email' placeholder='Enter Email id' required>
					</div>
					<div class='form-group col-md-6'>
					<label for='aadharno'>พนักงาน/รานวันหรือรายเดือน :</label>
					<input type='text' class='form-control' name='user_aadhar' maxlength='12' placeholder='Enter 12-digit Aadhar no. ' required>
					</div>
					</div>
					
					<div class='form-row'>
					<div class='form-group col-md-6 '>
					<label for='inputState'>เพศ :</label>
					<select id='inputState' name='user_gender' class='form-control' required>
					<option selected>เลือกเพศ</option>
					<option>ชาย</option>
					<option>หญิง</option>
					<option>อื่น ๆ</option>
					</select>
					</div>
					<div class='form-group col-md-6'>
					<label for='inputPassword4'>วันเดือนปีเกิด</label>
					<input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' required>
					</div>
					</div>
					
					
					<div class='form-group'>
					<label for='inputAddress'>บ้านเลขที่</label>
					<input type='text' class='form-control' name='village' placeholder='1234 Main St' required>
					</div>
					<div class='form-group'>
					<label for='inputAddress2'>หมู่ที่/หมู่บ้าน</label>
					<input type='text' class='form-control' name='police_station' placeholder='Enter police station' required>
					</div>
					<div class='form-row'>
					<div class='form-group col-md-5'>
					<label for='inputCity'>ตำบล/แขวง</label>
					<input type='text' class='form-control' name='dist' required>
					</div>
					<div class='form-group col-md-4 '>
					<label for='inputState'>จังหวัด :</label>
							<select name='state' class='form-control'required>
											<option>เลือกจังหวัด</option>
														<option value='กาฬสินธุ์'>กาฬสินธุ์</option>
														<option value='ขอนแก่น'>ขอนแก่น</option>
														<option value='ชัยภูมิ '>ชัยภูมิ </option>
														<option value='นครพนม '>นครพนม </option>
														<option value='นครราชสีมา'>นครราชสีมา </option>
														<option value='บึงกาฬ'>บึงกาฬ </option>
														<option value='บุรีรัมย์'>บุรีรัมย์ </option>
														<option value='มหาสารคาม '>มหาสารคาม </option>
														<option value='มุกดาหาร'>มุกดาหาร </option>
														<option value='ยโสธร'>ยโสธร </option>
														<option value='ร้อยเอ็ด'>ร้อยเอ็ด </option>
														<option value='เลย'>เลย </option>
														<option value='สกลนคร'>สกลนคร </option>
														<option value='สุรินทร์'>สุรินทร์ </option>
														<option value='ศรีสะเกษ'>ศรีสะเกษ</option>
														<option value='หนองคาย'>หนองคาย</option>
														<option value='หนองบัวลำภู'>หนองบัวลำภู </option>
														<option value='อุดรธานี'>อุดรธานี </option>
														<option value='กำแพงเพชร'>กำแพงเพชร </option>
														<option value='ชัยนาท'>ชัยนาท </option>
														<option value='นครนายก'>นครนายก </option>
														<option value='นครปฐม'>นครปฐม </option>
														<option value='นครสวรรค์'>นครสวรรค์ </option>
														<option value='นนทบุรี'>นนทบุรี </option>
														<option value='ปทุมธานี'>ปทุมธานี </option>
														<option value='พระนครศรีอยุธยา'>พระนครศรีอยุธยา </option>
														<option value='พิจิตร'>พิจิตร </option>
														<option value='พิษณุโลก'>พิษณุโลก </option>
														<option value='เพชรบูรณ์'>เพชรบูรณ์ </option>
														<option value='ลพบุรี'>ลพบุรี</option>
														<option value='สมุทรปราการ'>สมุทรปราการ </option>
														<option value='สมุทรสงคราม'>สมุทรสงคราม </option>
														<option value='สิงห์บุรี'>สิงห์บุรี  </option>
														<option value='สุโขทัย'>สุโขทัย  </option>
														<option value='สุพรรณบุรี'>สุพรรณบุรี  </option>
														<option value='สระบุรี'>สระบุรี  </option>
														<option value='อ่างทอง'>อ่างทอง  </option>
														<option value='อุทัยธานี'>อุทัยธานี  </option>
														<option value='จันทบุรี'>จันทบุรี </option>
														<option value='ฉะเชิงเทรา'>ฉะเชิงเทรา </option>
														<option value='ชลบุรี'>ชลบุรี </option>
														<option value='ตราด'>ตราด </option>
														<option value='ปราจีนบุรี'>ปราจีนบุรี </option>
														<option value='ระยอง'>ระยอง </option>
														<option value='สระแก้ว'>สระแก้ว </option>
														<option value='กาญจนบุรี'>กาญจนบุรี </option>
														<option value='ตาก'>ตาก </option>
														<option value='ประจวบคีรีขันธ์'>ประจวบคีรีขันธ์ </option>
														<option value='เพชรบุรี'>เพชรบุรี </option>
														<option value='ราชบุรี'>ราชบุรี </option>
														<option value='กระบี่'>กระบี่ </option>
														<option value='ชุมพร'>ชุมพร </option>
														<option value='ตรัง'>ตรัง </option>
														<option value='นครศรีธรรมราช'>นครศรีธรรมราช </option>
														<option value='นราธิวาส'>นราธิวาส </option>
														<option value='ปัตตานี'>ปัตตานี </option>
														<option value='พังงา'>พังงา </option>
														<option value='พัทลุง'>พัทลุง </option>
														<option value='ภูเก็ต'>ภูเก็ต </option>
														<option value='ระนอง'>ระนอง </option>
														<option value='สตูล'>สตูล </option>
														<option value='สงขลา'>สงขลา </option>
														<option value='สุราษฎร์ธานี'>สุราษฎร์ธานี </option>
														<option value='ยะลา'>ยะลา </option>
											</select>
											</div>

					<div class='form-group col-md-3'>
					<label for='inputZip'>รหัสไปรษณีย์ :</label>
					<input type='text' class='form-control' name='pincode' required>
					</div>
					</div>
					

						<div class='form-group'>
							<label>รูปภาพ :</label>
							<input type='file' name='image' class='form-control'required><br>
							<img src = 'upload_images/$image' style='width:50px; height:50px'>
						</div>

						
						
						<div class='modal-footer'>
						<input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
					</div>


					</form>
					
				</div>

				</div>

			</div>
			</div>


			<!------DELETE modal---->
			<!-- Modal -->
			<?php
				include('config.php');

			$get_data = "SELECT * FROM student_data";
			$run_data = mysqli_query($con,$get_data);

			while($row = mysqli_fetch_array($run_data))
			{
				$id = $row['id'];
				echo "
			<div id='$id' class='modal fade' role='dialog'>
			<div class='modal-dialog'>

				<!-- Modal content-->
				<div class='modal-content  text-left '>
				<div class='modal-header text-left'>
					<center><h4 class='modal-title text-center'style='margin-center:250px'>Are you want to sure??</h4></center>

				</div>
				<div class='modal-body text-center '>
					<center><a href='delete.php?id=$id' class='btn btn-danger' style='margin-center:250px'>Delete</a></center>
					
					

				</div>

				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
				</div>

				</div>

			</div>
			</div>
			

			

				";
				
				
			}


			?>


			<!-- View modal  -->
			<?php 
			include('config.php');


			// <!-- profile modal start -->
			$get_data = "SELECT * FROM student_data";
			$run_data = mysqli_query($con,$get_data);

			while($row = mysqli_fetch_array($run_data))
			{
				$id = $row['id'];
				$card = $row['u_card'];
				$name = $row['u_f_name'];
				$name2 = $row['u_l_name'];
				$father = $row['u_father'];
				$mother = $row['u_mother'];
				$gender = $row['u_gender'];
				$email = $row['u_email'];
				$aadhar = $row['u_aadhar'];
				$Bday = $row['u_birthday'];
				$family = $row['u_family'];
				$phone = $row['u_phone'];
				$address = $row['u_state'];
				$village = $row['u_village'];
				$police = $row['u_police'];
				$dist = $row['u_dist'];
				$pincode = $row['u_pincode'];
				$state = $row['u_state'];
				$time = $row['uploaded'];
				
				$image = $row['image'];
				echo "
				<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
					</div>
					<div class='modal-body'>
					<div class='container' id='profile'> 
						<div class='row'>
							<div class='col-sm-4 col-md-2 ml-2 md-2 mr-2'>
								<img src='upload_images/$image' alt='' style='width: 170px; height: 200px;' ><br>
									<hr>
								<i class='fa fa-id-card' aria-hidden='true'> ไอดีสมาชิก :</i> $card<br>
								<i class='fa fa-phone' aria-hidden='true'> เบอร์โทร :</i> $phone  <br>
								วันที่เข้าทำงาน : <br> $time
							</div>
							
							<div class='col-sm-2 col-md-3 text-left  md-2 mr-2'>
							<h4>ชื่อ-สกุล:</h4>
								<h3 class='text-primary'>$name $name2</h3>
								<p class='text-secondary'>
								<strong>พนักงาน :</strong> $aadhar <br>
								<strong>เพศ :</strong><br>
								<i class='fa fa-venus-mars' aria-hidden='true'></i> $gender
								<br />
								<strong>Email :</strong><br>
								<i class='fa fa-envelope-o' aria-hidden='true'></i> $email
								<br />

								<p class='text-secondary'>
								<strong>วันที่เข้าทำงาน :</strong>  <br>
								<i class='fa fa-venus-mars' aria-hidden='true'></i> $time
								<br /><br>
								<i class='fa fa-home' aria-hidden='true'> <strong>ที่อยู่ :</strong><br></i> $village, $police, <br> $dist, $state - $pincode
								<br />
								</p>
								<!-- Split button -->
							</div>
						</div>

					</div>   
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
					</div>
					</form>
					</div>
				</div>
				</div> 

				";
			}


			// <!-- profile modal end -->


			?>





			<!----edit Data--->

			<?php
			include('config.php');


			$get_data = "SELECT * FROM student_data ";
			$run_data = mysqli_query($con,$get_data);

			

			while($row = mysqli_fetch_array($run_data))
			{
				$id = $row['id'];
				$card = $row['u_card'];
				$name = $row['u_f_name'];
				$name2 = $row['u_l_name'];
				$father = $row['u_father'];
				$mother = $row['u_mother'];
				$gender = $row['u_gender'];
				$email = $row['u_email'];
				$aadhar = $row['u_aadhar'];
				$Bday = $row['u_birthday'];
				$family = $row['u_family'];
				$phone = $row['u_phone'];
				$address = $row['u_state'];
				$village = $row['u_village'];
				$police = $row['u_police'];
				$dist = $row['u_dist'];
				$pincode = $row['u_pincode'];
				$state = $row['u_state'];
				$staffCard = $row['staff_id'];
				$time = $row['uploaded'];
				$image = $row['image'];
				echo "

			<div id='edit$id' class='modal fade' role='dialog'><br>
			<div class='modal-dialog'>
				
				<!-- Modal content-->
				<br>
				<div class='modal-content text-left '>
				<div class='modal-header'>
				<h4 class='modal-title text-center text-color-red'>Edit your Data</h4> 
						<button type='button' class='close ' data-dismiss='modal'>&times;</button>
						
				</div>

				<div class='modal-body'>
					<form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

					<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='inputEmail4'>รหัสสมาชิก :</label>
					<input type='text' class='form-control' name='card_no' placeholder='Enter 12-digit member Id.' maxlength='12' value='$card' required>
					</div>
					<div class='form-group col-md-6'>
					<label for='inputPassword4'>เบอร์โทรศัพท์ :</label>
					<input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='10' value='$phone' required>
					</div>
					</div>
					
					
					<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='firstname'>ชื่อจริง :</label>
					<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
					</div>
					<div class='form-group col-md-6'>
					<label for='lastname'>นามสกุล :</label>
					<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
					</div>
					</div>
					
	
					
					<div class='form-row'>
					<div class='form-group col-md-6'>
					<label for='email'>Email :</label>
					<input type='email' class='form-control' name='user_email' placeholder='Enter Email id' value='$email'>
					</div>
					<div class='form-group col-md-6'>
					<label for='aadharno'>พนักงาน/รานวันหรือรายเดือน :</label>
					<input type='text' class='form-control' name='user_aadhar' maxlength='12' placeholder='Enter 12-digit Aadhar no. ' value='$aadhar'>
					</div>
					</div>
					
					<div class='form-row'>
					<div class='form-group col-md-6 '>
					<label for='inputState'>เพศ :</label>
					<select id='inputState' name='user_gender' class='form-control' value='$gender'>
					<option selected>$gender</option>
					<option>Male</option>
					<option>Female</option>
					<option>Other</option>
					</select>
					</div>
					<div class='form-group col-md-6'>
					<label for='inputPassword4'>วันเดือนปีเกิด</label>
					<input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' value='$Bday'>
					</div>
					</div>
					
					
					<div class='form-group'>
					<label for='inputAddress'>บ้านเลขที่</label>
					<input type='text' class='form-control' name='village' placeholder='1234 Main St' value='$village'>
					</div>
					<div class='form-group'>
					<label for='inputAddress2'>หมู่ที่/หมู่บ้าน</label>
					<input type='text' class='form-control' name='police_station' placeholder='Enter police station' value='$police'>
					</div>
					<div class='form-row'>
					<div class='form-group col-md-5'>
					<label for='inputCity'>ตำบล/แขวง</label>
					<input type='text' class='form-control' name='dist' value='$dist'>
					</div>
					<div class='form-group col-md-4 '>
					<label for='inputState'>จังหวัด :</label>
							<select name='state' class='form-control'>
											<option>$state</option>
														<option value='กาฬสินธุ์'>กาฬสินธุ์</option>
														<option value='ขอนแก่น'>ขอนแก่น</option>
														<option value='ชัยภูมิ '>ชัยภูมิ </option>
														<option value='นครพนม '>นครพนม </option>
														<option value='นครราชสีมา'>นครราชสีมา </option>
														<option value='บึงกาฬ'>บึงกาฬ </option>
														<option value='บุรีรัมย์'>บุรีรัมย์ </option>
														<option value='มหาสารคาม '>มหาสารคาม </option>
														<option value='มุกดาหาร'>มุกดาหาร </option>
														<option value='ยโสธร'>ยโสธร </option>
														<option value='ร้อยเอ็ด'>ร้อยเอ็ด </option>
														<option value='เลย'>เลย </option>
														<option value='สกลนคร'>สกลนคร </option>
														<option value='สุรินทร์'>สุรินทร์ </option>
														<option value='ศรีสะเกษ'>ศรีสะเกษ</option>
														<option value='หนองคาย'>หนองคาย</option>
														<option value='หนองบัวลำภู'>หนองบัวลำภู </option>
														<option value='อุดรธานี'>อุดรธานี </option>
														<option value='กำแพงเพชร'>กำแพงเพชร </option>
														<option value='ชัยนาท'>ชัยนาท </option>
														<option value='นครนายก'>นครนายก </option>
														<option value='นครปฐม'>นครปฐม </option>
														<option value='นครสวรรค์'>นครสวรรค์ </option>
														<option value='นนทบุรี'>นนทบุรี </option>
														<option value='ปทุมธานี'>ปทุมธานี </option>
														<option value='พระนครศรีอยุธยา'>พระนครศรีอยุธยา </option>
														<option value='พิจิตร'>พิจิตร </option>
														<option value='พิษณุโลก'>พิษณุโลก </option>
														<option value='เพชรบูรณ์'>เพชรบูรณ์ </option>
														<option value='ลพบุรี'>ลพบุรี</option>
														<option value='สมุทรปราการ'>สมุทรปราการ </option>
														<option value='สมุทรสงคราม'>สมุทรสงคราม </option>
														<option value='สิงห์บุรี'>สิงห์บุรี  </option>
														<option value='สุโขทัย'>สุโขทัย  </option>
														<option value='สุพรรณบุรี'>สุพรรณบุรี  </option>
														<option value='สระบุรี'>สระบุรี  </option>
														<option value='อ่างทอง'>อ่างทอง  </option>
														<option value='อุทัยธานี'>อุทัยธานี  </option>
														<option value='จันทบุรี'>จันทบุรี </option>
														<option value='ฉะเชิงเทรา'>ฉะเชิงเทรา </option>
														<option value='ชลบุรี'>ชลบุรี </option>
														<option value='ตราด'>ตราด </option>
														<option value='ปราจีนบุรี'>ปราจีนบุรี </option>
														<option value='ระยอง'>ระยอง </option>
														<option value='สระแก้ว'>สระแก้ว </option>
														<option value='กาญจนบุรี'>กาญจนบุรี </option>
														<option value='ตาก'>ตาก </option>
														<option value='ประจวบคีรีขันธ์'>ประจวบคีรีขันธ์ </option>
														<option value='เพชรบุรี'>เพชรบุรี </option>
														<option value='ราชบุรี'>ราชบุรี </option>
														<option value='กระบี่'>กระบี่ </option>
														<option value='ชุมพร'>ชุมพร </option>
														<option value='ตรัง'>ตรัง </option>
														<option value='นครศรีธรรมราช'>นครศรีธรรมราช </option>
														<option value='นราธิวาส'>นราธิวาส </option>
														<option value='ปัตตานี'>ปัตตานี </option>
														<option value='พังงา'>พังงา </option>
														<option value='พัทลุง'>พัทลุง </option>
														<option value='ภูเก็ต'>ภูเก็ต </option>
														<option value='ระนอง'>ระนอง </option>
														<option value='สตูล'>สตูล </option>
														<option value='สงขลา'>สงขลา </option>
														<option value='สุราษฎร์ธานี'>สุราษฎร์ธานี </option>
														<option value='ยะลา'>ยะลา </option>
											</select>
											</div>

					<div class='form-group col-md-3'>
					<label for='inputZip'>รหัสไปรษณีย์ :</label>
					<input type='text' class='form-control' name='pincode' value='$pincode'>
					</div>
					</div>
					

						<div class='form-group'>
							<label>รูปภาพ :</label>
							<input type='file' name='image' class='form-control'><br>
							<img src = 'upload_images/$image' style='width:50px; height:50px'>
						</div>

						
						
						<div class='modal-footer'>
						<input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
					</div>


					</form>
				</div>

				</div>

			</div>
			</div>


				";
			}
			}

			?>

			<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
			<script>
				$(document).ready(function () {
				$('#myTable').DataTable();

				});
			</script>

			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

			</body>
			</html>