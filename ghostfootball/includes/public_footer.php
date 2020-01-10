
<footer>
  <div id="FOOTER_EVERY_PAGE">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12 ftr-logo"><img src="images/ghost-footer.png" alt="Ghost football logo"></div>

        <div class="col-sm-6 footer_menu non_responsive">
          <h3>ABOUT</h3>
          <ul>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="how-things-work.php">How Things Work</a></li>
            <li><a href="contact-us.php">Contact Us</a></li> 
          </ul>
        </div>
        <div class="col-sm-12 footer_menu with_responsive">
          <ul>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="how-things-work.php">How Things Work</a></li>
            <li><a href="contact-us.php">Contact Us</a></li> 
          </ul>            
        </div>
        <div class="col-sm-6 hide-xs text-center">
          <h3>SERVICES</h3>
          <ul>
            <li><a href="Pitches.php">Football Pitches</a></li>
            <li><a href="bookpitch.php">Booking</a></li>
          </ul>

        </div>
        <div class="col-sm-12 footer_menu with_responsive ">
          <h3>SERVICES</h3>
          <ul>
            <li><a href="bookingpitch.php">Booking</a></li>
            <li><a href="Pitches.php">Football Pitches</a></li>
          </ul>

        </div>
        <div class="clearfix"></div>

        <div class="col-sm-4 visit-us visit-us2" style="text-align:center !important;">
          <h3>VISIT US</h3>
          <a href="https://www.facebook.com/MohammadZaidSh" target="_blank" ><i class="fab fa-facebook" style="font-size: 25px; margin-right: 4px;color: white"></i></a> 
          <a href="https://www.instagram.com/mohammadzaidsh/" target="_blank" ><i class="fab fa-instagram" style="font-size: 25px;margin-left: 4px;color: white"></i></a> 
        </div>
        <div class="col-sm-4 visit-us location2" style="text-align:center !important;">
          <h3>LOCATION</h3>
          <h4>Jordan</h4>
          
        </div>
        <div class="col-sm-4 visit-us location2" style="text-align:center !important;" >
          <h3>LANGUAGE </h3>
          <h4>English</h4>
        </div> 

        <div class="clearfix"></div>
        <div class="col-sm-12 text-center">&#169; Ghost Football. All Rights Reserved</div>
      </div>
    </div>
  </div>
</footer>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="css/new-popup.css">


<script src="js/remodal/dist/remodal.min.js"></script>
<div class="remodal wcp_promo_popup" data-remodal-id="wcp_promo_popup" id="wcp_promo_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" >
  <div class="row popup_profile" style="background:#ece3d4 !important;" >


 </div>
</div>

<div class="remodal" data-remodal-id="sign_up" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" id="signup-modal" >
  <div class="col-sm-12">
    <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>
    <div class="col-sm-12">
    </div>

  </div>
</div>

<?php
if (!isset($_SESSION['customer_id'])) {
echo'
<div class="remodal remodal_login" data-remodal-id="login_up"  role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" id="login-modal" >
  <div class="col-sm-12">
    <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>
    <div class="col-sm-12 modal_white" >&nbsp;</div>
    <form id="login_form" method="post">
      <div class="col-sm-12">
        <input id="login_email" class="form-control form-control-email decorative-input" type="text" name="email" placeholder="Email" required/>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12"><input id="login_pw" class="form-control form-control-password decorative-input" type="password" name="password" placeholder="Password" required /></div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-6 modal_already modal_already2" ><input type="checkbox" name="remain_logged_in" value="1" />&nbsp;&nbsp;Remember Me</div>
      <div class="clearfix"></div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>

      <div class="col-sm-12">

        <button class="create-using-email btn-block2 signup-login-form__btn-xl space-2 btn2 btn-primary2 btn-block2 signup-login-form__btn-xl btn-large2 large icon-btn" id="login_using_email_button" name="login">
          Log In 
        </button>';
        
        if (isset($error)) {
          echo "<p class='alert alert-danger col-6 text-center'>$error</p>";
        }
        echo'
      </div>
    </form>
    <div class="col-sm-12 pad0"><hr style="margin-bottom:10px; margin-top:0px;" /></div>
    <div class="col-sm-8 modal_already text_align_center767" >No Account Yet?</div>
    <div class="col-sm-4 text-right margintop6" ><a class="modal_login" href="#sign_up_form"  rel="modal:open" >Sign Up</a>
    </div>
  </div>
</div>';
}
?>

<!--  -->

