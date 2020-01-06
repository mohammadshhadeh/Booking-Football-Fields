<?php
include ('../include/admin_header.php');


if (isset($_POST['submit'])) {
	// fetch data
	$email 	     = $_POST['admin_email'];
	$password    = $_POST['admin_password'];
	$name 	     = $_POST['admin_name'];
	// Esiablish connection
	$admin_image = $_FILES['admin_image']['name'];
	$tmp_name    = $_FILES['admin_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$admin_image);
	if ($_FILES['admin_image']['error']==0) {
		
		$query  = "SELECT * FROM admin WHERE admin_name = '{$_POST['admin_name']}'" ;
	
		$result = mysqli_query($conn, $query);

		$row    = mysqli_fetch_assoc($result);

		unlink("upload/{$row['admin_image']}");
		
		$query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,admin_name='$name', admin_image='$admin_image' WHERE admin_id={$_GET['admin_id']}" ;
	}else{
	$query = "UPDATE admin SET  admin_email='$email' ,admin_password='$password' ,admin_name='$name' WHERE admin_id={$_GET['admin_id']}" ;
	}
	// Applied query
	if(mysqli_query($conn,$query)){
		echo "<script> window.top.location='manage_admin.php'</script>";
	} /* Back to manage admin page */

}

//fetch data from edit

$query  = " SELECT * FROM admin WHERE admin_id={$_GET['admin_id']}";
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);


?>


<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Update Admin</div>
					<div class="card-body card-block">
						<form action="#" method="post" class="form" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label mb-1">Full Name</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-user"></i></div>
									<input type="text" id="username" name="admin_name" placeholder="Full Name" class="form-control" value="<?php echo $row['admin_name'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">@ Email</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
									<input type="email" id="email" name="admin_email" placeholder="Email" class="form-control" value="<?php echo $row['admin_email'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Password</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
									<input type="password" id="password" name="admin_password" placeholder="Password" class="form-control" value="<?php echo $row['admin_password'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Image</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-cloud-upload"></i></div>
									<input type="file" id="image" name="admin_image" placeholder="Password" class="form-control p-1">
								</div>
							</div>
							<div class="form-actions form-group text-center"><button type="submit" class="btn btn-info btn " name="submit">Update</button></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .animated -->
</div>

<?php
	include ('../include/admin_footer.php');
?>
