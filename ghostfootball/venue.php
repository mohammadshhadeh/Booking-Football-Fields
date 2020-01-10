<?php
include_once('includes/public_header.php');

    
    $month  = date('m');
    $day    = date('d');
    $year   = date('Y');
    $today  = $year . '-' . $month . '-' . $day;

if (!isset($_GET['aside_id']) || !isset($_GET['image_id']) || !isset($_GET['pitch_id'])) {
    echo "<script> window.top.location='bookpitch.php'</script>";
}else{


    $query  = "SELECT * FROM pitch 
    inner join aside on 
    pitch.pitch_id = aside.pitch_id 
    inner join images on 
    aside.aside_id = images.aside_id
    WHERE 
    aside.aside_id = {$_GET['aside_id']}";

    $result     = mysqli_query($conn,$query);
    $row        = mysqli_fetch_assoc($result);

}



if (isset($_GET['booking'])) {
    if (isset($_SESSION['customer_id'])) {
        
        $date               = $_GET['booking_date'];
        $hour_start         = $_GET['hour_start'];
        $hour_end           = $_GET['hour_end'];
        $booking_price      = $_GET['booking_price'];
        
        // $new_start_num  = (int)$hour_start;
        // $new_end_num    = (int)$hour_end;

        // $new_start_char = preg_replace('/[0-9]+/', '', $hour_start);
        // $new_end_char   = preg_replace('/[0-9]+/', '', $hour_end);

        // $middle =0;

        // if ($new_start_char == "AM") {
        //     echo "AM<br>";
        //     if ( (($new_start_num + 2) == $new_end_num ) || ($new_start_num == 12 && $new_end_num == 2) || ($new_start_num == 11 && $new_end_num == 1) ) {
        //         echo "dur=2<br>";
        //         if ($new_start_num == '11') {
        //             $middle = "12PM";
        //             echo "$middle";
        //         }elseif ($new_start_num == '12') {
        //             $middle = "1AM";
        //             echo "$middle";

        //         }elseif($new_start_num >= 1 && $new_start_num < 11 ){
        //             $new_start_num ++;
        //             $middle = $new_start_num . "AM";
        //             echo "$middle";

        //         }
        //     }else{
        //         echo "dur=1<br>";
        //         $middle =0;
        //     }   

        // }elseif ($new_start_char == "PM") {
        //     echo "PM<br>";
        //     if ( (($new_start_num + 2) == $new_end_num ) || ($new_start_num == 12 && $new_end_num == 2) || ($new_start_num == 11 && $new_end_num == 1) ) {
        //         echo "dur=2<br>";
        //         if ($new_start_num == 11) {
        //             $middle = "12AM";
        //             echo "$middle";   
        //         }elseif ($new_start_num == 12) {
        //             $middle = "1PM";
        //             echo "$middle";
        //         }elseif($new_start_num >= 1 && $new_start_num < 11 ){
        //             $new_start_num ++;
        //             $middle = $new_start_num . "PM";
        //             echo "$middle";
        //         }


        //    }else{
        //     echo "dur=1";
        //         $middle =0;
        //     }
        // }

    
        
        // if ($middle = 0 ) {
        //     $booking    = "SELECT hour_start,hour_end FROM booking WHERE booking_date = '$date' AND 
        //                 (hour_start = '$hour_start' AND hour_end = '$hour_end' ) AND (hour_start = '$hour_start' OR hour_end = '$hour_end' ) ";
        // }else{
        //     $booking    = "SELECT hour_start,hour_end FROM booking WHERE booking_date = '$date' AND( 
        //                 (hour_start = '$hour_start' OR hour_end = '$hour_end' ) OR (hour_start = '$middle' OR hour_end = '$middle'))";
        // }
        $i=0;
        $book_start_char = preg_replace('/[0-9]+/', '', $hour_start);
        $book_end_char   = preg_replace('/[0-9]+/', '', $hour_end);
        $book_start_num  = (int)$hour_start;
        $book_end_num    = (int)$hour_end;
        


        if ($book_start_char == 'PM' && $book_end_char == 'PM') {  // 12PM - 1 2 3 4 5 6 7 8 9 10 - 11PM

            if ($book_start_num == 12 && $book_end_num == 2) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11AM') AND (hour_end LIKE '1PM')) )";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }elseif ($book_start_num == 12 && $book_end_num == 1) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11AM') AND (hour_end LIKE '1PM')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }else{

            $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '%PM') AND (hour_end LIKE '%M')))";
            $available  = mysqli_query($conn,$booking);
           
            while ($row5 = mysqli_fetch_assoc($available)){
                
                $hour_start_num  = (int)$row5['hour_start'];
                $hour_end_num    = (int)$row5['hour_end'];
                
                if( $hour_start_num == $book_start_num && $hour_end_num == $book_end_num ){
                    $i++;
                    break;                    
                }elseif( $book_start_num < $hour_start_num && $book_end_num > $hour_start_num  ) {
                    $i++;
                    break;
                }elseif ($book_start_num < $hour_end_num && $book_end_num > $hour_end_num ) {
                    $i++;
                    break;
                }elseif($book_end_num == $hour_end_num){
                    $i++;
                    break;
                }
            }    
        }
        }elseif($book_start_char == 'AM' && $book_end_char == 'AM') { //12AM - 1 2 3 4 5 6 7 8 9 10 - 11AM
            
            if ($book_start_num == 12 && $book_end_num == 2) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11PM') AND (hour_end LIKE '1AM')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }elseif ($book_start_num == 12 && $book_end_num == 1) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11PM') AND (hour_end LIKE '1AM')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }else{

            $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '%AM') AND (hour_end LIKE '%M')))";
            
            $available  = mysqli_query($conn,$booking);
           
            while ($row5 = mysqli_fetch_assoc($available)){
                
                $hour_start_num  = (int)$row5['hour_start'];
                $hour_end_num    = (int)$row5['hour_end'];
                
                if( $hour_start_num == $book_start_num && $hour_end_num == $book_end_num ){
                    $i++;
                    break;                    
                }elseif( $book_start_num < $hour_start_num && $book_end_num > $hour_start_num  ) {
                    $i++;
                    break;
                }elseif ($book_start_num < $hour_end_num && $book_end_num > $hour_end_num ) {
                    $i++;
                    break;
                }elseif($book_end_num == $hour_end_num){
                    $i++;
                    break;
                }
            }
           } 

        }elseif($book_start_char == 'AM' && $book_end_char == 'PM'){ // 11AM - 12PM  11AM-1PM
            
            if ($book_start_num == 11 && $book_end_num == 1) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '12PM') AND (hour_end LIKE '%PM')) OR ((hour_start LIKE '10AM') AND (hour_end LIKE '%M')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }elseif ($book_start_num == 11 && $book_end_num == 12) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11AM') AND (hour_end LIKE '1PM')) OR ((hour_start LIKE '10AM') AND (hour_end LIKE '%M')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }else{
            $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '%AM') AND (hour_end LIKE '%M')))";
            $available  = mysqli_query($conn,$booking);
           
            while ($row5 = mysqli_fetch_assoc($available)){
                
                $hour_start_num  = (int)$row5['hour_start'];
                $hour_end_num    = (int)$row5['hour_end'];
                
                if( $hour_start_num == $book_start_num && $hour_end_num == $book_end_num ){
                    $i++;
                    break;                    
                }elseif($hour_start_num == 11 && $hour_end_num == 12){
                    if ($book_end_num == 12) {
                        $i++;
                    }
                }elseif ($hour_start_num == 11 && $hour_end_num == 1) {
                    if ($book_start_num == 12) {
                        $i++;
                        break;
                    }elseif($book_end_num == 12){
                        $i++;
                        break;
                    }
                }
            }  


        }

        }elseif($book_start_char == 'PM' && $book_end_char == 'AM'){ // 11PM - 12AM  11PM-1AM



            if ($book_start_num == 11 && $book_end_num == 1) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '12AM') AND (hour_end LIKE '%AM')) OR ((hour_start LIKE '10PM') AND (hour_end LIKE '%M')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }elseif ($book_start_num == 11 && $book_end_num == 12) {
                $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '$hour_start') AND (hour_end LIKE '$hour_end')) OR ((hour_start LIKE '11PM') AND (hour_end LIKE '1AM')) OR ((hour_start LIKE '10PM') AND (hour_end LIKE '%   M')))";
                $available  = mysqli_query($conn,$booking);
                $row5 = mysqli_fetch_assoc($available);
                if (!empty($row5)) {
                    $i++;
                }
            }else{
            $booking    = "SELECT hour_start,hour_end FROM booking WHERE (aside_id={$_GET['aside_id']} AND booking_date = '$date') AND (((hour_start LIKE '%PM') AND (hour_end LIKE '%M')))";
            $available  = mysqli_query($conn,$booking);
           
            while ($row5 = mysqli_fetch_assoc($available)){
                
                $hour_start_num  = (int)$row5['hour_start'];
                $hour_end_num    = (int)$row5['hour_end'];
                
                if( $hour_start_num == $book_start_num && $hour_end_num == $book_end_num ){
                    $i++;
                    break;                    
                }elseif($hour_start_num == 11 && $hour_end_num == 12){
                    if ($book_end_num == 12) {
                        $i++;
                    }
                }elseif ($hour_start_num == 11 && $hour_end_num == 1) {
                    if ($book_start_num == 12) {
                        $i++;
                        break;
                    }elseif($book_end_num == 12){
                        $i++;
                        break;
                    }
                }
            }

         }
        }
        


        
        if ($i == 0) {
            $query10  = "INSERT INTO booking (booking_date ,hour_start,hour_end ,aside_id,customer_id,price)  VALUES ('$date','$hour_start','$hour_end','{$_GET['aside_id']}','{$_SESSION['customer_id']}','$booking_price')";

            if($result8 = mysqli_query($conn,$query10)){
                echo "<script> window.top.location='venue.php?aside_id={$_GET['aside_id']}&pitch_id={$_GET['pitch_id']}&image_id={$_GET['image_id']}&confirm&#confirmation'</script>";   
                }
        }else{
            $time = "Your booking time is unavailable, look for different time";

        }
        

        

    }else{
        $error = "You need to login before start booking";
    }
    
}


