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

    if ($_FILES['aside_image']['error']==0){

        $query  = "SELECT * FROM images WHERE  image_id = '{$_GET['image_id']}'" ;
        $result = mysqli_query($conn, $query);
        $row    = mysqli_fetch_assoc($result);

        unlink("upload/{$row['aside_image']}");
        
        $query = "UPDATE images SET aside_id='$aside_id', aside_image='$aside_image' WHERE image_id={$_GET['image_id']}";

    }else{
        
        $query = "UPDATE images SET aside_id='$aside_id' WHERE image_id={$_GET['image_id']} ";
    }
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
                                                if ($row['pitch_id']==$_GET['pitch_id']) {
                                                    echo "<option value='{$row['pitch_id']}' selected>{$row['pitch_name']}</option>";
                                                }else{
                                                echo "<option value='{$row['pitch_id']}'>{$row['pitch_name']}</option>";
                                    }
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
                                        <?php
                                            echo "<option value='{$_GET['aside_number']}'>{$_GET['aside_number']}</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Select Which aside</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="aside" id="names" class="form-control">
                                        <?php
                                        echo "<option value='{$_GET['aside_id']}'>{$_GET['aside_name']}</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Aside Images</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" name="aside_image" class="form-control-file" >
                                </div>
                            </div>
                            <div class="form-actions form-group text-center"><button type="submit" class="btn btn-info btn " name="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
include ('../include/admin_footer.php');
?>
