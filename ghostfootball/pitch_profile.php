<?php
include_once('includes/public_header.php');

?>

<a href="#popup_team_games_banner" class=""  >
  <div class="early_bird" >
    <span class="first" ></span>
    <?php
    if (isset($_GET['pitch_id'])) {
      $query   = " SELECT * FROM pitch WHERE pitch_id = {$_GET['pitch_id']} ";
      $result  = mysqli_query($conn,$query);
      $row     = mysqli_fetch_assoc($result);
      echo "<span class='second'>{$row['pitch_name']}</span>";
    }else{
      echo "<span class='second'>All Pitches</span>";
    }

    ?>
  </div>
</a>
<div class="container">
  <div class="row">

    <?php
    if (isset($_GET['pitch_id'])) {

      echo "<div class='col-4 col-sm-12'>
          <div class='image_section'>
            <img src='images/blank.png' style='background-image:url(../admin/upload/{$row['pitch_image']})'/> 
          </div>
          <div class='desc_section' >
            <div class='promo_desc_title' >{$row['pitch_name']}</div>
            <div class='promo_description' >{$row['description']}</div>
          </div>
      </div>
    </div>";
    }

    ?>
    


  </div>
</div>
<?php
include('includes/public_footer.php');
?>