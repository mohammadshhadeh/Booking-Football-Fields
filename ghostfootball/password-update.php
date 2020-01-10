<?php
include_once('includes/public_header.php');

if (isset($_POST['submit'])) {
    $current_pw     = $_POST['current_pw'];
    $new_pw         = $_POST['new_pw'];
    $confirm_new_pw = $_POST['confirm_new_pw'];

    if ($new_pw == $confirm_new_pw) {
        $query  = " UPDATE customer SET password = '$new_pw' WHERE customer_id = {$_SESSION['customer_id']} " ;

        if ($result = mysqli_query($conn,$query)) {
            echo "<script> window.top.location='password-update.php'</script>";
        }
    }else{
        $incorrect = "Password Are Not Match";

    }



}


?>


<section class="innerPage">
    <div class="page-header">
        <div class="container">
            <ul class="header-link">
                <li><a href="profile-update.php">Profile</a></li>
                <li><a href="Password-update.php" class="active">Password</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="contentMain">
        <div class="container">
            <div class="row">
             <aside class="col-sm-3 col-xs-12">
                <ul>
                    <li><a href="profile-update.php">Profile</a></li>
                    <li><a href="password-update.php" class="active">Password</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </aside> 
            <div class="col-sm-9 col-xs-12">
                <form id="change_pw_form" method="post" action="">
                    <div class="col-sm-12 col-xs-12 password-block">
                        <div class="col-xs-12">
                            <h3>Change Password</h3>
                            
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 label-text pull-right">Current Password</div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="password" name="current_pw">
                                </div>                                    <div class="clearfix"></div>
                                <div class="col-sm-6 col-xs-12 label-text pull-right">New Password</div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="password" name="new_pw">
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-sm-6 col-xs-12 label-text pull-right">Repeat New Password</div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="password" name="confirm_new_pw">
                                </div>
                            </div>                        
                        </div>
                        <div class="col-12">
                            <?php
                            if (isset($incorrect)) {
                                echo "<span class='alert alert-danger'>$incorrect</span>";
                            }
                            ?>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary min355 margin-top40" name="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<?php
include('includes/public_footer.php');
?>