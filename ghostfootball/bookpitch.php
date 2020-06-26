<?php
    include_once('includes/public_header.php');
?>
<!-- Filter-Slider Style -->
<link rel="stylesheet" type="text/css" href="css/filter-slider.css">
<!-- Header -->
<div class="early_bird" >
    <span class="second" >Search for aside?</span>
</div>
<!-- Filter -->
<section class="listingMain listbg">
    <div id='myurl'>
        <div class="container games_container">
            <div class="filter_wrap">
                <div class="filterMain col-xs-12 col-md-12 col-sm-12 ">
                    <div class="col-md-4 col-sm-12 col-xs-12" style="width:100%; padding-right: 0px;"><form method="get">
                        <div class="second_half_filter">
                            <div class="col-md-2 col-sm-2 col-xs-2 gm-type make_50   duration_wrap">
                                <label class="mt10" >No. aside?</label>
                                <select id="durPick" name="aside" class="selectpicker show-tick form-control">
                                    <option value="0" selected>Any</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-2 gm-type make_50  duration_wrap">
                                <label class="mt10" >Pitch Name?</label>
                                <select id="durPick" name="pitch" class="selectpicker show-tick form-control">
                                    <option value='0' selected>Any</option>
                                    <?php
                                    $query  = "SELECT * FROM pitch";
                                    $result = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['pitch_id']}'>{$row['pitch_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="mt20" ></label>
                            <div class="col-md-8 col-sm-2 col-xs-8 pitch_type_select gm-type make_50 mt10 w190">
                                <label class="mt20" ></label>
                                <label class="pitch_type_lbl submit_label" >&nbsp</label>
                                <input type="submit" class="btn btn-primary inline_dsp search_btn" id ="submit_filter_btn" value="Search" name="submit" style="background-color:#f99e1a; border-color:#f99e1a; " />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <!-- Filter Slider :: START -->
                <div class="filter_slider" >
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: left;
                    vertical-align: middle;">
                    <h2 style="margin-top: 0px; font-size:28px;
                    ">Find a Pitch</h2>
                    <div class="col-md-12 col-sm-12 col-xs-12 filter_slider_main" >
                    <div class="owl-carousel">
                        <?php
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)){
                        echo "<div class='item col-xs-12 col-sm-12 col-md-12'>
                                <div class='item_desc' >
                                    <a href='pitch.php?pitch_id={$row['pitch_id']}' target='_blank' class=''>
                                        <div class='col-md-4 col-sm-4 col-xs-4' >
                                            <img src='../admin/upload/{$row['pitch_image']}' class='ga-click-join'/>
                                        </div>
                                         <div class='col-md-8 col-sm-8 col-xs-8'>
                                            <div><strong class='ga-click-join'>{$row['pitch_name']}</strong></div>
                                            <div><small class='ga-click-join'>{$row['five_aside']} five aside, {$row['six_aside']} six aside & {$row['seven_aside']} seven aside</small></div>
                                            <div style='color:#ed1a3b; padding-top:4px; line-height:17px;' class='last_line' >Ghost Football</div>
                                        </div>
                                    </a>
                                </div>
                              </div>";
                                    }
                            ?>
                      <!-- Wrapper for slides -->
                        


                    </div>
                </div>

            </div>
        </div>                
        <!-- Filter Slider :: OVER -->
        <!-- Filter Slider :: START -->
        <script src="js/owl.carousel-min.js"></script>
        <script language="javascript" >
          $('.owl-carousel').owlCarousel({
            loop:false,
            margin:10,
            stagePadding: 30,
            responsiveClass:true,
            navText: ["<img src='images/btn-prev.png'>", 
                    "<img src='images/btn-next.png'>"],
            responsive:{
              0:{
                items:1,
                nav:false
            },
            420:{
                items:2,
                nav:false
            },
            640:{
                items:2,
                nav:false
            },
            700:{
                items:2,
                nav:false
            },
            768:{
                items:2,
                nav:true,
                loop:false
            },
            992:{
                items:3,
                nav:true,
                loop:false
            }

        }
    });


</script>


