<?php
	include('../include/connection.php');

	$result = mysqli_query($conn, "SELECT DISTINCT aside_number FROM aside where pitch_id={$_GET['pitch_id']}");

	echo "<option disabled Selected> Select Size</option>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='{$row['aside_number']}'>{$row['aside_number']}</option>";
	}

