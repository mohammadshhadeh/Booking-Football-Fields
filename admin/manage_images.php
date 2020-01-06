<?php
include ('../include/admin_header.php');

if (isset($_POST['submit'])) {
    // fetch data
    $aside_id    = $_POST['aside'];

    
    // Esiablish connection
    $aside_image = $_FILES['aside_image']['name'];
    $tmp_name    = $_FILES['aside_image']['tmp_name'];
    $path        = "upload/";

    move_uploaded_file($tmp_name, $path.$aside_image);


    $query = "INSERT INTO images (aside_id, aside_image) VALUES ('$aside_id','$aside_image') ";
    // Applied query
   

    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='manage_images.php'</script>";
        
    }


}

?>


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Pitch</strong> Images
                    </div>
                    <div class="card-body card-block">
                        <form action="#" method="post" class="form" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Select Picth</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="pitch" id="pitch" class="form-control" required >
                                        <option disabled selected >Select Pitch</option>
                                        
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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="size" class=" form-control-label">Select Aside Size</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name='userId' id='size' class="form-control" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Select Which aside</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="aside" id="names" class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Aside Images</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" name="aside_image" class="form-control-file" required>
                                </div>
                            </div>
                            <div class="form-actions form-group text-center"><button type="submit" class="btn btn-info btn " name="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Pitches Details</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Size</th>
                                      <th scope="col">Pitch Name</th>
                                      <th scope="col">Edit</th>
                                      <th scope="col">Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <?php
                                        $query  = " SELECT * FROM images INNER JOIN aside  ON images.aside_id = aside.aside_id INNER JOIN pitch  ON aside.pitch_id = pitch.pitch_id" ;
                                        $result = mysqli_query($conn, $query);
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            echo "<th scope='row'>{$row['image_id']}</th>";
                                            echo "<th scope='row'><img height='100' width='100' src='upload/{$row['aside_image']}'</th>";
                                            echo "<td>{$row['aside_name']}</td>";
                                            echo "<td>{$row['aside_number']}</td>";
                                            echo "<td>{$row['pitch_name']}</td>";
                                            echo "<td><a href='edit_images.php?image_id={$row['image_id']}&pitch_id={$row['pitch_id']}&aside_id={$row['aside_id']}&aside_number={$row['aside_number']}&aside_name={$row['aside_name']}' class='badge badge-complete bg-warning'>Edit</a></td>";
                                            echo "<td><a href='delete_images.php?image_id={$row['image_id']}' class='badge badge-complete bg-danger'>Delete</a></td>";
                                            echo "<tr>";

                                        }
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
