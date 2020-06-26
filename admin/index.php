<?php
	include('../include/admin_header.php');
?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
	<div class="content">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong class="card-title">Booking Table</strong>
						</div>
						<div class="card-body">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr class="bg-success text-white">
										<th>Name</th>
										<th>Phone</th>
										<th>ID</th>
										<th>Place</th>
										<th>Pitch</th>
										<th>Date</th>
										<th>Time</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query  = "SELECT * FROM customer inner join booking on customer.customer_id = booking.customer_id inner join aside on booking.aside_id = aside.aside_id inner join pitch on aside.pitch_id = pitch.pitch_id";
										$result = mysqli_query($conn,$query);
										while ($row = mysqli_fetch_assoc($result)) : ?>
											<tr>
												<td><?php echo $row['name']; ?></td>
												<td><span><?php echo $row['phone']; ?></span></td>
												<td><span><?php echo $row['identical_number'];?></span></td>
												<td><span><?php echo $row['pitch_name'];?></span></td>
												<td><span><?php echo $row['aside_name'] . $row['aside_number'] ?> aside </span></td>
												<td><span><?php echo $row['booking_date']; ?></span></td>
												<td class='text-left'><?php echo $row['hour_start'] . ' - ' . $row['hour_end'];?>
												<td><a class='badge btn-lg btn-danger p-2' href='delete_booking.php?booking_id=<?php echo $row['booking_id']?>' class='text-white'>Delete</a></td>
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
	<div class="clearfix"></div>
	<!-- Right Panel -->
	<!-- Scripts -->
	<script src="assets/js/lib/data-table/datatables.min.js"></script>
	<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
	<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
	<script src="assets/js/lib/data-table/jszip.min.js"></script>
	<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
	<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
	<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
	<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
	<script src="assets/js/init/datatables-init.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#bootstrap-data-table-export').DataTable();
		});
	</script>
<?php
	include('../include/admin_footer.php');
?>