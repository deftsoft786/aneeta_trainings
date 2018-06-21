<html>

<body>

	<div class = "login" >
		<form action = "" method = "post">
		Email: 		<input type = "email" placeholder = "email" name = "email"> <?php if(isset($emailErr)) echo $emailErr; ?> </br></br>
		Password: 	<input type = "password" placeholder = "Password" name = "password"> <?php if(isset($passwordErr)) echo $passwordErr ;?> </br></br>
					<button type = "submit" name= "submit"> Submit </button>
				</div>
		</form>
</body>
</html>