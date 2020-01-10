<?php
include_once('includes/public_header.php');
if (!isset($_SESSION['customer_id'])) {
    echo "<script> window.top.location='index.php'</script>";
}
$query  = "SELECT * FROM customer WHERE customer_id = {$_SESSION['customer_id']}";
$result = mysqli_query($conn,$query);
$row    = mysqli_fetch_assoc($result);


if (isset($_POST['confirm'])) {
    
    if ($row['profile_image'] != "default/people.png") {
    unlink("upload/{$row['profile_image']}");
    }
    
    $profile_image = $_FILES['profile_image']['name'];
    $tmp_name      = $_FILES['profile_image']['tmp_name'];
    $path          = "upload/";

    move_uploaded_file($tmp_name, $path.$profile_image);

    $query = "UPDATE customer SET  profile_image='$profile_image' WHERE customer_id={$_SESSION['customer_id']}" ;

    // Applied query

    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='profile.php'</script>";
    }
}




$month  = date('m');
$day    = date('d');
$year   = date('Y');
$today  = $year . '-' . $month . '-' . $day;
?>


<link href='css/imageUpload.css' rel='stylesheet' type='text/css'/> 
<link rel="stylesheet" href="profile-custome/dist/cropper.css">
<link rel="stylesheet" href="profile-custome/demo/css/main.css">
<style type="text/css">
    #profile_image{
        margin: 20px 0; 
        margin-left: 100px!important;
    }
    .row.col-xs-push-1.personal_profile_details.padbottm50{
        margin-left: 80px!important;
    }

</style>
<section class="detailsThumb team_banner">

    <div class="uploadFile timelineUploadBG">
        <input type="file" name="file" id="file" class="custom-file-input" original-title="Change Cover Picture">
    </div>

<div class="img_container" id="bckgrd">
    <?php echo "
    <img class='nothing' id='backgroundPic' src='images/blank.png' style='background-image:url(upload/{$row['cover_image']});background-size:cover;'>";
    ?>
</div>
<div class="banner-content">
    <div class="container">
        <div class="display-table">
            <div class="display-cell text-center">
                <div class="col-sm-12">
                        <div class="uploadFile timelineUploadBG" style="background:none;" >
                            <input type="hidden" name="is_mobile" id="is_mobile" value="0" />
                            <input type="file" name="photoimg" id="profilephotoimg" class=" custom-file-input" original-title="Change Cover Picture">
                        </div>
                    <div class="col-sm-12 team_banner_logo_main" id="timelineBackground" >
                        <?php echo "
                        <img src='images/blank.png' class='img-responsive team_banner_logo personal_profile_pic' id='profile_thumb' style='background-image:url(upload/{$row['profile_image']});' />";
                        ?>
                        <a href="#profile_avatar_popup" id="team_banner_link_click" class='team_banner_link'><img src="images/camera-icon.png" class="team_banner_edit" /></a>

                    </div>

                    <div class="col-sm-12 margin-top30 team_banner_text">
                        <h2> <?php echo "{$row['name']}"; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<section id="pitches_table">
    <div class="container">
        <div class="row pitches_wraper">
          <div class="col-xs-12 text-center personal_profile_title padbottm50"><h3>Booking Details</h3></div>


          <div class="filterMain col-md-12" style="border-bottom: 2px solid #fff;">

            <form method='get'>    
                <div class="col-md-4 col-sm-8 col-xs-8 margin-bottom-15 sl-date">
                    <div class="col-md-4 col-sm-6 col-xs-6 sl-date w190">
                        <div  name="selcDate" class="input-group date form_datepicker search" dataDate="" data-Date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input  class="form-control game_dt_field" size="16" id="date" type="text" placeholder="Date" name="date" value="<?php echo $today; ?>">
                            <div class="games_reset_date">X</div>
                        </div>

                    </div>        

                </div>

                <div class="col-md-8 col-sm-6 col-xs-6 gm-type text-right">

                  <div class="custom-checkbox checkbox-inline">
                  </div>
              </div>
          </form>
          <div class="clearfix"></div>
      </div>
      <div class="col-md-12 gamepadright0  gamepadleft0 innter_table_content2 text-center" style="background:#b7b7b7;">
        <table width="100%" align="center" cellpadding="0" cellspacing="0" class="table_content_pitch table-striped table-bordered">
            <thead>
                <tr class="table" style="background-color:#ed1a3b; color: #fff">
                    <td>Pitch Name</td>
                    <td>Aside Name</td>
                    <td>Booking Date</td>
                    <td >Booking Time</td>
                    <td class="time_td">Price</td>
                    <td class="time_td">Delete</td>
                </tr>
            </thead>
            <tbody id="booking">

            </tbody>
        </table>

    </div>
