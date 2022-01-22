<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
echo "<script type='text/javascript'>";
		echo "alert('คุณต้องการออกจากระบบใช่หรือไม่ !!!');";
		echo "window.location = 'index.php'; ";
		echo "</script>";

exit;
?>