<?php
include_once('includes/public_header.php');

if (isset($_POST['submit'])) {
    
    $name             = $_POST['full_name'];
    $email            = $_POST['email'];
    $birthday         = $_POST['birthday'];
    $identical_number = $_POST['identical_number'];

    $query  = " UPDATE customer SET name = '$name', email = '$email' ,birthday='$birthday',identical_number='$identical_number' WHERE customer_id = {$_SESSION['customer_id']} " ;
       if ($result = mysqli_query($conn,$query)) {
            echo "<script> window.top.location='profile-update.php'</script>";
        } 

    }



$query  = " SELECT * FROM customer WHERE customer_id={$_SESSION['customer_id']}";
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);

?>

<section class="innerPage">
    <div class="page-header">
        <div class="container">
            <ul class="header-link">
                <li><a href="profile-update.php" class="active">Profile</a></li>
                <li><a href="Password-update.php">Password</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="contentMain">
        <div class="container">
            <div class="row">

                <aside class="col-sm-3 col-xs-12">
                 <ul>
                   <li><a href="profile-update.php" class="active">Profile</a></li>
                   <li><a href="Password-update.php">Password</a></li>
                   <li><a href="logout.php">Log out</a></li>
               </ul>
           </aside>          
           <form id="profile_form" method="POST" class="col-sm-9 col-xs-12 hosting-form" action="">

            <div class="col-xs-12 block-box" style="padding-top:0px;" id="form_details">
                <div class="col-sm-4"></div>
                <div class="clearfix"></div>

                <div class="hidden-host-form" id="">

                    <div class="">
                        <div class="col-sm-8" id="">
                            <label>Full Name</label>
                            <input name="full_name" id="first_name" type="text" class=" form-control" style="height:43px;" value="<?php echo $row['name']; ?>" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="">
                        <div class="col-sm-8" id="">
                            <label>Email </label>
                            <input name="email" id="email" type="email" class=" form-control" style="height:43px;" value="<?php echo $row['email']; ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="">
                        <div class="col-sm-8" id="">
                            <label>Birthday </label>
                            <input name="birthday" id="birthday" type="date" class="form-control" style="height:43px;" value="<?php echo $row['birthday']; ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="">
                        <div class="col-sm-8" id="">
                            <label>ID Number </label>
                            <input name="identical_number" id="identical_number" type="number" min="0" class="form-control" style="height:43px;" value="<?php echo $row['identical_number']; ?>" placeholder="ID Number">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="note-content">
                <input type="submit" class="btn btn-lg btn-primary min355" name="submit" value="Submit Updates">
            </div>
        </form>
    </div>
</div>
</div>
</section>

<?php
include('includes/public_footer.php');
?>