</div>
</div>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center personal_profile_title padbottm50"><h3><img src="images/personal1.png" border="0" width="36">&nbsp;PERSONAL PROFILE</h3></div>
    </div>
    <div class="row col-xs-push-1 personal_profile_details padbottm50">
    <?php
    echo "
        <div class='col-md-4'>
            <div class='personal_profile_content'><label>Name:</label> {$row['name']} </div>
            <div class='personal_profile_content'><label>Email:</label> {$row['email']}</div>
        </div>
        <div class='col-md-4'>
                <div class='personal_profile_content'><label>Birthday:</label> {$row['birthday']}</div>                
        </div>
        <div class='col-md-4'>
                <div class='personal_profile_content'><label>ID Number:</label> {$row['identical_number']}</div>                
        </div>";
    ?>
    </div>

    
    
<!--     <div class="col-xs-4 col-xs-push-1 text-center personal_profile_details padbottm50">
        <div class="col-xs-12 text-center personal_profile_main1">
            <div class='personal_profile_content'><label>:</label></div>
            <div class='personal_profile_content'><label>:</label></div>
            <div class='personal_profile_content'><label>:</label></div>              
        </div>
    </div>  -->
</div>


<div class="remodal-wrapper remodal-is-closed text-center" style="display: none;">
    <div class=" text-center remodal profile_avatar_popup remodal-is-initialized remodal-is-closed" data-remodal-id="profile_avatar_popup" id="profile_avatar_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1" >
        <div class="row find_a_game popup_profile form-group" style="background:#FFF !important;">
            <button data-remodal-action="close" class="remodal-close close_popup_remodal" aria-label="Close">X</button>
            <div class="col-md-12 col-sm-12 col-xs-12 title_main">
              <div class="title" id="no_team_available_title">Profile Image</div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 descr text-center">
                <a href="javascript:;" class="existing_avatar">
                    <?php echo "
                    <img src='upload/{$row['profile_image']}' class='img-responsive' style='display: unset;max-width: 80px;border-radius: 50%;'>";
                    ?>
                </a>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12 col-xs-12 descr"></div>
                <div class="col-md-12 col-sm-12 col-xs-12 title_custom_avatar">
                    <div class="title">Upload Profile Image</div>
                </div>
                <div class="col-md-6 col-sm-6 text-center col-xs-6 pt-20 ml-5">
                    <input type="file"  class="form-control-file" name="profile_image" id="profile_image">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 descr">
                    <button type="submit" name="confirm" class="btn btn-primary confirm_avatar">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
         $(document).on('change', '#file', function(){
              var name = document.getElementById("file").files[0].name;
              var form_data = new FormData();
              var ext = name.split('.').pop().toLowerCase();
              if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                {
                    alert("Invalid Image File");
                }
              var oFReader = new FileReader();
              oFReader.readAsDataURL(document.getElementById("file").files[0]);
              var f = document.getElementById("file").files[0];
              var fsize = f.size||f.fileSize;
              if(fsize > 2000000)
              {
               alert("Image File Size is very big");
              }
              else
              {
               form_data.append("file", document.getElementById('file').files[0]);
               $.ajax({
                url:"ajax/upload.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false ,   
                success:function(data)
                {
                 $('#bckgrd').html(data);
                }
               });
              }
         });
    });
</script>

<?php
include('includes/public_footer.php');
?>