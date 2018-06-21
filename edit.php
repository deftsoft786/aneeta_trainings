<html>
	<head>
	</head>
	<body>
		<center><h1><i>Update Form </i></h1>
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