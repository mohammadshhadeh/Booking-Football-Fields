<?php
include('../includes/connection.php');
session_start();


if (isset($_GET['date'])) {

	$query  = " SELECT * FROM customer inner join booking on customer.customer_id = booking.customer_id inner join aside on booking.aside_id = aside.aside_id inner join pitch on aside.pitch_id = pitch.pitch_id WHERE booking.customer_id = {$_SESSION['customer_id']} AND booking.booking_date = '{$_GET['date']}'";
	$result = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>
		<td><span>{$row['pitch_name']}</span> </td>
		<td><span>{$row['aside_name']} {$row['aside_number']} aside </span> </td>
		<td><span>{$row['booking_date']}</span></td>
  		<td><span> ";
  	echo $row['hour_start'] .' - '. $row['hour_end'];
  		
   echo"</span></td>
		<td><span>{$row['price']} $</span> </td>
		<td><a class='btn btn-danger' href='ajax/booking_details.php?delete={$row['booking_id']}' >Delete</a></td>
	</tr>";
	}


}


if (isset($_GET['delete'])) {
	
	$query = "DELETE FROM booking WHERE booking_id = {$_GET['delete']} ";
	$result = mysqli_query($conn,$query);
    echo "<script> window.top.location='../profile.php'</script>";
}