?>

<style type="text/css">

    #photo-modal{
        width: 100%;
    }
    #testi_owl{
        width: 100%!important;
    }
    #testi_owl img{
        width: 100%!important;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<style type="text/css">
     
    @media only screen and (max-width: 1000px) {
    .input-group.date.form_datepicker.search{
        width: 120px;
    }
    }

    @media only screen and (max-width: 506px) {
    .col-md-4.col-xs-4.col-sm-4{
        width: 100%;

    }
    
    .venue_page_banner .caption_banner h2 img {
      margin: 0!important;

    }
    }

    @media only screen and (max-width: 1926px) {
    
    .venue_page_banner .caption_banner h2 img {
      margin: 0!important;

    }
    .venue_page_banner .caption_banner p{
        margin-left: 10px;
        padding-top: 4px;
    }

    }
    @media only screen and (max-width: 610px) {
        .btn.btn-primary.custome-btn1.booking{
            margin-top: 15px;
        }
        
    }

</style>

<script type="text/javascript">
    $(document).ready(function()
    {
     
        //get selected parent option 
        var date     = $("#date").val();
        var aside_id = $("#aside_id").val();
        var image_id = $("#image_id").val();
        var pitch_id = $("#pitch_id").val();
        //alert(admin_id);
        $.ajax(
        {
          type: "get",
          url: "ajax/search_booking.php?search=" + date +"&aside_id=" + aside_id +"&image_id=" + image_id + "&pitch_id=" + pitch_id,
          success: function(data)
          {
            $("#search_of_booking").html(data);

          }
        });
                
        
    $("#start_time").change(function()
    {
                    //get selected parent option 
                    var start_time = $("#start_time").val();
                    var dur = 5;
                    //alert(admin_id);
                    $.ajax(
                    {
                      type: "get",
                      url: "ajax/manage_booking.php?start_time=" + start_time + "&dur=" + dur,
                      success: function(data)
                      {
                        $("#durPick").html(data);
                        $("#end_time").html('');

                      }
                    });
                  });

    $("#durPick").change(function()
    {
                    //get selected parent option 
                    var start_time = $("#start_time").val();
                    var durpick    = $("#durPick").val();
                    //alert(admin_id);
                    $.ajax(
                    {
                      type: "get",
                      url: "ajax/manage_booking.php?start_time=" + start_time + "&durpick=" + durpick,
                      success: function(data)
                      {
                        $("#end_time").html(data);
                        var price = $("#price_id").val();
                        var total_price = parseInt(durpick) * parseInt(price) ;
                        $("#booking_price").attr("value",parseInt(total_price));

                      }
                    });
                  });


    $("#date").change(function()
    {
                    //get selected parent option 
                    var date     = $("#date").val();
                    var aside_id = $("#aside_id").val();
                    var image_id = $("#image_id").val();
                    var pitch_id = $("#pitch_id").val();
                    //alert(admin_id);
                    $.ajax(
                    {
                      type: "get",
                      url: "ajax/search_booking.php?search=" + date +"&aside_id=" + aside_id +"&image_id=" + image_id + "&pitch_id=" + pitch_id,
                      success: function(data)
                      {
                        $("#search_of_booking").html(data);

                      }
                    });
                  });
    });
