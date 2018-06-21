<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("config.php");
 if(isset($_POST['submit'])){

 $email = trim($_POST['email']);
 $pwd   = trim($_POST['pwd']);
   
   $errmsg  ='';
   $passwordErr='';

  if(empty($email)){
    $errmsg = "Email is not valid"; 
    }
  if(empty($pwd)){
    $passwordErr= "Password is required" ;
    }

  if($email !='' &&  $pwd !='' ){
   $sql = "SELECT * FROM anu where email='".$email."' AND pwd='".md5($pwd)."'"; 

  $loginresult = mysqli_query($conn,$sql);
 
  $row1 = mysqli_num_rows($loginresult);
  
  if($row1 > 0){
     $session = mysqli_fetch_assoc($loginresult); 
     session_start();
    $_SESSION['name'] = $session['fname'];
    $_SESSION['data'] = $session;
    header('Location:home.php');
  } else{
    echo "Invalid Details";
  }
}
  }
?>
<html>
<body>
  <h1>Login Form</h1>
 <form action="" method="post">
  
  Email<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><span style="color:red;"><?php if(isset($errmsg)){echo $errmsg;} ?></span> <br><br>
  password<input type="password" name="pwd" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd'];?>"><span style="color:red;"><?php if(isset($passwordErr)) {echo $passwordErr;}?></span><br><br>
  <input type="submit" value="login" name="submit">
  
  
  
  </form>
  <a href="index.php">register</a>
<body>
<html> 