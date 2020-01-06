<?php
include_once('includes/public_header.php');
 if (!isset($_SESSION['customer_id'])) {
    echo "<script> window.top.location='index.php'</script>";
 }

    $month  = date('m');
    $day    = date('d');
    $year   = date('Y');
    $today  = $year . '-' . $month . '-' . $day;
?>

<link href='css/imageUpload.css' rel='stylesheet' type='text/css'/> 
<link rel="stylesheet" href="profile-custome/dist/cropper.css">
<link rel="stylesheet" href="profile-custome/demo/css/main.css">


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {

    var date = $("#date").val();
                    
        //alert(admin_id);
        $.ajax(
            {
                type: "get",
                url: "ajax/booking_details.php?date=" + date,
                success: function(data)
                {
                    $("#booking").html(data);

                }
            });
        
    $("#date").change(function()
    {
        //get selected parent option 
        var date = $("#date").val();
                    
        //alert(admin_id);
        $.ajax(
            {
                type: "get",
                url: "ajax/booking_details.php?date=" + date,
                success: function(data)
                {
                    $("#booking").html(data);

                }
            });
    });

    $("#delete").Change(function()
    {
        //get selected parent option 
        var delete_booking = $("#delete").val();
        alert(50);
        //alert(admin_id);
        $.ajax(
            {
                type: "get",
                url: "ajax/booking_details.php?delete=" + delete_booking,
                success: function(data)
                {
                    

                }
            });
    });

        
  });
</script>
<section class="detailsThumb team_banner">

    <form id="bgImageform2" method="post" enctype="multipart/form-data" action="https://strangersoccer.com/background_face/background_image_upload.php">
        <div class="uploadFile timelineUploadBG">
            <input type="file" name="backimg" id="backphotoimg" class=" custom-file-input" original-title="Change Cover Picture">
        </div>
    </form>
    
	<div class="img_container" id="bckgrd">
		<img class="nothing" id="backgroundPic" src="images/blank.png" style="background-image:url(images/bg-cover.jpg);background-size:cover;">
	</div>
	<div class="banner-content">
		<div class="container">
			<div class="display-table">
				<div class="display-cell text-center">
					<div class="col-sm-12">
						<form id="bgimageform" method="post" enctype="multipart/form-data">
							<div class="uploadFile timelineUploadBG" style="background:none;" >
								<input type="hidden" name="is_mobile" id="is_mobile" value="0" />
								<input type="file" name="photoimg" id="profilephotoimg" class=" custom-file-input" original-title="Change Cover Picture">
							</div>
						</form>

						<div class="col-sm-12 team_banner_logo_main" id="timelineBackground" >
							<img src="images/blank.png" class="img-responsive team_banner_logo personal_profile_pic" id="profile_thumb" style="background-image:url(images/profile/people.png);" />
							<a href="#profile_avatar_popup" id="team_banner_link_click" class='team_banner_link'><img src="images/camera-icon.png" class="team_banner_edit" /></a>

						</div>

						<div class="col-sm-12 margin-top30 team_banner_text">
							<h2 class="margin-left40" > </h2>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>
	
<section id="pitches_table">
    <div class="container">
        <div class="row pitches_wraper">
          <div class="col-md-12 aminities_main">
            <h2 class="col-md-12 book_pitch_title text-center">Your Booking Details</h2>
        </div>


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



	<?php
	include('includes/public_footer.php');
	?>