<?php
	include('../include/connection.php');

	$result = mysqli_query($conn, "SELECT * FROM aside where aside_number={$_GET['aside_number']} AND pitch_id={$_GET['pitch_id']}");

	echo "<option disabled Selected> Select Aside</option>";
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='{$row['aside_id']}'>{$row['aside_name']}</option>";
	}

