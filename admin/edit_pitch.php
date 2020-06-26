<?php
	include ('../include/admin_header.php');

	if (isset($_POST['submit'])) {
		// fetch data
		$pitch_name       = $_POST['pitch_name'];
		$pitch_address    = $_POST['pitch_address'];
		$seven_aside      = $_POST['seven_aside'];
		$six_aside        = $_POST['six_aside'];
		$five_aside       = $_POST['five_aside'];
		$description      = $_POST['description'];

		$pitch_image = $_FILES['pitch_image']['name'];
		$tmp_name    = $_FILES['pitch_image']['tmp_name'];
		$path        = "upload/";

		move_uploaded_file($tmp_name, $path.$pitch_image);

		if ($_FILES['pitch_image']['error'] === 0) {
			$query  = "SELECT * FROM pitch WHERE pitch_id = '{$_GET['pitch_id']}'" ;
			$result = mysqli_query($conn, $query);
			$row    = mysqli_fetch_assoc($result);

			unlink("upload/{$row['pitch_image']}");
			$query = "UPDATE pitch SET  pitch_name='$pitch_name' ,pitch_address='$pitch_address' ,five_aside='$five_aside', six_aside='$six_aside',seven_aside='$seven_aside', description='$description', pitch_image='$pitch_image' WHERE pitch_id={$_GET['pitch_id']}" ;
		} else {
			$query = "UPDATE pitch SET  pitch_name='$pitch_name' ,pitch_address='$pitch_address' ,five_aside='$five_aside', six_aside='$six_aside',seven_aside='$seven_aside', description='$description' WHERE pitch_id={$_GET['pitch_id']}" ;
		}

		/* Back to manage admin page */
		if(mysqli_query($conn,$query)) {
			echo "<script> window.top.location='manage_pitches.php'</script>";
		}
	}

	//fetch data from edit
	$query  = " SELECT * FROM pitch WHERE pitch_id = {$_GET['pitch_id']}";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12 m-auto">
				<div class="card">
					<div class="card-header">
						<strong>Add Pitch</strong> Details
					</div>
					<div class="card-body card-block">
						<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Pitch Name</label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="pitch_name" placeholder="Name" class="form-control" value="<?php echo $row['pitch_name'];?>"></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Pitch Address</label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="pitch_address" placeholder="City, Street" class="form-control" value="<?php echo $row['pitch_address'];?>"></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label class="form-control-label mb-1">#7 Aside</label></div>
								<div class="col-12 col-md-9">
									<input type="Number" id="Number" name="seven_aside" placeholder="Number.." class="form-control" value="<?php echo $row['seven_aside'];?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label class="form-control-label mb-1">#6 Aside</label></div>
								<div class="col-12 col-md-9">
									<input type="Number" id="Number" name="six_aside" placeholder="Number.." class="form-control" value="<?php echo $row['six_aside'];?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label class="form-control-label mb-1">#5 Aside</label></div>
								<div class="col-12 col-md-9">
									<input type="Number" id="password" name="five_aside" placeholder="Number.." class="form-control" value="<?php echo $row['five_aside'];?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
								<div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Description..." class="form-control"> <?php echo $row['description'];?> </textarea></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pitch Image</label></div>
								<div class="col-12 col-md-9">
									<input type="file" id="image" name="pitch_image" class="form-control p-1">
								</div>
							</div>
							<div class="form-actions form-group text-right"><button type="submit" class="btn btn-info btn " name="submit">Submit</button></div>    
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include ('../include/admin_footer.php');
?>