</script> 
<?php
echo 
"<section class='full_venue_dtl_banner venue_page_banner'>
    <a href='#photo' class='menu_popup' style='margin-top:0px;padding:0px;position:absolute;top:20px;left:20px;'>
        <i class='fas fa-images' style='font-size:30px;color:#ed1a3b; '></i>
    </a>
    <img src='images/blank.png' style='background-image:url(../admin/upload/{$row['aside_image']})!important; background-size: cover;background-position: center center;
background-repeat: no-repeat; width: 100%; height:400px;' class='venue_banner_img' >
    <div class='col-sm-12 padleft0 padright0'>";
echo 
"       <div class='caption_banner text-center'>
            <h2 style='text-transform:uppercase'>
                <img src='images/map-icon-ghost.png' class='banner_main'>{$row['pitch_name']} {$row['aside_name']} ({$row['aside_number']} aside)
            </h2>
            <p>{$row['pitch_address']}</p>
        </div> 
    </div>
</section>


";
?>
<section class="detailsMain " id="ride_type" style="padding-bottom:0px;" >
    <div class="container">
        <div class="row type_links">
            <div class="col-md-12 type_links_main">
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="field_img" ><img src="images/football-court.png" class="img-responsive court" ></div>
                    <div class="field_ttl" >Field Size:</div>
                    <?php
                    if ($row['aside_number']==5) {
                        echo "<div class='field_val' >Small</div>";
                    }elseif ($row['aside_number']==6) {
                        echo "<div class='field_val' >Medium</div>";
                    }elseif ($row['aside_number']==7) {
                        echo "<div class='field_val' >Large</div>";
                    }
                    ?>
                    
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="field_img" ><img src="images/quality.png" class="img-respnosive quality" ></div>
                    <div class="field_ttl" >Field Quality:</div>
                    <div class="field_val" >Good</div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="field_img" ><img src="images/grass2.png" class="img-respnosive grass" ></div>
                    <div class="field_ttl" >Field Type:</div>
                    <div class="field_val" >Astro Turf</div>
                </div>
            </div>    
        </div>
    </div>
