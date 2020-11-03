<?php
session_start();
error_reporting(0);
include 'config.php';
$username = $password = $error = ' ';
if (isset($password)){
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
}
$sql = "SELECT * FROM users WHERE user_id = '$username' AND password = '$password' " ;

$result = mysqli_num_rows(mysqli_query($conn,$sql)) ;
if(isset($_REQUEST['password'])){

if ($result == 1){
    $error = ' <div class="green" style="background : greenyellow ; font-size : 20px ;">You Are Logged in !  </div> ' ;
    $_SESSION['suloggedin'] = TRUE ;
    $_SESSION['user'] = $username ;
} else {
    $error = ' <div class="red" style="background : red ; font-size : 20px ;">Invalid Detials !</div> ' ;
}
}

if($_SESSION['suloggedin']){
  header('location:studio');
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User-Login Form</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

<form class="box" action=" " method="post">
  <h1>User-Login</h1>
  <input type="text" name="username" placeholder="Username" required >
  <input type="password" name="password" placeholder="Password" required >
  <input type="submit" name="login" value="Login"> <?php echo $error ?>
</form>


</body>
</html>

