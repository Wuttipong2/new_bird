                            <?php 

                            session_start();
                            include('config.php');

                            if (!$_SESSION['userid']) {
                                header("Location: user_page.php");
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
                                echo "alert('เพิ่มข้อมูลไม่สำเร็จกรุณากรอกให้ครบถ้วน!!!');";
                                echo "window.location = 'index_page.php'; ";
                                echo "</script>";
                                
                            }

                            }
                            ?>






                            <!DOCTYPE html>
                            <html>
                            <head>
                            <title>member view Page</title>

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

                                            .showmember{
                                                font-family: 'Lucida Console', Monaco, monospace;
                                            font-size: 90px;
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

                            
                            <div class="showmember">
                            <center><h1>You are Member ID:<?php echo $_SESSION['userid']; ?></h1></center>
                            <center><h3 >Hi, Welcome <?php echo $_SESSION['user']; ?>  Member ID:<?php echo $_SESSION['userid']; ?> Userlevel:<?php echo $_SESSION['userlevel']; ?> </h3></center>
                        </div>
                            <div class="container">
                            <a href="https://lexacademy.in" target="_blank"><img src="https://lexacademy.in/wp-content/uploads/2021/07/lex-academy-online-learning-platform-1.png" alt="" width="350px" ></a><br>
                            <center><h1 class="showtitle">Show all member information</h1>
                        </center>


                            <a href="logout.php" class="btn btn-success pull-left"><i class="fa fa-lock"></i> Logout</a>
                           
                            <a href="export.php" class="btn btn-success pull-right"><i class="fa fa-download"></i> Export Data</a><be>
                            <br>

                            <table class="table table-bordered table-striped table-hover text-center mt-2 " id="myTable"><br>
                                <thead>
                                    <tr>
                                    <th class="text-center" scope="col">S.L</th>
                                        <th class="text-center" scope="col">ชื่อ-สกุล</th>
                                        <th class="text-center" scope="col">รหัสสมาชิก</th>
                                        <th class="text-center" scope="col">เบอร์โทร</th>
                                        <th class="text-center" scope="col">วันที่เข้าทำงาน</th>
                                        <th class="text-center" scope="col">ดูข้อมูล</th>
                                        <th class="text-center" scope="col">ลบ</th>
                                        
                                        
                                    </tr>
                                </thead>
                                

                                    <?php
                                            
                                            include('config.php');

                                    $get_data = "SELECT * FROM member_data order by 1 desc";
                                    $run_data = mysqli_query($con,$get_data);
                                    $i = 0;
                                    while($row = mysqli_fetch_array($run_data))
                                    {
                                        $sl = ++$i;
                                        $id = $row['m_id'];
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
                                        
                                            <a href='#' class='btn btn-danger deleteuser' title='Delete'>
                                                 <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
                                            </a>
                                        </span>
                                        
                                    </td>
                                            </span>
                                            
                                        </td>
                                       
                                            
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
                            <button type="button left" class="close" data-dismiss="modal">&times;</button>
                            <center><img src="https://lexacademy.in/wp-content/uploads/2021/07/lex-academy-online-learning-platform-1.png" width="300px" height="80px" alt=""></center>

                            </div>
                            <div class="modal-body w-100 text-left">
                            <form method="POST" enctype="multipart/form-data">

                            <!-- This is test for New Card Activate Form  -->
                            <!-- This is Address with email id  -->
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Student Id.</label>
                            <input type="text" class="form-control" name="card_no" placeholder="Enter 12-digit Student Id." maxlength="12" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile No.</label>
                            <input type="phone" class="form-control" name="user_phone" placeholder="Enter 10-digit Mobile no." maxlength="10" required>
                            </div>
                            </div>


                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="user_first_name" placeholder="Enter First Name">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="user_last_name" placeholder="Enter Last Name">
                            </div>
                            </div>


                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="fathername">Father's Name</label>
                            <input type="text" class="form-control" name="user_father" placeholder="Enter First Name">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mothername">Mother's Name</label>
                            <input type="text" class="form-control" name="user_mother" placeholder="Enter Last Name">
                            </div>
                            </div>


                            <div class="form-row" style="color: skyblue;">
                            <div class="form-group col-md-6">
                            <label for="email">Email Id</label>
                            <input type="email" class="form-control" name="user_email" placeholder="Enter Email id">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="aadharno">Aadhar No.</label>
                            <input type="text" class="form-control" name="user_aadhar" maxlength="12" placeholder="Enter 12-digit Aadhar no. ">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputState">Gender</label>
                            <select id="inputState" name="user_gender" class="form-control">
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Date of Birth</label>
                            <input type="date" class="form-control" name="user_dob" placeholder="Date of Birth">
                            </div>
                            </div>


                            <div class="form-group">
                            <label for="family">Family Member's</label>
                            <textarea class="form-control" name="family" rows="3"></textarea>
                            </div>



                            <div class="form-group">
                            <label for="inputAddress">Village</label>
                            <input type="text" class="form-control" name="village" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                            <label for="inputAddress2">Police Station</label>
                            <input type="text" class="form-control" name="police_station" placeholder="Enter police station">
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">District</label>
                            <input type="text" class="form-control" name="dist">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select name="state" class="form-control">
                            <option selected>Choose...</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" name="pincode">
                            </div>
                            </div>


                            <div class="form-group">
                            <label for="inputAddress">Staff Id one who add this Student.</label>
                            <input type="text" class="form-control" name="staff_id" maxlength="12" placeholder="Enter 12-digit Staff Id">
                            </div>



                            <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" >
                            </div>


                            <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">


                            </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                            </div>
                            </div>


                            <!------DELETE modal---->
			<!-- Modal -->
			<?php
				include('config.php');

			$get_data = "SELECT * FROM member_data WHERE m_id = $id";
			$run_data = mysqli_query($con,$get_data);

			while($row = mysqli_fetch_array($run_data))
			{
				$id = $row['m_id'];
               
				echo "
			<div id='$id' class='modal fade' role='dialog'>
			<div class='modal-dialog'>

				<!-- Modal content-->
				<div class='modal-content  text-left '>
				<div class='modal-header text-left'>
					<center><h4 class='modal-title text-center'style='margin-center:250px'>Are you want to sure??</h4></center>

				</div>
				<div class='modal-body text-center '>
					<center><a href='delete2.php?id=$id' class='btn btn-danger' style='margin-center:250px'>Delete</a></center>
					
					

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
                            $get_data = "SELECT * FROM member_data";
                            $run_data = mysqli_query($con,$get_data);

                            while($row = mysqli_fetch_array($run_data))
                            {
                            $id = $row['m_id'];
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
								<img src='upload_images/$image' alt='' style='width: 150px; height: 200px;' ><br>
									<hr>
								<i class='fa fa-id-card' aria-hidden='true'> ไอดี :</i> $card<br>
								<i class='fa fa-phone' aria-hidden='true'> เบอร์โทร :</i> $phone  <br>
								วันที่เข้าทำงาน : <br> $time
							</div>
							
							<div class='col-sm-2 col-md-3 text-left ml-2 md-2 mr-2'>
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


                            $get_data = "SELECT * FROM member_data";
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

                            <div id='edit$id' class='modal fade' role='dialog'mt-5><br><hr>
                            <div class='modal-dialog'>
                            <hr>
                            <!-- Modal content-->
                            <br><hr>
                            <div class='modal-content'>
                            <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title text-center'>Edit your Data</h4> 
                            </div>

                            <div class='modal-body'>
                            <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

                            <div class='form-row'>
                            <div class='form-group col-md-6'>
                            <label for='inputEmail4'>Student Id.</label>
                            <input type='text' class='form-control' name='card_no' placeholder='Enter 12-digit Student Id.' maxlength='12' value='$card' required>
                            </div>
                            <div class='form-group col-md-6'>
                            <label for='inputPassword4'>Mobile No.</label>
                            <input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='10' value='$phone' required>
                            </div>
                            </div>


                            <div class='form-row'>
                            <div class='form-group col-md-6'>
                            <label for='firstname'>First Name</label>
                            <input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
                            </div>
                            <div class='form-group col-md-6'>
                            <label for='lastname'>Last Name</label>
                            <input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
                            </div>
                            </div>


                            <div class='form-row'>
                            <div class='form-group col-md-6'>
                            <label for='fathername'>Father's Name</label>
                            <input type='text' class='form-control' name='user_father' placeholder='Enter First Name' value='$father'>
                            </div>
                            <div class='form-group col-md-6'>
                            <label for='mothername'>Mother's Name</label>
                            <input type='text' class='form-control' name='user_mother' placeholder='Enter Last Name' value='$mother'>
                            </div>
                            </div>


                            <div class='form-row'>
                            <div class='form-group col-md-6'>
                            <label for='email'>Email Id</label>
                            <input type='email' class='form-control' name='user_email' placeholder='Enter Email id' value='$email'>
                            </div>
                            <div class='form-group col-md-6'>
                            <label for='aadharno'>Aadhar No.</label>
                            <input type='text' class='form-control' name='user_aadhar' maxlength='12' placeholder='Enter 12-digit Aadhar no. ' value='$aadhar'>
                            </div>
                            </div>

                            <div class='form-row'>
                            <div class='form-group col-md-6 mt-5'>
                            <label for='inputState'>Gender</label>
                            <select id='inputState' name='user_gender' class='form-control' value='$gender'>
                            <option selected>$gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                            </select>
                            </div>
                            <div class='form-group col-md-6'>
                            <label for='inputPassword4'>Date of Birth</label>
                            <input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' value='$Bday'>
                            </div>
                            </div>


                            <div class='form-group'>
                            <label for='family'>Family Member's</label>
                            <textarea class='form-control' name='family' rows='3'>$family</textarea>
                            </div>



                            <div class='form-group'>
                            <label for='inputAddress'>Village</label>
                            <input type='text' class='form-control' name='village' placeholder='1234 Main St' value='$village'>
                            </div>
                            <div class='form-group'>
                            <label for='inputAddress2'>Police Station</label>
                            <input type='text' class='form-control' name='police_station' placeholder='Enter police station' value='$police'>
                            </div>
                            <div class='form-row'>
                            <div class='form-group col-md-6'>
                            <label for='inputCity'>District</label>
                            <input type='text' class='form-control' name='dist' value='$dist'>
                            </div>
                            <div class='form-group col-md-4'>
                            <label for='inputState'>State</label>
                            <select name='state' class='form-control'>
                            <option>$state</option>
                            <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                                    <option value='Assam'>Assam</option>
                                                    <option value='Bihar'>Bihar</option>
                                                    <option value='Chandigarh'>Chandigarh</option>
                                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                                    <option value='Dadar and Nagar Haveli'>Dadar and Nagar Haveli</option>
                                                    <option value='Daman and Diu'>Daman and Diu</option>
                                                    <option value='Delhi'>Delhi</option>
                                                    <option value='Lakshadweep'>Lakshadweep</option>
                                                    <option value='Puducherry'>Puducherry</option>
                                                    <option value='Goa'>Goa</option>
                                                    <option value='Gujarat'>Gujarat</option>
                                                    <option value='Haryana'>Haryana</option>
                                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                                    <option value='Jharkhand'>Jharkhand</option>
                                                    <option value='Karnataka'>Karnataka</option>
                                                    <option value='Kerala'>Kerala</option>
                                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                                    <option value='Maharashtra'>Maharashtra</option>
                                                    <option value='Manipur'>Manipur</option>
                                                    <option value='Meghalaya'>Meghalaya</option>
                                                    <option value='Mizoram'>Mizoram</option>
                                                    <option value='Nagaland'>Nagaland</option>
                                                    <option value='Odisha'>Odisha</option>
                                                    <option value='Punjab'>Punjab</option>
                                                    <option value='Rajasthan'>Rajasthan</option>
                                                    <option value='Sikkim'>Sikkim</option>
                                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                                    <option value='Telangana'>Telangana</option>
                                                    <option value='Tripura'>Tripura</option>
                                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                                    <option value='Uttarakhand'>Uttarakhand</option>
                                                    <option value='West Bengal'>West Bengal</option>
                            </select>
                            </div>
                            <div class='form-group col-md-2'>
                            <label for='inputZip'>Zip</label>
                            <input type='text' class='form-control' name='pincode' value='$pincode'>
                            </div>
                            </div>


                            <div class='form-group'>
                            <label for='inputAddress'>Staff Id one who Activate this card.</label>
                            <input type='text' class='form-control' name='staff_id' maxlength='12' placeholder='Enter 12-digit Staff Id' value='$staffCard'>
                            </div>


                            <div class='form-group'>
                            <label>Image</label>
                            <input type='file' name='image' class='form-control'>
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