</section>

<section class="detailsMain detailsMapView " id="ride_type" style="padding-top:0px;" >
    <div class="container margin-bottom-30">

        <div class="row margin-top-15" id="ride_play">

        </div>
    </div>
</section>


<section class="detailsMain " id="ride_type" style="padding-top:0px;" >
    <div class="container margin-bottom-30">
        <div class="row type_links">
            <div class="col-md-12 aminities_main">
                <div class="col-md-12 aminities_title">Amenities</div>
                <div class="col-md-3 col-xs-3 col-sm-3">
                    <div class="field_img" ><img src="images/toilet.png" class="img-responsive" ></div>
                    <div class="field_ttl" >Toilet<div>Available</div></div>
                </div>
                <div class="col-md-3 col-xs-3 col-sm-3">
                    <div class="field_img" ><img src="images/shower.png" class="img-responsive" ></div>
                    <div class="field_ttl" >Shower<div>Available</div></div>
                </div>
                <div class="col-md-3 col-xs-3 col-sm-3">
                    <div class="field_img" ><img src="images/first-aid.png" class="img-responsive" ></div>
                    <div class="field_ttl" >First Aid Kit<div>Not provided</div></div>
                </div>
                <div class="col-md-3 col-xs-3 col-sm-3">
                    <div class="field_img" ><img src="images/football.png" class="img-responsive" ></div>
                    <div class="field_ttl" >Balls<div>Provided</div></div>
                </div>
            </div>    
        </div>
    </div>
