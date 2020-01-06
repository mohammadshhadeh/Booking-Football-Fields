<?php
include_once('includes/public_header.php');

?>

<style type="text/css" >
    /* New Mobile Deisng :: START */
    .first_game_div{ padding-right: 0px; }
    .second_game_div{ padding-right: 0px; }
    .gameListing .gameDetails{ background: #FFF; padding: 10px 0px 10px 10px; width: 99%; margin: 0px 0px 15px 0px; border-radius: 0 0 5px 5px; }
    .gameListing .gameThumb{ padding-right: 3px; padding-top: 5px; }
    .gameListing .gameThumb img{ border-radius: 5px 5px 0 0; }
    .gameListing .gameThumb .caption_top2{ width: 110px; height: 110px; top: 3px; right: 0px; }
    .gameListing .gameThumb .caption_top_left{width : 90px; height: 40px; top: 20px; left: 20px; position: absolute;}
    .gameListing .gameThumb .caption{ right: 3px; padding: 10px; }
    .gameListing .gameThumb .caption h1{ font-family:"Lato Black" !important; font-size: 16px; font-weight: 400; }
    .gameListing .gameThumb .caption h1 a{ font-family:"Lato Black" !important; font-size: 16px; font-weight: 400; }
    .gameListing .gameThumb .caption p{ font-size: 13px; font-family:"Lato Regular"; }
    .gameListing .games_eb { background: #f99e1a; color: #ffffff; border-radius: 5px; padding: 2px 5px; font-size: 12px; font-family:"Lato Light"; }
    .gameListing .font-red{ color: #ff1339; padding-left: 0px; font-family:"Roboto Black"; padding-right: 10px; }
    .gameListing .font-grey{ color: #6a6a6a; text-align: right; font-weight: 700; padding-left: 0px; font-family:"Roboto Black"; padding-right: 10px; }
    .gameListing .status-green{ font-family:"Lato Black"; color: #FFF; background: #69b644; padding: 2px 5px; border-radius: 5px; font-size: 12px; letter-spacing: 0.3px; }
    .gameListing .status-grey{ font-family:"Lato Black"; color: #FFF; background: #c2c1c1; padding: 2px 5px; border-radius: 5px; font-size: 12px; letter-spacing: 0.3px; }
    .gameListing .status-yellow{ font-family:"Lato Black"; color: #FFF; background: #f99e1a; padding: 2px 5px; border-radius: 5px; font-size: 12px; letter-spacing: 0.3px; }
    .gameListing .gameDetails .cnt2 .row{ margin-right: 0px; }
    .gameListing .wait_list_div{ padding-bottom: 25px; width: 99%; float: left; }
    .gameListing .wait_list_div .join_wait_link{ border-radius: 0 0 5px 5px; background: #ed1a3b; font-size: 16px; color: #fff; margin: 0; padding: 5px 0; text-align: center; font-style: italic; display: inline-block; width: 100%; }
    .gameListing .wait_list_div .join_wait_link_blank{ border-radius: 0 0 5px 5px; font-size: 16px; color: #fff; margin: 0; padding: 5px 0; text-align: center; font-style: italic; display: inline-block; width: 100%; }
    .verified_host{ position: absolute; top: -15px; right: 10px; text-align: center; }
    .verified_host .profile_listing{ width: 31px !important; height: 31px !important; border-radius: 50% !important; border: 2px solid #FFF; background-size: cover !important; background-position: center !important; }
    .verified_host .verified_listing{ width: 31px !important; height: 31px !important; background-size: cover !important; background-position: center !important; }
    .verified_host .profile_name{ color: #FFF; font-size: 12px; padding-top: 3px; font-family:"Lato Regular"; }
    .verified_host .verified_name{ color: #FFF; font-size: 12px; font-family:"Lato Bold"; }
    .verified_host .verified_name_big{ color: #FFF; font-size: 14px; font-family:"Lato Bold"; }
    .verified_host .verified_name img{ width: 16px; height: 16px; margin-bottom: 5px; }

    .scroll_filter{}
    .scroll_filter .container #adv_filter_btn_sticky{ background: none; border: none; color: #ed1a3b; padding: 3px; }
    .scroll_filter .container .filterMain .gm-type .shortcut label{ background: none; border: none; color: #000; padding: 3px; font-family:"Lato Regular"; }
    .scroll_filter .container .filterMain .gm-type .shortcut label:hover{ background: none; border: none; color: #ed1a3b; padding: 3px; font-family:"Lato Regular"; }

    .mobile3{ font-family:"Lato Regular" !important; font-size: 13px; padding-right: 10px; width: 40%; }
    .mobile9{ font-family:"Lato Regular" !important; width: 60%; }


    .filter_button_mobile{ display: none; position: fixed; z-index: 999999; bottom: 5%; }
    .filter_button_mobile .filter_button{ font-family:"Lato Black"; font-size: 16px; border-radius: 20px; padding: 5px 25px; text-decoration: none; outline: none; }

    .gameListing .gameDetails a{ color: #58585a; }
    .gameListing .gameDetails a:hover{ color: #58585a; }

    /*.first_game_div:hover .gameDetails, .second_game_div:hover .gameDetails{ background: #fbf6ed; cursor: pointer; }*/
    .first_game_div:hover .gameDetails, .second_game_div:hover .gameDetails{ background: #58585a; cursor: pointer; color: #FFF !important; }
    .first_game_div:hover .gameDetails a, .second_game_div:hover .gameDetails a{ color: #FFF !important; }
    .first_game_div:hover .gameDetails .font-grey, .second_game_div:hover .gameDetails .font-grey{ color: #FFF !important; }
    .first_game_div:hover .gameDetails .font-red, .second_game_div:hover .gameDetails .font-red{ color: #FFF !important; }

    .filterMain_more .custom-checkbox input[type=checkbox]:checked+label {
        color: #ed1a3b !important;
    }

    @media only screen and (max-width: 1048px) {
      .gameListing .gameThumb .caption h1{ font-size: 16px; }
      .gameListing .gameThumb .caption p{ font-size: 13px; }
  }

  @media only screen and (max-width: 1030px) {

  }

  @media only screen and (max-width: 992px) {
      .first_game_div { padding-left: 10px; padding-right: 10px; }
      .second_game_div { padding-left: 10px; padding-right: 10px; }
      .gameListing .gameThumb .caption h1{ font-size: 14px; }
      .gameListing .gameThumb .caption p{ font-size: 13px; }

      .gameListing .status-green{ font-size: 10px; }
      .gameListing .status-grey{ font-size: 10px; }
      .gameListing .status-yellow{ font-size: 10px; }
      .gameListing .games_eb{ font-size: 10px; }

      .mobile3{ width: 40%; }
      .mobile9{ width: 60%; }
      .gameListing .font-grey{ font-size: 11px !important; }
  }

  @media only screen and (max-width: 900px) {
      .mobile9{ padding-right: 0px; }
  }

  @media only screen and (max-width: 850px) {
      .gameListing .font-red{ font-size: 12px; }
      .gameListing .font-grey{ font-size: 12px; }
      .gameListing .games_eb{ padding: 2px; }
      .gameListing .font-grey{ font-size: 10px !important; }
      .mobile9{ font-size: 12px !important; }
  }

  @media only screen and (max-width: 800px) {
      .gameListing .games_eb{ padding: 2px 5px; }
      .gameListing .gameThumb .caption h1{ font-size: 16px; }
      .gameListing .gameThumb .caption p{ font-size: 13px; }

      .gameListing .status-green{ font-size: 12px; }
      .gameListing .status-grey{ font-size: 12px; }
      .gameListing .status-yellow{ font-size: 12px; }
      .gameListing .games_eb{ font-size: 12px; }

      .first_game_div{ padding-left: 20px !important; padding-right: 10px !important; }
      .second_game_div{ padding-left: 10px !important; padding-right: 20px !important; }

      .gameListing .font-grey{ font-size: 12px !important; }
      .mobile9{ font-size: 14px !important; font-weight: 700; }
  }

  @media only screen and (max-width: 768px) {
      .mobile9{ width: 60% !important; }
      .mobile3{ width: 40% !important; }

      section.listingMain .filterMain{ padding-left: 0px; padding-right: 0px; }
      .round_beside2{ width: 100% !important; padding-left: 0px; }
      .filterMain .checkbox-inline{ padding-right: 10px; }

      .filter_button_mobile{ display: block; }
      .filterMain_more .filterMain_more_nxt{ text-align: center; }


      .gameListing .font-grey{ font-size: 12px !important; }
      .mobile9{ font-size: 14px !important; font-weight: 700; }

  }

  @media only screen and (max-width: 680px) {
  /*.gameListing .gameThumb .caption h1{ font-size: 14px; }
  .gameListing .gameThumb .caption p{ font-size: 12px; }*/
  .mobile3{ padding-left: 0px; }
}

@media only screen and (max-width: 640px) {
  .gameListing .font-red{ font-size: 12px; }
  .gameListing .font-grey{ font-size: 12px; }
}

@media only screen and (max-width: 580px) {
  .mobile9{ padding-left: 15px; padding-right: 0px; }
  .mobile3{ padding-left: 0px; padding-right: 10px; }
  .gameListing .gameThumb .caption{ padding: 10px 10px; }
  .gameListing .gameDetails .cnt1, .gameListing .gameDetails .cnt2{ padding: 0px;  }
}

@media only screen and (max-width: 580px) {
    .gameListing .font-grey{ font-size: 11px !important; }
    .mobile9{ font-size: 12px !important; font-weight: 700; }
}

@media only screen and (max-width: 560px) {
  /*.gameListing .gameThumb .caption h1{ font-size: 16px; }
  .gameListing .gameThumb .caption p{ font-size: 13px; }*/
  .first_game_div{ padding-left: 20px !important; padding-right: 20px !important; }
  .second_game_div{ padding-left: 20px !important; padding-right: 20px !important; }
  .gameListing .gameDetails{ width: 99.5%; }

  .gameListing .font-red{ font-size: 16px; }
  .gameListing .font-grey{ font-size: 16px; }

  .gameListing .status-green{ font-size: 13px; }
  .gameListing .status-grey{ font-size: 13px; }
  .gameListing .status-yellow{ font-size: 13px; }
  .gameListing .games_eb{ font-size: 13px; }

  .gameListing .gameThumb .caption h1{ font-size: 17px; }
  .gameListing .gameThumb .caption p{ font-size: 13px; }

  .verified_host{ top: -20px; }
  .verified_host .profile_name{ font-size: 13px; }
  .verified_host .verified_name{ font-size: 11px; }

  .gameListing .font-grey{ font-size: 14px !important; }
  .mobile9{ font-size: 16px !important; font-weight: 700; }
}

@media only screen and (max-width: 380px) {
  .filterMain .checkbox-inline{ padding-right: 7px; }

  .gameListing .font-grey{ font-size: 12px !important; }
  .mobile9{ font-size: 14px !important; font-weight: 700; }
  .gameListing .games_eb{ font-size: 12px !important; }

}

@media only screen and (max-width: 350px) {

}

@media only screen and (max-width: 340px) {
  .filterMain .checkbox-inline{ padding-right: 4px; }

  .gameListing .font-red{ font-size: 14px; }
  .gameListing .font-grey{ font-size: 14px; }
}
@media only screen and (max-width: 559px) {
  .row.margin_side0{
    width: 90%;
    margin: 0 auto;
  }
}


/* New Mobile Deisng :: OVER */

</style>

<section class="full_venue_dtl_banner venue_page_banner">
    <img src="images/blank.png" style="background-image:url(../images/bg-2.png);" class="venue_banner_img" >
    <div class="col-sm-12 padleft0 padright0">

        <div class="caption_banner">
            <h2>
                <img src="images/map-icon-ghost.png" class="banner_main">
                Venues in Amman
            </h2>

        </div>
    </div>

</section>

<section class="listingMain listbg" >
    <div class="container games_container" >
        <div class="row" >
            <div class="filterMain col-xs-12 ">
                <div class="col-xs-12 gameListing gameListing_responsive">
                    <div class="row margin_side0"  >
                        <div class="row margin_side0">
                            <div class="vincent_wrapper">
                               <div class="vincent mobile_game_dtls">



                                <?php
                                    $query  = "SELECT * FROM pitch";
                                    $result = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_assoc($result)) {


                          echo    "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 ga-click-join first_game_div join_click'>
                                    <div class='gameThumb' style='overflow:hidden;'> 
                                        <a href='pitch.php?pitch_id={$row['pitch_id']}'>
                                            <img src='../admin/upload/{$row['pitch_image']}' alt='venue image' class='ga-click-join'>
                                        </a>
                                        <div class='caption_top_left'>
                                            <img class='cat_ribbon_left' src='images/blank.png' alt='promo image'>
                                        </div>
                                        <a href='pitch.php?pitch_id={$row['pitch_id']}'>
                                            <div class='caption'>
                                                <h1 class='ga-click-join' style='color:#69b644'>{$row['pitch_name']}</h1>
                                                <p class='ga-click-join'>{$row['pitch_address']}</p>
                                            </div>
                                        </a>
                                  </div>
                                  <div class='gameDetails'>
                                      <a href='pitch.php?pitch_id={$row['pitch_id']}' class='ga-click-join'>
                                        <div class='cnt2'>
                                            <div class='row'>
                                                <div class='col-md-12  col-sm-6 mobile9 col-xs-12 ga-click-join'>
                                                    {$row['five_aside']} five aside, {$row['six_aside']} six aside & {$row['seven_aside']} seven aside
                                                </div>
                                            </div>
                                        </div>
                                        <div class='cnt2'>
                                            <div class='row'>
                                                <div class='col-md-6 col-sm-8 mobile9 col-xs-12 ga-click-join'>   
                                                </div>
                                                <div class='col-md-6 col-sm-4 mobile3 col-xs-12 ga-click-join text-right'><span class='ga-click-join status-green'>See Now!</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> ";                                     
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
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



