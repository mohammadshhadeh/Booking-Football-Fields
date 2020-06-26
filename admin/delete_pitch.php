<?php
include('../include/connection.php');

$query  = "SELECT * FROM pitch inner join aside on aside.pitch_id = pitch.pitch_id INNER join images on aside.aside_id = images.aside_id Where pitch.pitch_id = {$_GET['pitch_id']} ";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['pitch_image']}");
unlink("upload/{$row['aside_image']}");

$query  = "DELETE pitch,aside,images FROM pitch join aside on aside.pitch_id = pitch.pitch_id  join images on aside.aside_id = images.aside_id Where pitch.pitch_id = {$_GET['pitch_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_pitches.php"); /* back to manage admin page */
