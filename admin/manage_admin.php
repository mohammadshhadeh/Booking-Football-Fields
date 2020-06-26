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

		$query = "INSERT INTO admin (admin_name, admin_email, admin_password, admin_image) VALUES ('$name','$email','$password','$admin_image')";

		// Applied query
		if (mysqli_query($conn,$query)) {
			echo "<script> window.top.location='manage_admin.php'</script>";
		}
	}
?>
<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-11 m-auto">
				<div class="card">
					<div class="card-header"><i class="fas fa-user"></i> Add New Admin</div>
					<div class="card-body card-block">
						<form action="#" method="post" class="form" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label mb-1">Full Name</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-user"></i></div>
									<input type="text" id="username" name="admin_name" placeholder="Full Name" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">@ Email</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
									<input type="email" id="email" name="admin_email" placeholder="Email" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Password</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
									<input type="password" id="password" name="admin_password" placeholder="Password" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label mb-1">Image</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-cloud-upload"></i></div>
									<input type="file" id="image" name="admin_image" placeholder="Password" class="form-control p-1">
								</div>
							</div>
							<div class="form-actions form-group text-center"><button type="submit" class="btn btn-info btn " name="submit">Add New Admin</button></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-11 m-auto">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Admin Table</strong>
					</div>
					<div class="table-stats order-table ov-h">
						<table class="table ">
							<thead>
								<tr>
									<th class="serial">#ID</th>
									<th class="avatar">Avatar</th>
									<th>Name</th>
									<th>Email</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query  = " SELECT * FROM admin";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) : ?>
										<tr>
											<td class='serial'><?php echo $row['admin_id'] ?></td>";
											<td class='avatar'>
												<div class='round-img'>
													<img class='rounded-circle' src='upload/<?php echo $row['admin_image']; ?>' alt=''>
												</div>
											</td>
											<td><?php echo $row['admin_name'];?></td>
											<td><?php echo $row['admin_email']; ?></td>
											<td><a href='edit_admin.php?admin_id=<?php echo $row['admin_id']; ?>' class='badge badge-complete bg-warning'>Edit</a></td>
											<td><a href='delete_admin.php?admin_id=<?php echo $row['admin_id']; ?>' class='badge badge-complete bg-danger'>Delete</a></td>
										</tr>
									<?php endwhile;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include ('../include/admin_footer.php');
?>
