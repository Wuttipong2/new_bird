<?php

include('config.php');
$id = $_GET['m_id'];
$delete = "DELETE FROM member_data WHERE m_id = $id";
$run_data = mysqli_query($con,$delete);

echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
if($run_data){
	echo "<script type='text/javascript'>";
		echo "alert('คุณต้องการลบข้อมูลใช่หรือไม่ !!!');";
		echo "alert('ลบ Member สำเร็จ !!!');";
		echo "window.location = 'user_page.php'; ";
		echo "</script>";
}else{
	echo "<script type='text/javascript'>";
		echo "alert('เกิดข้อผิดพลาดกรุณาทำรายการใหม่อีกครั้ง !!!');";
		echo "window.location = 'user_page.php'; ";
		echo "</script>";
}


?>