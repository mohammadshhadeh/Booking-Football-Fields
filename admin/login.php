<?php
    session_start();
    include('../include/connection.php');

    if(isset($_POST['submit'])) {
        $username = strtolower($_POST['email']);
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            $query     = "SELECT * FROM admin Where admin_email = '$username' AND admin_password = '$password'";
            $result    = mysqli_query($conn,$query);
            $row       = mysqli_fetch_assoc($result);

            if ($row['admin_email']) {
                $_SESSION['capstone_id'] = $row['admin_id'];
                header("Location: index.php");
            } else {
                $error = "You are not authorized";
            }
        }
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Ghost Football Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../ghostfootball/images/ghost_football_round_logo.png">
    <link rel="shortcut icon" href="../ghostfootball/images/ghost_football_round_logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .login-form{
            background:rgba(0,0,0,0.8);
        }

        .login-form label{
            color: #fff;
        }
    </style>
</head>
<body class="bg-dark" style="background-image: url(images/bg-cover.jpg);background-size: cover;">
    <div class="sufee-login d-flex align-content-center flex-wrap ">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="../ghostfootball/images/ghost.png" alt="">
                    </a>
                </div>
                    <form action="" method="post">
                        <div class="form-group mb-4">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color: #ed1a3a" name="submit">Sign in</button>
                        <?php if (isset($error)) : ?>
                                <div class='alert alert-danger'><?php echo $error; ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

