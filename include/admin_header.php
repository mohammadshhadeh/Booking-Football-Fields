<?php
	include('connection.php');
	session_start();
	if (!isset($_SESSION['capstone_id'])) {
		header("location:login.php");
		exit();
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ghost Football Admin</title>
	<meta name="description" content="Ela Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="../ghostfootball/images/ghost_football_round_logo.png">
	<link rel="shortcut icon" href="../ghostfootball/images/ghost_football_round_logo.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
	<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Lora|Mukta|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<style>
		table,
		form {
			font-family: 'Mukta', sans-serif;
		}

		#weatherWidget .currentDesc {
			color: #ffffff!important;
		}

		.traffic-chart {
			min-height: 335px;
		}

		#flotPie1  {
			height: 150px;
		}

		#flotPie1 td {
			padding:3px;
		}

		#flotPie1 table {
			top: 20px!important;
			right: -10px!important;
		}

		.chart-container {
			display: table;
			min-width: 270px ;
			text-align: left;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		#flotLine5  {
			height: 105px;
		}

		#flotBarChart {
			height: 150px;
		}

		#cellPaiChart{
			height: 160px;
		}

		.right-panel .navbar-brand {
			width: 185px!important;
		}
</style>
</head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#size").change(function() {
				//get selected parent option
				var aside_number = $("#size").val();
				var pitch_id     = $("#pitch").val();
				//alert(admin_id);
				$.ajax({
					type: "GET",
					url: "ajax/aside-ajax.php?aside_number=" + aside_number + "&pitch_id=" + pitch_id,
					success: function(data) {
						$("#names").html(data);
					}
				});
			});

			$("#pitch").change(function() {
				//get selected parent option
				var pitch_id = $("#pitch").val();
				//alert(admin_id);
				$.ajax({
					type: "GET",
					url: "names1.php?pitch_id=" + pitch_id,
					success: function(data) {
						$("#size").html(data);
					}
				});
			});
		});
	</script>
<body>
	<!-- Left Panel -->
	<aside id="left-panel" class="left-panel">
		<nav class="navbar navbar-expand-sm navbar-default">
			<div id="main-menu" class="main-menu collapse navbar-collapse ">
				<ul class="nav navbar-nav">
					<li class="menu-title">Dashboard</li>
					<li>
						<a href="index.php"><i class="menu-icon fa fa-laptop"></i>Home</a>
					</li>
					<li class="menu-title">Admin</li>
					<li>
						<a href="manage_admin.php"><i class="menu-icon fa fa-user"></i>Manage Admin</a>
					</li>
					<li class="menu-title">Stadium</li>
					<li>
						<a href="manage_pitches.php"><i class="menu-icon fas fa-futbol"></i>Manage Pitches</a>
					</li>
					<li>
						<a href="manage_aside.php"><i class="menu-icon fa fa-square"></i>Manage Aside</a>
					</li>
					<li>
						<a href="manage_images.php"><i class="menu-icon fas fa-images"></i>Manage Images</a>
					</li>
				</ul>
			</div>
		</nav>
	</aside>
	<!-- /#left-panel -->
	<!-- Right Panel -->
	<div id="right-panel" class="right-panel">
	<!-- Header-->
	<header id="header" class="header">
		<div class="top-left">
			<div class="navbar-header">
				<a class="navbar-brand" href="./"><img src="../ghostfootball/images/ghost.png" alt="Logo"></a>
				<a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
				<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
			</div>
		</div>
		<div class="top-right">
			<div class="header-menu">
				<div class="user-area dropdown float-right">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php
						$query  = "SELECT * FROM admin WHERE admin_id = {$_SESSION['capstone_id']}";
						$result = mysqli_query($conn,$query);
						$row    =mysqli_fetch_assoc($result);
						echo "{$row['admin_name']} &nbsp";
						echo "<img class='user-avatar rounded-circle' src='upload/{$row['admin_image']}' alt='User Avatar'>";
						?>
					</a>
					<div class="user-menu dropdown-menu">
						<a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
					</div>
				</div>
			</div>
		</div>
	</header>