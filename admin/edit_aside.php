<?php
include ('../include/admin_header.php');


if (isset($_POST['submit'])) {
    // fetch data
    $aside_name        = $_POST['aside_name'];
    $aside_size        = $_POST['aside_size'];
    $aside_price       = $_POST['aside_price'];
    $pitch             = $_POST['select'];


    $query = "UPDATE aside SET aside_name='$aside_name', aside_number='$aside_size', aside_price_hour='$aside_price', pitch_id='$pitch' WHERE aside_id={$_GET['aside_id']}";


    // Applied query

    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='manage_aside.php'</script>";
    }


}



$query  = "SELECT * FROM aside WHERE aside_id = {$_GET['aside_id']}";
$result = mysqli_query($conn,$query); 
$row    = mysqli_fetch_assoc($result);
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
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Aside Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="aside_name" placeholder="Name.." class="form-control" value="<?php echo $row['aside_name'];?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Aside Size</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="text-input" name="aside_size" placeholder="Aside Number.." class="form-control" value="<?php echo $row['aside_number'];?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label mb-1">Aside Price / Hour</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="Number" id="Number" name="aside_price" placeholder="Price.." class="form-control" value="<?php echo $row['aside_price_hour'];?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Select Picth</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="select" id="select" class="form-control">
                                        <?php
                                            $query  = " SELECT * FROM pitch";
                                            $result = mysqli_query($conn, $query);
                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                if($row1['pitch_id']=$_GET['pitch_id']){
                                            echo "<option value='{$row1['pitch_id']}'>{$row1['pitch_name']}</option>";
                                    }else{
                                        echo "<option value='{$row1['pitch_id']}'>{$row1['pitch_name']}</option>";
                                    }
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
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
include ('../include/admin_footer.php');
?>