<div class="remodal book_a_pitch" data-remodal-id="book_a_pitch" id="book_a_pitch" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" >

    <button data-remodal-action="close" class="remodal-close close_popup_remodal" aria-label="Close">&nbsp;</button>
    
         <div class="col-md-12 col-sm-12 col-xs-12 title_main">
      <div class="icon" id=""><img src="images/home/book_a_pitch_black.png"></div>
    </div>
            <div class="col-md-12 col-sm-12 col-xs-12 title_main"><br>
      <div class="title" id="no_team_available_title">Just need a pitch, plain and simple?</div>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 descr">
     Choose a date for your booking, time to begin and duration of this game, but don't forget you need to sign up first!
   </div>
</div>


  
<!--  -->



<?php
if (!isset($_SESSION['customer_id'])) {
echo'
<div class="remodal remodal_login" data-remodal-id="sign_up_form" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"  >
  <div class="col-sm-12">
  <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>
    <div class="col-sm-12 modal_white" >&nbsp;</div>
    <form id="" method="post">
  
  <div class="col-sm-12">
      <div class="col-sm-12">
        <input class="form-control form-control-email decorative-input" type="email" name="email" placeholder="Email" required/>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12">
        <input class="form-control form-control-name decorative-input" type="text" name="full_name" placeholder="Full Name" required/>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12">
        <input class="form-control form-control-name decorative-input" type="number" name="identical_number" placeholder="Identical Number" required/>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12">
        <input class="form-control form-control-name decorative-input" type="telephone"  name="phone_number" placeholder="Phone Number" required/>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>                          
      <div class="col-sm-12">
        <input class="form-control form-control-password decorative-input" type="password" name="password" placeholder="Password" id="password" required/>
        <div class="col-sm-12 modal_white" >&nbsp;</div>                          
        <div class="col-sm-12 text-left text-info" id="vaild"></div>
      </div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>

      <div class="col-sm-12 modal_white" >&nbsp;</div>
      <div class="col-sm-12 modal_white" >&nbsp;</div>
    </div>
    <div class="col-sm-12 modal_white" >&nbsp;</div>
    <div class="col-sm-12 modal_white" >&nbsp;</div>
    <div class="col-sm-12">
      <button class="create-using-email btn-block2 signup-login-form__btn-xl space-2 btn2 btn-primary2 btn-block2 signup-login-form__btn-xl btn-large2 large icon-btn" id="signup_using_email_button" name="sign_up">Sign Up</button>
    </div>
  </form> 
</div>
  <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>
  
  <!-- End sign up form -->
  <div class="col-sm-12 pad0"><hr style="margin-bottom:10px; margin-top:0px;" /></div>
  <div class="col-sm-8 modal_already text_align_center767 already_left_width" >Already A Member?</div>
  <div class="col-sm-4 text-right margintop6 login_right_width" ><a class="modal_login" href="#login_up"  rel="modal:open" >Log In</a></div>
</div>
';
  }
    
if (isset($_SESSION['customer_id'])) {
  echo '
<div class="remodal" id="start_joining_popup" data-remodal-id="start_joining_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" data-remodal-options="closeOnOutsideClick: false, closeOnEscape:false">
  <div class="col-md-12 fl100 pad0" >
    <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>
    <div style="color: #ed1a3b;"><h4 class="popup_ttl">Update your profile a before you start.<br></h4></div>
    <div class="col-md-12 modal_terms signup_wel_txt">&nbsp;</div>
    <div style="color: #ed1a3b;"><h4 class="popup_ttl">See you on the pitch!</h4></div>
    <div class="col-md-12 check_main">
      <p><a href="profile-Update.php" class="btn btn-primary check_btn" id="check_btn">Update Now!</a></p>
    </div>
    <div class="col-md-12 modal_terms signup_wel_txt">&nbsp;</div>
    <div class="col-md-12 fl100 pad0 mar10" style="margin-bottom: 2rem;" ><hr /></div>
  </div>
</div>';
}

?>

</body>

<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="js/owl.carousel-min.js"></script>
<script src="js/navbar.js" ></script>
<script>
  
  $('.form_datepicker').datetimepicker
  ({
    language: 'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    startDate: new Date(),
    forceParse: 0
  });
  
$(document).ready(function(e){

        var acc_bal = null;
        var currency_sign = null;
        var combine = ' ('+currency_sign+''+acc_bal+')';
        $(".account_balance").html(combine);

    $('button.navbar-toggle').click(function() {
        $('.mobile-nav').toggleClass('nav-view');
        $('.blk-bg').toggleClass('visible-xs');

    });
    $('.blk-bg').click(function() {
        $('.mobile-nav').removeClass('nav-view');
        $('.blk-bg').removeClass('visible-xs');

    });
    $('.menu_popup').click(function() {
        $('.navbar-toggle').click();

    });
    
});
</script>
</html>