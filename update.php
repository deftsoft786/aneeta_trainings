	<?php 
	include('config.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$record =  "SELECT * FROM anu WHERE id= '".$id."'";
		$result = mysqli_query ($conn, $record);
		if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
			//print_r($row['gender']);			
			}			
		}
if(isset($_POST['update'])){	
 //print_r($_POST);
//print_r($_POST['fname']);

	 $firstErr    = '';
     $lastNameErr = '';
     $unameErr    = '';
     $errmsg      = '';

   if (empty($_POST["fname"])) {
      $firstErr = "First name is required";
   	 } 
   if (empty($_POST["lname"])) {
      $lastNameErr = "Last name is required";
}
if(empty($_POST['uname'])){
	$unameErr = "A uname is required";
}
	if(empty($_POST['email'])){
		$unameErr = "A uname is required";
	}
	
	if($_POST["fname"]!='' && $_POST["lname"]!='' && $_POST["email"]!='' && $_POST["uname"]!='' && $_POST["gender"] !=''){
		if(!empty($_FILES['image']['name'])){
	   $sql ="UPDATE anu SET fname ='".$_POST['fname']."', lname ='".$_POST['lname']."', email = '".$_POST['email']."', uname = '".$_POST['uname']."', gender = '".$_POST['gender']."', image='".$_FILES['image']['name']."' WHERE id = '".$id."'";	
	   				
	 	unlink('upload/'.$row['image']);
   	    $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
         move_uploaded_file($file_tmp,"upload/".$file_name);


}else{
	 $sql ="UPDATE anu SET fname ='".$_POST['fname']."', lname ='".$_POST['lname']."', email = '".$_POST['email']."', uname = '".$_POST['uname']."', gender = '".$_POST['gender']."',image='".$row['image']."' WHERE id = '".$id."'";

}
mysqli_query($conn,$sql);
header('Location:home.php');
}
 
}	

?>
<html>
	<head>
	</head>
	<body>
		<center><h1><i>Update Form </i></h1>
	<form action="" method="post" enctype="multipart/form-data">
	First Name<input type="text" name="fname" value="<?php echo $row['fname']; ?>" placeholder = "" ><span style="color:red;"> <?php if(isset($firstErr)) {echo $firstErr ;}?></span><br><br>
	Last Name<input type="text" name="lname" value="<?php echo $row['lname']; ?>" placeholder="" ><span style="color:red;"> <?php if(isset($lastNameErr)) echo $lastNameErr ;?></span><br><br>
	Email<input type="text" name="email" value="<?php echo $row['email'] ;?>" placeholder=""><span style="color:red;"> <?php if(isset($errmsg)){echo $errmsg;} ?></span> <br><br>
		Uname<input type="text" name="uname" value="<?php echo $row['uname']; ?>" placeholder=""><span style="color:red;"> <?php if(isset($unameErr)) echo $unameErr ;?></span><br><br>
	 gender<input type="radio" name="gender" <?Php if($row['gender']=='male') {echo 'checked';}?> value="male">male 
	       <input type="radio" name="gender" <?Php if($row['gender']=='female') {echo 'checked';}?> value="female">female <br><br>
	  <input type="file" name="image" id="image"><span><img width="50px"src="upload/<?php echo $row['image']; ?>"></span><span style="color:red;"><?php if(isset($imgerr)) echo $imgerr;?></span><br><br>
	<input type="submit" value="Update" name="update">
</form>
		<a href="login.php"><h1>back</h1></a>
</center>
	</body>
</html>