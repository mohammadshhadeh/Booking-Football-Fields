<?php
	session_start();
	unset($_SESSION['capstone_id']);
	header("location:login.php");

