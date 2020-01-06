<?php
include('includes/connection.php');
session_start();
if(isset($_POST['sign_up'])){

  $name     = $_POST['full_name'];
  $email    = $_POST['email'];
  $id       = $_POST['identical_number'];
  $phone    = $_POST['phone_number'];
  $password = $_POST['password']; 

  $query   = "INSERT INTO customer (name, email, identical_number, phone, password) VALUES ('$name','$email', '$id', '$phone', '$password')";

  if(mysqli_query($conn,$query)){
      $query = "SELECT * FROM customer Where name='$name'";
      $result = mysqli_query($conn,$query);
      $row   = mysqli_fetch_assoc($result);
      $_SESSION['customer_id']= $row['customer_id'];

  }

}


if(isset($_POST['login'])){
  $username = strtolower($_POST['email']);
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {

    $query    = "SELECT * FROM customer Where email = '$username' AND 
    password = '$password'";

    $result    = mysqli_query($conn,$query);
    $row       = mysqli_fetch_assoc($result);

    if ($row['customer_id']){
     $_SESSION['customer_id'] = $row['customer_id'];

   }else{
    $error = "You are not authorized";
  }   

}   
}

?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="charset=UTF-8" />
<head>
  <link rel="canonical" href="index.php"/>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/ghost_football_round_logo.png">
  <title>Join Football in Jordan | GHOST FOOTBALL</title>
  <meta name="description" content="With Stranger Soccer, our on-demand platform brings the football games to you! You can  host and invite your friends or play with other players and teams! Quickly sign up now and start your game in Singapore!" />

  <meta name="keywords" content="Football Pithces booking" />
  <meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1" />
  <meta property="og:image" content="images/ghost_football_round_logo.png" />
  <script src="js/moment.js"></script>      
  <link href="css/venue-new.css" rel="stylesheet">
  <link href="css/popup_otp.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-select.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="css/radio-checkbox.css"/>
  <link href="css/style-min.css" rel="stylesheet">
  <link href="css/responsive_min.css" rel="stylesheet">
  <link href="css/others-min.css" rel="stylesheet">
  <link rel="stylesheet" href="js/remodal-min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="custom/owl.carousel-min.css">
  <link rel="stylesheet" href="fonts/new-design-fonts.css">
  <link rel="stylesheet" href="css/new-design.css">
  <link rel="stylesheet" href="css/home-new-design.css">
  <link rel="stylesheet" type="text/css" href="css/home-2019.css">
  <link rel="stylesheet" type="text/css" href="css/media.css">
  <link href="css/popup_game_rate-min.css" rel="stylesheet">
  <link href="css/notification-menu-min.css" rel="stylesheet">
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link href="sch_race/css/custome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/booking.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="css/style-min.css" rel="stylesheet">
  <link href="css/responsive_min.css" rel="stylesheet">
  <link href="css/others-min.css" rel="stylesheet">
  <link rel="stylesheet" href="js/remodal/dist/remodal-min.css">
  <link href="css/phase3.css" rel="stylesheet">
  <link href="css/phase4.css" rel="stylesheet">
  <link href="css/others.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
    {
      $("#password").keyup(function()
        {
          //get selected parent option 
          var password = $("#password").val();
          //alert(admin_id);
          $.ajax(
          {
            type: "post",
            url: "ajax/password-validation.php",
            data: {password:password} ,
            success: function(data)
            {
              $("#vaild").html(data);
            }
          });
        });
    });
</script>
<body>
  <nav class="navbar navbar-default topnav">
    <div class="topnav topnav_stk">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle"> 
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand topnav" href="index.php">
            <img src="images/ghost.png"  alt="GHOST FOOTBALL" style="max-width:200px"></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php" class="ga-click-join-page" >Home</a></li>
              <li><a href="pitches.php">Venues</a></li>
              <li><a href="bookpitch.php">Book a Pitch</a></li>
              <li class=""><a href="about-us.php">About <u></u>us</a></li>
              <?php
              if (isset($_SESSION['customer_id'])) {
                  $query = "SELECT * FROM customer Where customer_id={$_SESSION['customer_id']}";
                  $result = mysqli_query($conn,$query);
                  $row   = mysqli_fetch_assoc($result);
                echo "<li class='dropdown'><a href='' class='user-logon' type='button' data-toggle='dropdown' aria-expanded='false'>{$row['name']} <img src='https://sanktgeorghecklingen.de/wp-content/uploads/2018/02/people.png'></a>  
                <ul class='dropdown-menu'>
                <li>
                <a href='profile.php'>Profile</a>
                </li> 
                <li>
                <a href='profile-update.php'>Settings</a>
                </li>
                <li>
                <a href='logout.php'>logout</a>
                </li>
                </ul>
                </li>";
              }else{
                echo '<li><a href="#sign_up_form" class="menu_popup" >Sign up</a></li>
                <li><a href="#login_up" class="menu_popup" >Login</a></li>';
              }
              ?>
            </ul>
          </div>
          <div class="blk-bg"></div>
          <div class="mobile-nav">
            <div class="mbl-lnk">
             <ul>
              <li><a href="index.php" class="ga-click-join-page">Home</a></li>
              <li><a href="pitches.php">Venues</a></li>
              <li><a href="bookpitch.php">Book a pitch</a></li>
              <li class=""><a href="about-us.php">About <u></u>us</a></li>

              <?php
              if (isset($_SESSION['customer_id'])) {
                echo '
                <li>
                <a href="profile.php">Profile</a>
                </li> 
                <li>
                <a href="profile-update.php">Settings</a>
                </li>
                <li>
                <a href="logout.php">logout</a>
                </li>';
              }else{
                echo '<li><a href="#sign_up_form" class="menu_popup" >Sign up</a></li>
                <li><a href="logout.php" class="menu_popup" >Login</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>

