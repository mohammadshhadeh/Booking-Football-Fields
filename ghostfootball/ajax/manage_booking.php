<?php
if (isset($_GET['dur'])) {
	echo '
	<option value="" selected disabled>Duration</option>
	<option value="1">1 hour</option>
	<option value="2">2 hours</option>';
}
if (isset($_GET['durpick'])) {
	$words = preg_replace('/[0-9]+/', '', $_GET['start_time']);
	if ($words == "PM") {
		$start_time = (int)$_GET['start_time'];
		$durpick = $_GET['durpick'];
		$new = $start_time + $durpick;
		if ($start_time == 11 && $durpick == 1) {
			echo "<option value='12AM' selected>12:00 AM</option>";
		}elseif($start_time == 10 &&  $durpick == 2 ){
			echo "<option value='12AM' selected>12:00 AM</option>";
		}elseif($start_time == 11 &&  $durpick == 2 ){
			echo "<option value='1AM' selected>1:00 AM</option>";
		}elseif($start_time == 12 && $durpick == 1){
			echo "<option value='1PM' selected>1:00 PM</option>";
		}elseif($start_time == 12 && $durpick == 2){
			echo "<option value='2PM' selected>2:00 PM</option>";
		}else{
			$val = $new . "PM";
			echo "<option value='$val' selected>$new:00 PM</option>";
		}
	}elseif ($words == "AM") {
		$start_time = (int)$_GET['start_time'];
		$durpick = $_GET['durpick'];
		$new = $start_time + $durpick;
		if ($start_time == 11 && $durpick == 1) {
			echo "<option value='12PM' selected>12:00 PM</option>";
		}elseif($start_time == 10 &&  $durpick == 2 ){
			echo "<option value='12PM' selected>12:00 PM</option>";
		}elseif($start_time == 11 &&  $durpick == 2 ){
			echo "<option value='1PM' selected>1:00 PM</option>";
		}elseif($start_time == 12 && $durpick == 1){
			echo "<option value='1AM' selected>1:00 AM</option>";
		}elseif($start_time == 12 && $durpick == 2){
			echo "<option value='2AM' selected>2:00 AM</option>";
		}else{
			$val = $new . "AM";
			echo "<option value='$val' selected>$new:00 AM</option>";
		}
	}
}
?>