</section>

<section id="pitches_table">
    <div class="container">
        <div class="row pitches_wraper">
          <div class="col-md-12 aminities_main">
            <div class="col-md-12 book_pitch_title">Book Online</div>
        </div>


        <div class="filterMain col-md-12" style="border-bottom: 2px solid #fff;">

            <form method='get'>    
                <div class="col-md-4 col-sm-6 col-xs-6 margin-bottom-15 sl-date">
                    <div class="col-md-4 col-sm-6 col-xs-6 sl-date w190">
                        <div  name="selcDate" class="input-group date form_datepicker search" dataDate="" data-Date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input  class="form-control game_dt_field" size="16" type="text" placeholder="Date" id="date" name="date" value="<?php echo $today; ?>">
                            <div class="games_reset_date">X</div>

                        </div>

                    </div>        

                </div>
                    <div class="col-md-4" style="color: #fff">
                        <p> <i style="color: #ed1a3b">♦</i> No booking start from 4AM - 6AM</p>
                        <p> <i style="color: #ed1a3b">♦</i> All-time available except which in table</p>
                        <p> <i style="color: #ed1a3b">♦</i> Select date to see booking time</p>
                    </div>
                <input type="number" name="aside_id" id="aside_id" hidden value="<?php echo"{$_GET['aside_id']}";?>">
                <input type="number" name="image_id" id="image_id" hidden value="<?php echo"{$_GET['image_id']}";?>">
                <input type="number" name="pitch_id" id="pitch_id" hidden value="<?php echo"{$_GET['pitch_id']}";?>">
                <input type="text"   name="pitch_id" id="price_id" hidden value="<?php echo $row['aside_price_hour'];?>">

                <div class="col-md-4 col-sm-6 col-xs-6 gm-type text-right">

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
                    <td >Time</td>
                    <td class="time_td">Price</td>
                    <td class="time_td">Pitch</td>
                </tr>
            </thead>
            <tbody id="search_of_booking">
                

            </tbody>
        </table>

    </div>
</div>
</div>
</section>
<div class="clearfix"></div>


 <div class="early_bird col-sm-12 col-md-12" id="confirmation">
    <span class="first"></span>
    <span class="second"><a href="#book_a_pitch" style="background:#ed1a3b!important;color: #fff;">How it works?</a></span>
 </div>
</a>

