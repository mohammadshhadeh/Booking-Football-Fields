<?php
include_once('includes/public_header.php');



$query  = "SELECT * FROM pitch WHERE pitch_id = {$_GET['pitch_id']}";

$result     = mysqli_query($conn,$query);
$row        = mysqli_fetch_assoc($result);


?>
<style type="text/css">
        #pitch-slider{
            background:rgba(255,255,255 ,0.5); 
        border-radius: 15px!important;
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

</style>

<section class='full_venue_dtl_banner venue_page_banner'>
    <?php
    echo "
    <img src='images/blank.png' style='background-image:url(../admin/upload/{$row['pitch_image']})!important; background-size: cover;background-position: center center;
    background-repeat: no-repeat; width: 100%; height:400px;' class='venue_banner_img' >
    <div class='col-sm-12 padleft0 padright0'>
    <div class='caption_banner text-center'>
    <h2 style='text-transform:uppercase'>
    <img src='images/map-icon-ghost.png' class='banner_main'>
    {$row['pitch_name']}
    </h2>
    <p>{$row['pitch_address']}</p>
    </div> 
    </div>
    </section>";
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

    <section class="detailsMain " id="ride_type" style="padding-bottom:0px;" >
        <div class="container">
            <div class="row type_links">
                <div class="col-md-12 type_links_main">
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <div class="field_img" ><img src="images/football-court.png" class="img-responsive court" ></div>
                        <div class="field_ttl" >No. of Field:</div>
                        <div class="field_val" >
                            <?php
                            echo $row['five_aside']+$row['six_aside']+$row['seven_aside'];
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <div class="field_img" ><img src="images/quality.png" class="img-respnosive quality" ></div>
                        <div class="field_ttl" >Fields Quality:</div>
                        <div class="field_val" >Good</div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <div class="field_img" ><img src="images/grass2.png" class="img-respnosive grass" ></div>
                        <div class="field_ttl" >Field Type:</div>
                        <div class="field_val" >Astro Turf</div>
                    </div>
                </div> 

                <section class="detailsMain " id="ride_type" style="padding-top:0px;" >
                    <div class="container margin-bottom-30">
                        <div class="row type_links">
                            <div class="col-md-12 aminities_main">
                                <br>
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


                <section class="testi-section" style="background-color: #e7e8e9" >
                    <div class="container" >
                        <div class="row" >

                            <div class="col-md-12 col-sm-12 col-xs-12 teti_title" >
                                <?php
                                    echo $row['pitch_name'];
                                ?>
                                Pitches
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 teti_desc" >

                                <div class="owl-carousel" id="testi_owl" >

                                 <?php

                                 $query1   = " SELECT  * FROM (SELECT DISTINCT aside_image,aside_id,image_id FROM  images AS C GROUP by aside_id ) AS c1 JOIN aside AS c2 ON c1.aside_id = c2.aside_id WHERE pitch_id = {$_GET['pitch_id']} ";
                                 $result1  = mysqli_query($conn,$query1);
                                 while ($row1=mysqli_fetch_assoc($result1)) {
                                    echo "<div class='testi_item text-left' id='pitch-slider'>
                                    <div><img src='images/blank.png' style='background-image:url(../admin/upload/{$row1['aside_image']}); border-radius:0px; height:100%'></div>
                                    <div class='player_name' style='text-transform:capitalize'><i style='color:red;'class='fas fa-futbol'></i>  
                                     {$row1['aside_name']} {$row1['aside_number']} Aside</div>
                                    <div class='player_game' ><i class='fas fa-dollar-sign' style='color:green;'></i> {$row1['aside_price_hour']}$/hour</div>
                                    <div class='player_name'><a target='_blank' href='venue.php?pitch_id={$row['pitch_id']}&aside_id={$row1['aside_id']}&image_id={$row1['image_id']}'><span class='btn btn-block ' style='background-color:#e92b3a;padding:4px; border-radius:4px; color:#fff;' > Book Now!</span></a></div>
                                    </div>
                                    ";

                                }  
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="venue-map" class="map-details resmartop20" style="">
                <hr style="color:#a9a9ab; border: 1px solid #a9a9ab">
                <div class="separate-section event_description_wrap">
                    <div class="sec-head text-center" >Location:</div>
                    <div class="services-details">
                        <div class="icon-row">
                            <div class="full-width">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d25017.791495273243!2d35.92290233991596!3d31.867321333976072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e2!4m0!4m5!1s0x151b588eff2c54e1%3A0x8914841e39cf01cd!2sSaeed%20Ben%20Amer%2C%20Amman!3m2!1d31.871584799999997!2d35.929149599999995!5e0!3m2!1sen!2sjo!4v1577365666177!5m2!1sen!2sjo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>   
                        </div>
                    </div>
                </div>
                
                <div class="full-details">
                    <div class="separate-section event_description_wrap">
                        <div class="sec-head">Pitch Description:</div>
                        <div class="services-details">
                            <div class="icon-row">
                                <p class="event_description text-left">All players are welcome to this venue! <br>
                                    <?php
                                    echo "<p class='text-left'>{$row['description']}</p>";
                                    ?>
                                </div>
                            </div>
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




        <div class="col-md-12 col-sm-12 col-xs-12 booking_btns sticky_fixed" style="padding-right: 0px; text-align: right; background: none 0px 0px repeat scroll rgba(0, 0, 0, 0.7);">
            <a href="pitches.php">
                <button type="button" class="btn btn-primary custome-btn" style="color: #58585a; border-color:#58585a; background-color:white; margin-top:0px;">
                    Back to Venues
                </button>
            </a>
        </div>
        <div class="clearfix" style="background-color: #e7e8e9"> </div>


        <?php
        include('includes/public_footer.php');
        ?>


