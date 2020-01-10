<?php
//upload.php
include ('../includes/connection.php');
session_start();
if($_FILES["file"]["name"] != '')
{
$query   = "SELECT * FROM customer WHERE customer_id = {$_SESSION['customer_id']}";
$result  = mysqli_query($conn,$query);
$row     = mysqli_fetch_assoc($result);
if ($row['cover_image'] != "default/bg-cover.jpg") {
	unlink("../upload/{$row['cover_image']}");
}

 $test 		= explode('.', $_FILES["file"]["name"]);
 $ext  		= end($test);
 $name 		= rand(100, 999) . '.' . $ext;
 $tmp_name 	= $_FILES["file"]["tmp_name"];
 $path 		= "../upload/";  

 move_uploaded_file($tmp_name, $path.$name);

$query2  = "UPDATE customer SET  cover_image='$name' WHERE customer_id = {$_SESSION['customer_id']}" ;

if ($result2 = mysqli_query($conn,$query2)) {
	
echo "<img class='nothing' id='backgroundPic' src='images/blank.png' style='background-image:url(upload/{$name});background-size:cover;'>";
	
}

}
?>