<div class="clearfix"></div>
<div id="available_pitches" >
    <div class='row margin-top-30 margin-bottom-30 promo_detail_cls' id='promo_detail'>
        <div class ='vincent_wrapper'>
            <div class ='vincent mobile_game_dtls'>
                <?php
                $query  = " SELECT  * FROM (SELECT aside_image,aside_id,image_id FROM  images AS C GROUP by aside_id ) AS c1 JOIN aside AS c2 ON c1.aside_id = c2.aside_id JOIN pitch AS c3 ON c3.pitch_id = c2.pitch_id" ;

                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($_GET['submit'])) {
                        if ($row['aside_number']== $_GET['aside'] && $_GET['pitch']==$row['pitch_id']) {

                            echo "
                            <div class='col-md-6 col-sm-6 col-xs-12 margin-bottom-15'>
                            <a class='' href='venue.php?aside_id={$row['aside_id']}&pitch_id={$row['pitch_id']}&image_id={$row['image_id']}'>
                            <div class='col-md-5 col-sm-12 col-xs-12'>
                            <img src='../admin/upload/{$row['aside_image']}'>
                            </div>
                            <div class='col-md-7 col-sm-12 col-xs-12 pitch_info_new'>
                            <h3>{$row['pitch_name']}</h3>
                            <p class='mb5' >{$row['pitch_address']}</p>
                            <p class='mt5 price_hour'>{$row['aside_number']} aside <br>Price <span style='color:#ed1a3b'>{$row['aside_price_hour']} $</span> / hr</p>
                            <div class='icon_main'>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/football-court.png' class='img'>  <br>
                            <span>Pitch</span>
                            </div>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/ball.png' class='img'><br>
                            <span>Ball</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/toilet.png' class='img'><br>
                            <span>Toilet</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/shower.png' class='img'><br>
                            <span>Shower</span>
                            </div>                                        
                            </div>
                            </div>
                            </a>
                            </div>";
                        }elseif($_GET['aside']==0 && $_GET['pitch']==$row['pitch_id']){
                            echo "
                            <div class='col-md-6 col-sm-6 col-xs-12 margin-bottom-15'>
                            <a class='venue_link' href='venue.php?aside_id={$row['aside_id']}&pitch_id={$row['pitch_id']}&image_id={$row['image_id']}'>
                            <div class='col-md-5 col-sm-12 col-xs-12'>
                            <img src='../admin/upload/{$row['aside_image']}'>
                            </div>
                            <div class='col-md-7 col-sm-12 col-xs-12 pitch_info_new'>
                            <h3>{$row['pitch_name']}</h3>
                            <p class='mb5' >{$row['pitch_address']}</p>
                            <p class='mt5 price_hour'>{$row['aside_number']} aside <br>Price <span style='color:#ed1a3b'>{$row['aside_price_hour']} $</span> / hr</p>
                            <div class='icon_main'>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/football-court.png' class='img'>  <br>
                            <span>Pitch</span>
                            </div>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/ball.png' class='img'><br>
                            <span>Ball</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/toilet.png' class='img'><br>
                            <span>Toilet</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/shower.png' class='img'><br>
                            <span>Shower</span>
                            </div>                                        
                            </div>
                            </div>
                            </a>
                            </div>";
                        }elseif($_GET['aside']==0 && $_GET['pitch']==0){
                            echo "
                            <div class='col-md-6 col-sm-6 col-xs-6 margin-bottom-15'>
                            <a class='venue_link' href='venue.php?aside_id={$row['aside_id']}&pitch_id={$row['pitch_id']}&image_id={$row['image_id']}'>
                            <div class='col-md-5 col-sm-12 col-xs-12'>
                            <img src='../admin/upload/{$row['aside_image']}'>
                            </div>
                            <div class='col-md-7 col-sm-12 col-xs-12 pitch_info_new'>
                            <h3>{$row['pitch_name']}</h3>
                            <p class='mb5' >{$row['pitch_address']}</p>
                            <p class='mt5 price_hour'>{$row['aside_number']} aside <br>Price <span style='color:#ed1a3b'>{$row['aside_price_hour']} $</span> / hr</p>
                            <div class='icon_main'>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/football-court.png' class='img'>  <br>
                            <span>Pitch</span>
                            </div>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/ball.png' class='img'><br>
                            <span>Ball</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/toilet.png' class='img'><br>
                            <span>Toilet</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/shower.png' class='img'><br>
                            <span>Shower</span>
                            </div>                                        
                            </div>
                            </div>
                            </a>
                            </div>";
                        }elseif($_GET['aside']==$row['aside_number'] && $_GET['pitch']==0){
                            echo "
                            <div class='col-md-6 col-sm-6 col-xs-12 margin-bottom-15'>
                            <a class='venue_link' href='venue.php?aside_id={$row['aside_id']}&pitch_id={$row['pitch_id']}&image_id={$row['image_id']}'>
                            <div class='col-md-5 col-sm-12 col-xs-12'>
                            <img src='../admin/upload/{$row['aside_image']}'>
                            </div>
                            <div class='col-md-7 col-sm-12 col-xs-12 pitch_info_new'>
                            <h3>{$row['pitch_name']}</h3>
                            <p class='mb5' >{$row['pitch_address']}</p>
                            <p class='mt5 price_hour'>{$row['aside_number']} aside <br>Price <span style='color:#ed1a3b'>{$row['aside_price_hour']} $</span> / hr</p>
                            <div class='icon_main'>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/football-court.png' class='img'>  <br>
                            <span>Pitch</span>
                            </div>
                            <div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/ball.png' class='img'><br>
                            <span>Ball</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs' >
                            <img src='images/toilet.png' class='img'><br>
                            <span>Toilet</span>
                            </div><div class='col-md-3 col-sm-3 col-xs-3 mt10 icon_divs'>
                            <img src='images/shower.png' class='img'><br>
                            <span>Shower</span>
                            </div>                                        
                            </div>
                            </div>
                            </a>
                            </div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</div>

</div>

</div>
</div>
</div>
</section>



<?php

include('includes/public_footer.php');

?>

