<?php
	include('config.php');
session_start();
if(empty($_SESSION['name'])){
	header('Location:login.php');
}
 $anu='anu';
 $ZDI = 'DESC';
$sql = "SELECT * FROM anu";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $sat = "0 results";
}
if(isset($_GET['message'])){
	if($_GET['message']=='del'){
		$message = 'Record Deleted Successfully';
	}
}
    $results_per_page = 8; 
    $datatable = 'data';
    $ZDI = 'DESC';
    if (isset($_GET["page"])) { 
        $page  = $_GET["page"]; }else { $page=1; }
        $start_from = ($page-1) * $results_per_page;
         $anu='anu';
    $select_from='select_from';
         $sql = "SELECT * FROM ".$anu;
            if(isset($_GET['src'])){
                $search = $_GET['src'];
         $sql .= " WHERE fname like '%$search%'"; 
            }
           if( isset($_GET['asc'])){
                
                $order = $_GET['asc'];
                $ZDI = isset($_GET['ordering'])?$_GET['ordering']:'DESC';
                
                 switch(strtoupper($ZDI))
           {
                  case 'DESC': $ZDI = 'ASC'; break;
                  case 'ASC': $ZDI = 'DESC'; break;
                  default: $ZDI;
           }
            $sql .= " ORDER BY ".$order." ".$ZDI;
            }
           
       $sql .= " LIMIT ".$start_from.", ".$results_per_page;
            
           $rs_result = $conn->query($sql);
             

            
            $rs_result = $conn->query($sql);
            $data =array(); 
            while($row = $rs_result->fetch_assoc()){
            $data[] = $row;
            }
        
            while($row = $rs_result->fetch_assoc()){
            $data[] = $row;
            }

      
        

?>

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.abc{
	float:right;
}


</style>
</head>
<body>
    <from >
         <div class= "search">
        <form action= "" method = "get" >
        Search: <input type  = "text" placeholder = "Search" Name = "src" > 
        <input type="submit" name = "search" value="Submit">
        </div>
     </from>
         <div class="abc">
<a href="logout.php" name="button">Log Out</a>
</div> 
<h4>Hi <?php echo $_SESSION['name'];  ?></h4>
 <a href="index.php"> Registration Form</a><span style="color:red;"> <?php if(isset($message)) {echo $message ;}?></span>
<table>
  <tr>
    <th>Image</th>
    <th> <a href="home.php?asc=fname&ordering=<?php echo $ZDI; ?>">First Name</a></th>
    <th>Last name</th>
    <th>Email Address</th>
    <th>Uname</th>
    <th>Action</th>
  </tr>
 <?php if(!empty($data)){?> 
<?php foreach($data as $value){ ?>
<tr>
	
    <td><img width="50px" src="upload/<?php echo $value['image'];  ?>"></td>
    <td><?php echo $value['fname'] ;?></td>
    <td><?php echo $value['lname'] ;?></td>
    <td><?php echo $value['email'] ;?></td>
    <td><?php echo $value['uname'] ;?></td>
<td><a href="update.php?id=<?php echo $value['id'];?> ">Edit</a> 
 <a href="delete.php?id=<?php echo $value['id']; ?>">Delete</a></td>
</tr>
  <?php } }else{ ?>
  	<tr>
	
    <td colspan="6"><?php if(isset($sat))echo $sat;  ?></td>    
</tr>
<?php }?>
</table>

 
<div class = "pagination">
            <?php 
            $sql = "SELECT COUNT(ID) AS total FROM ".$anu;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_pages = ceil($row["total"] / $results_per_page); 
            for ($i=1; $i<=$total_pages; $i++) {  
            echo "<a href='home.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
        } 
        ?>  
        </div>

</body>

<script>
/*function myFunction() {
    // Declare variables
    var input, filter, tr;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}*/
</script>
</html>
