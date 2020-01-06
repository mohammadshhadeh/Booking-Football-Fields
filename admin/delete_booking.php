<?php
include('../include/connection.php');

$query  = "DELETE FROM booking WHERE booking_id= {$_GET['booking_id']}";
$result = mysqli_query($conn, $query);

header("Location: index.php"); /* back to manage admin page */
