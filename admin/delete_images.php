<?php
include('../include/connection.php');

$query  = " SELECT * FROM images WHERE image_id= {$_GET['image_id']} ";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['aside_image']}");

$query  = "DELETE FROM images WHERE image_id = {$_GET['image_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_images.php"); /* back to manage admin page */
