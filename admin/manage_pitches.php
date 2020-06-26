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

        $query = "INSERT INTO pitch (pitch_name, pitch_address, five_aside,six_aside, seven_aside, description,pitch_image) VALUES ('$pitch_name','$pitch_address','$seven_aside','$six_aside', '$five_aside','$description','$pitch_image')";
        // Applied query
        if(mysqli_query($conn,$query)){
            echo "<script> window.top.location='manage_pitches.php'</script>";
        }
    }
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="fas fa-futbol"></i> Add Pitch</strong> Details
                    </div>
                    <div class="card-body card-block">
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pitch Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="pitch_name" placeholder="Name" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pitch Address</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="pitch_address" placeholder="City, Street" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label mb-1">#7 Aside</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="Number" id="Number" name="seven_aside" placeholder="Number.." class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label mb-1">#6 Aside</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="Number" id="Number" name="six_aside" placeholder="Number.." class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label mb-1">#5 Aside</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="Number" id="password" name="five_aside" placeholder="Number.." class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Description..." class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pitch Image</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="pitch_image" placeholder="Password" class="form-control p-1">
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
                            <strong class="card-title">Pitches Details</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">#5 Aside</th>
                                        <th scope="col">#6 Aside</th>
                                        <th scope="col">#7 Aside</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Pitch Image</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query  = "SELECT * FROM pitch";
                                        $result = mysqli_query($conn, $query);
                                        while ($row=mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <th scope='row'><?php echo $row['pitch_id']?></th>
                                                <td><?php echo $row['pitch_name']?></td>
                                                <td><?php echo $row['pitch_address']?></td>
                                                <td><?php echo $row['five_aside']?></td>
                                                <td><?php echo $row['six_aside']?></td>
                                                <td><?php echo $row['seven_aside']?></td>
                                                <td><?php echo $row['description']?></td>
                                                <td><img src='upload/<?php echo $row['pitch_image']?>'></td>
                                                <td><a href='edit_pitch.php?pitch_id=<?php echo $row['pitch_id'] ?>' class='badge badge-complete bg-warning'>Edit</a></td>
                                                <td><a href='delete_pitch.php?pitch_id=<?php echo $row['pitch_id'] ?>' class='badge badge-complete bg-danger'>Delete</a></td>
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
