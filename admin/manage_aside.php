<?php
	include ('../include/admin_header.php');

	if (isset($_POST['submit'])) {
		// fetch data
		$aside_name        = $_POST['aside_name'];
		$aside_size        = $_POST['aside_size'];
		$aside_price       = $_POST['aside_price'];
		$pitch             = $_POST['select'];

		$query = "INSERT INTO aside (aside_name, aside_number, aside_price_hour, pitch_id) VALUES ('$aside_name','$aside_size','$aside_price','$pitch')";

		// Applied query
		if(mysqli_query($conn,$query)){
			echo "<script> window.top.location='manage_aside.php'</script>";
		}
	}
?>
<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12 m-auto">
				<div class="card">
					<div class="card-header">
						<strong>Add Aside</strong> Details
					</div>
					<div class="card-body card-block">
						<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="select" class=" form-control-label">Aside Name</label>
								</div>
								<div class="col-12 col-md-9">
									<select name="aside_name" id="select" class="form-control" required="">
										<option selected disabled>Name..</option>
										<option value='first'>First Aside</option>
										<option value='second'>Second Aside</option>
										<option value='third'>Third Aside</option>
										<option value='fourth'>Fourth Aside</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Aside Size</label></div>
								<div class="col-12 col-md-9"><input type="number" id="text-input" name="aside_size" placeholder="Aside Number.." class="form-control"></div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3"><label class="form-control-label mb-1">Aside Price / Hour</label></div>
								<div class="col-12 col-md-9">
									<input type="Number" id="Number" name="aside_price" placeholder="Price.." class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="select" class=" form-control-label">Select Picth</label>
								</div>
								<div class="col-12 col-md-9">
									<select name="select" id="select" class="form-control">
										<option selected disabled> Select Venue</option>
										<?php
											$query  = " SELECT * FROM pitch";
											$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_assoc($result)) {
												echo "<option value='{$row['pitch_id']}'>{$row['pitch_name']}</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-actions form-group text-right"><button type="submit" class="btn btn-info btn " name="submit">Submit</button></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12 m-auto">
					<div class="card">
						<div class="card-header">
							<strong class="card-title">Aside Details</strong>
						</div>
						<div class="card-body">
							<table class="table">
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Size</th>
										<th scope="col">Price Per Hour</th>
										<th scope="col">Pitch Name</th>
										<th scope="col">Edit</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query  = " SELECT * FROM aside INNER JOIN pitch ON aside.pitch_id = pitch.pitch_id";
										$result = mysqli_query($conn, $query);
										while ($row=mysqli_fetch_assoc($result)) : ?>
											<tr>
												<th scope='row'><?php echo $row['aside_id']?></th>
												<td><?php echo $row['aside_name'];?></td>
												<td><?php echo $row['aside_number'];?></td>
												<td><?php echo $row['aside_price_hour'];?></td>
												<td><?php echo $row['pitch_name'];?></td>
												<td><a href='edit_aside.php?aside_id=<?php echo $row['aside_id'] . '&pitch_id=' . $row['pitch_id']?>' class='badge badge-complete bg-warning'>Edit</a></td>
												<td><a href='delete_aside.php?aside_id=<?php echo $row['aside_id'];?>' class='badge badge-complete bg-danger'>Delete</a></td>
											</tr>
										<?php endwhile;
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .animated -->
</div><!-- .content -->

<?php
include ('../include/admin_footer.php');
?>
