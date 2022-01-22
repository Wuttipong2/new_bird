<?php 

    session_start();

    require_once "config.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO users (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($con, $query);
                
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");

               
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: register.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <style>
          body{
                background-image: url("https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
            }

            input{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                }



    </style>

</head>
<body>


    <div class="container my-6  mt-5">
<div class="card mx-auto" style="width: 25rem; ml-5 mt-5"><br>
<h2 style="text-align:center">Register Form</h2>
<img class="card-img-top mx-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSytag3pgSzcbVucIqNgMeDcclwAWCS4Jts7j44mGiA2UDWlEffEdkpo56abWff43fuN7U&usqp=CAU" style="width: 60%; " alt="Card image cap">

<div class="card-body" >
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Enter your username" required>
    <br><br>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Enter your password" required>
    <br><br>
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" placeholder="Enter your firstname" required>
    <br><br>
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" placeholder="Enter your lastname" required>
    <br><hr><br>
   <center><input type="submit" name="submit" class="submit btn btn-primary"value="Submit">
                </form>
                    <br>
                <a href="login.php">Go back to login</a>
</center>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>