<section class="listingMain listbg" style="background-color: #e7e8e9">
    <div id='myurl'>
        <div class="container games_container">
            <div class="filter_wrap" >
                <div class="filterMain col-xs-12 col-md-12 col-sm-12" style="background-color: #e7e8e9">
                    <div class="col-md-6 col-sm-12 col-xs-12" style="width:100%; padding-right: 0px;">
                        <form action="#confirmation" method="get">
                        <div class="col-md-8 col-sm-4 col-xs-6 sl-date w190">
                            <label class="mt" >Date</label>
                            <div  name="selcDate" class="input-group date form_datepicker" dataDate="" data-Date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <input  class="form-control game_dt_field" size="16" type="text" placeholder="Date" name="booking_date" required>
                                <div class="games_reset_date">X</div>
                            </div>
                        </div>


                        <div class="first_2_filter">
                            <div class="col-md-5 col-sm-5 col-xs-5 gm-type  make_50 start_time_wrap" >
                                <label class="mt" >Start Time</label>
                                <select name="hour_start" id="start_time" class="selectpicker show-tick form-control" required>
                                    <option value="99" disabled selected>Start Time</option>
                                    <option value="5PM">5:00 PM</option>
                                    <option value="6PM">6:00 PM</option>
                                    <option value="7PM">7:00 PM</option>
                                    <option value="8PM">8:00 PM</option>
                                    <option value="9PM">9:00 PM</option>
                                    <option value="10PM">10:00 PM</option>
                                    <option value="11PM">11:00 PM</option>
                                    <option value="12AM">12:00 AM (Midnight)</option>
                                    <option value="1AM">1:00 AM</option>
                                    <option value="2AM">2:00 AM</option>
                                    <option value="3AM" disabled>3:00 AM</option>
                                    <option value="4AM" disabled>4:00 AM</option>
                                    <option value="5AM" disabled>5:00 AM</option>
                                    <option value="6AM" disabled>6:00 AM</option>
                                    <option value="7AM">7:00 AM</option>
                                    <option value="8AM">8:00 AM</option>
                                    <option value="9AM">9:00 AM</option>
                                    <option value="10AM">10:00 AM</option>
                                    <option value="11AM">11:00 AM</option>
                                    <option value="12PM">12:00 PM</option>
                                    <option value="1PM">1:00 PM</option>
                                    <option value="2PM">2:00 PM</option>
                                    <option value="3PM">3:00 PM</option>
                                    <option value="4PM">4:00 PM</option>
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 gm-type  make_50 end_time_wrap">
                                <label class="mt" >Game Duration</label>
                                <select id="durPick" name="duration" class="show-tick form-control" style=" width: 100px; height: 38px;color:#a7a9ac;font-size: 14px; " required>
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 gm-type  make_50 end_time_wrap">
                                <label class="mt">End Time</label>
                                <select name="hour_end" id="end_time" required class="form-control" style=" width: 100px; height: 38px;color:#a7a9ac;font-size: 14px;">

                                </select>
                                
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 gm-type  make_50 end_time_wrap">
                                <label class="mt">Price in JD</label>
                                <input type="text" name="booking_price" id="booking_price" value class="form-control" style=" width: 100px; height: 38px;color:#a7a9ac;font-size: 14px;" readonly>
                            </div>
                        </div>
                        <input type="number" name="aside_id" hidden value="<?php echo"{$_GET['aside_id']}";?>">
                        <input type="number" name="image_id" hidden value="<?php echo"{$_GET['image_id']}";?>">
                        <input type="number" name="pitch_id" hidden value="<?php echo"{$_GET['pitch_id']}";?>">

                        <div class="second_half_filter">

                         <div class="col-md-12 col-sm-12 col-xs-5 gm-type end_time_wrap">
                            <label class="mt">&nbsp;</label>
                            <label class="pitch_type_lbl submit_label " >&nbsp;</label>
                            <label class="pitch_type_lbl submit_label" >&nbsp;</label>
                        </div>
                    </div>
                    <div class="text-center" style="background-color: #e7e8e9">
                        <button type="submit" class="btn btn-primary custome-btn1 booking" name="booking">Booking</button>
                </div>
                        

                    </form>


            </div>
        </div>
    </div>
</div>
</div>
</section>



<div class="col-md-12 col-sm-12 col-xs-12 booking_btns sticky_fixed" style="padding-right: 0px; text-align: right; background: none 0px 0px repeat scroll rgba(0, 0, 0, 0.7);">
    <a href="bookpitch.php">
        <button type="button" class="btn btn-primary custome-btn" style="color: #58585a; border-color:#58585a; background-color:white; margin-top:0px;">
            Back to search
        </button>
    </a>
</div>
<div class="clearfix" style="background-color: #e7e8e9"> </div>
<div style="background-color: #e7e8e9!important ">
    <?php
    if (isset($error)) {
        echo "<div class='alert alert-warning col-md-12 text-center' style='margin:0;'>$error</div>";
    }if (isset($time)) {
        echo "<div class='alert alert-danger col-md-12 text-center' style='margin:0;'>$time</div>";
        
    }
    if (isset($_GET['confirm'])) {
        echo "<div class='alert alert-success col-md-12 text-center' style='margin:0;'>Booking Confirm</div>";
        
    }
    ?>
</div>



<div class="remodal photo" data-remodal-id="photo"  id="photo" style="max-width: 90%;background:none;">
    <div class="col-sm-12">
        <a data-remodal-action="cancel" class="remodal-cancel close_popup_jian2">X</a>

        <section class="testi-section" style="background:none;" >



            <div class="owl-carousel" id="testi_owl" >

                <?php
                $query3  = "SELECT * FROM images WHERE 
                         aside_id = {$_GET['aside_id']}";
                $result3 = mysqli_query($conn,$query3);
                while ($row3=mysqli_fetch_assoc($result3)) {                
                echo "<img src='images/blank.png' style='background-image:url(../admin/upload/{$row3['aside_image']});width:300px;;height:300px;background-repeat:no-repeat;background-position: center center;'>";
            }
                ?>

            </div>
        </section>




    </div>
</div>



<?php
include('includes/public_footer.php');
?>
