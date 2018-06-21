<?php
include('config.php');
$id = $_GET['id'];
$sql = "SELECT * FROM anu where id ='".$id."'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file = $row['image'];   
 $sql="DELETE FROM anu WHERE id='".$id."'";
 	 mysqli_query($sql,$conn);
if($conn->query($sql) === TRUE) {
     unlink('upload/'.$file);
   header('Location:home.php?message=del');
}
 /*else {
 
}*/
	/*$file = glob('upload/');
	foreach($files as $file){
  if(is_file($file)) {
    // delete file
    unlink($file);
  }*/
}
//array_map('unlink', glob("upload/*"));
 ?>