<?php
include('config.php');
 if(isset($_POST['submit'])){		
 $firstErr    = '';
 $lastNameErr = '';
 $passwordErr = '';
 $unameErr    = '';
 $errmsg      = '';

   if (empty($_POST["fname"])) {
      $firstErr = "First name is required";

   	 } 


   if (empty($_POST["lname"])) {
      $lastNameErr = "Last name is required";
}
 			
	if (empty($_POST["pwd"])) {
      $passwordErr = "A password is required";
}
if (empty($_POST["conform"])) {
      $passwordErr = "A confirm password is required";
}
      if ($_POST["conform"] != $_POST["pwd"]) {
      	$passwordErr1 = "A confirm password and password not match";
}
   // success!

 
  	if (empty($_POST["uname"])) {
      $unameErr = "A uname is required";
  }

         
	if(empty($_POST["email"])){
		 $errmsg = 'Email field is required';
		}    
         
	
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
    if(!preg_match($regex, $_POST['email'])){
		$errmsg = 'wrong email format';
		}

		$duplicate=mysqli_query($conn,"select * from anu where email='".$_POST['email']."'");
	if (mysqli_num_rows($duplicate)== 0)
{
	



	 if(!empty($_FILES['image']['name'])){
			
		$file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
         move_uploaded_file($file_tmp,"upload/".$file_name);
         

   	  
				 
	if($_POST['fname']!='' && $_POST["lname"]!='' && $_POST["email"]!='' && $_POST['conform']&& $_POST["pwd"]!='' && $_POST["uname"]!='' && $_POST["gender"] !='' && $_POST["conform"] == $_POST["pwd"] && $_FILES !=''){
		  $sql ="INSERT INTO anu (fname, lname, email, pwd,  uname, gender,image)VALUES('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."','".trim(md5($_POST['pwd']))."' , '".$_POST['uname']."','".$_POST['gender']."','".$_FILES['image']['name']."' )";
													
		if(mysqli_query($conn,$sql)){
			echo "successfully Registered.";

		}
													
	
	}
							
	}else{
		$imgerr ='please upload image';
	}
}else{
	$msg = "email already exsist";
}
}

		
		?>	
<html>
	<head>
	</head>
	<body>
		<center><h1><i>Registeration Form <span style="color:red;"><?php if(isset($msg)) echo $msg; ?></span> </i></h1>
	<form action="" method="post" enctype="multipart/form-data">
	First Name<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>" ><span style="color:red;"> <?php if(isset($firstErr)) {echo $firstErr ;}?></span><br><br>
	Last Name<input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname'];?>" ><span style="color:red;"> <?php if(isset($lastNameErr)) echo $lastNameErr ;?></span><br><br>
	Email<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><span style="color:red;"> <?php if(isset($errmsg)){echo $errmsg;} ?></span> <br><br>
	password<input type="password" name="pwd" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd'];?>"><span style="color:red;"> <?php if(isset($passwordErr)) {echo $passwordErr ;}?></span><br><br>

		conform password<input type="password" name="conform" value="<?php if(isset($_POST['conform'])) echo $_POST['conform'];?>"> <span style="color:red;"> <?php if(isset($passwordErr1)) {echo $passwordErr1 ;}?></span><br><br>

	Uname<input type="text" name="uname" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>"><span style="color:red;"> <?php if(isset($unameErr)) echo $unameErr ;?></span><br><br>
	 gender<input type="radio" name="gender" checked value="male">male 
	 <input type="radio" name="gender" value="female">female <br><br>
	  <input type="file" name="image" id="image"><span style="color:red;"><?php if(isset($imgerr)) echo $imgerr;?></span><br><br>

	<input type="submit" value="Submit" name="submit">
	
	</form>
		<a href="login.php"><h1>login</h1></a>
</center>
	</body>
</html>