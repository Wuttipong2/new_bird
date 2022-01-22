<?php 

    session_start();
    

    if (isset($_POST['username'])) {

        include('config.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordenc'";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
            
            if ($_SESSION['userlevel'] == 'a') {
                echo '<script>
             setTimeout(function() {
              swal({
                  title: "Login Admin สำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "index_page.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 500);
        </script>';
            }

            if ($_SESSION['userlevel'] == 'm') {
                echo '<script>
                setTimeout(function() {
                 swal({
                     title: "Login Member สำเร็จ",
                     type: "success"
                 }, function() {
                     window.location = "user_page.php"; //หน้าที่ต้องการให้กระโดดไป
                 });
               }, 500);
           </script>';
            }
        } else {
            echo '<script>
                setTimeout(function() {
                 swal({
                     title: "User หรือ Password ไม่ถูกต้อง",
                     type: "error"
                 }, function() {
                     window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
                 });
               }, 500);
           </script>';
        }

    } else {
        header("Location: index.php");
    }


?>