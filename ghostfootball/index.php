<?php
include_once('includes/public_header.php');
?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<style type="text/css">
  .disabled{
    cursor: not-allowed;
    pointer-events: none;
  }

  .disabled .disabled{
    cursor: not-allowed;
    pointer-events: none;
  }

 @media (max-width: 2006px) { 
  .more-football-sectoin-2019 .row{
    margin-top : 90px;
  }
}

 @media (max-width: 1106px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 100px;
  }
}
@media (max-width: 1007px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 280px;
  }
}

@media (max-width: 1050px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 180px;
  }
}

@media (max-width: 1030px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 250px;
  }
}


@media (max-width: 767px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 200px;
  }
}

@media (max-width: 567px) { 

  .more-football-sectoin-2019 .row{
    margin-top : 220px;
  }
}



</style>

<div class="early_bird" >
  <span class="first" ></span>
  <span class="second" >WELCOME!</span>
</div>

<section class="banner-video " style="background: #f4f4f4;" >

 <div class="banner-video-new " >
  <div class="container" >
   <div class="row" >

    <div class="col-md-6 col-xs-12 banner_details text-center" >
     <div class="banner_hello" >Hello 
      <span>
        <?php
        if (isset($_SESSION['customer_id'])) {
          echo "{$row['name']} !";
        }else{
          echo " GHOSTIE !";
        }
        ?>
      </span></div>
      <div class="banner_what" >What do you want to do today?</div>
    </div>

    <div class="col-md-12 col-xs-12 banner_icons animated rollIn" >

     <div class="col-md-12 col-xs-12 banner_top_icon" >
      <div class="icon_main_title" >Individuals</div>

      <div class="icon_tab">
       <a class="disabled">
        <div class="icon_img" ><img src="images/home/top-2019-1.png" /></div>
        <div class="icon_label" >Join a Game</div>
      </a>
    </div>
    <div class="icon_tab " >
     <a class="disabled">
      <div class="icon_img" ><img src="images/home/top-2019-2.png" /></div>
      <div class="icon_label" >Explore Subscriptions</div>
    </a>
  </div>
  <div class="icon_tab">
   <a href="bookpitch.php">
    <div class="icon_img" ><img src="images/home/top-2019-3.png" /></div>
    <div class="icon_label" >Book a Pitch</div>
  </a>
</div>
<div class="icon_tab " >
 <a class="disabled">
  <div class="icon_img" ><img src="images/home/top-2019-4.png" /></div>
  <div class="icon_label" >Set up your Game</div>
</a>
</div>

</div>
<div class="col-md-12 col-xs-12 banner_bottom_icon_main" >
  <div class="col-md-12 col-xs-12 banner_bottom_icon" >
   <div class="col-md-6 col-xs-6" style="border-right: 1px solid #ebebeb; margin-top: 15px;" >
    <div class="col-md-12 col-xs-12 icon_main_title" >TEAMS</div>
    <div class="icon_tab" >
      <a class="disabled">
        <div class="icon_img" ><img src="images/home/top-2019-5.png" /></div>
        <div class="icon_label" >Book a Friendly</div>
      </a>
    </div>
    <div class="icon_tab" >
      <a class="disabled">
        <div class="icon_img" ><img src="images/home/top-2019-6.png" /></div>
        <div class="icon_label" >Join a League</div>
      </a>
    </div>
  </div>
  <div class="col-md-6 col-xs-6" style="margin-top: 15px;" >
    <div class="col-md-12 col-xs-12 icon_main_title" >JUNIORS</div>
    <div class="icon_tab" >
      <a class="disabled">
        <div class="icon_img" ><img src="images/home/top-2019-7.png" /></div>
        <div class="icon_label" >Join a Game</div>
      </a>
    </div>
    <div class="icon_tab" >
      <a class="disabled">
        <div class="icon_img" >
          <img src="images/home/top-2019-9.png" />
        </div>
        <div class="icon_label" >Explore Packages</div>
      </a>
    </div>
  </div>
     </div>
    </div>

   </div>

  </div>
 </div>
</div>

</section>

<section class="more-football-sectoin-2019" style="padding-top: 20" >
	<div class="container" >
		<div class="row" >

			<div class="col-md-4 col-sm-12 col-xs-12 football_content" >
				<div class="more_football_title_2019" >More Football. More Fun</div>
				<div class="more_football_description_2019" >Ghost Football makes life easier.</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12 football_tab" >
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
           <li class="disabled">
            <a data-toggle="tab" href="#individuals-join-web" class="disabled" ><img src="images/home/top-2019-1.png" /></a>
          </li>
          <li  class="disabled"  >
            <a data-toggle="tab" href="#individuals-subscription-web" class="disabled"><img src="images/home/top-2019-2.png" /></a>
          </li>
          <li  class="active"  >
            <a data-toggle="tab" href="#individuals-book-web"><img src="images/home/top-2019-3.png" /></a>
          </li>
          <li  class="disabled"  >
            <a data-toggle="tab" href="#individuals-setup-web" class="disabled"><img src="images/home/top-2019-4.png" /></a>
          </li>
          <li  class="martop5 disabled"  >
            <a data-toggle="tab" href="#teams-friendly-web" class="disabled"><img src="images/home/top-2019-5.png" /></a>
          </li>
          <li  class="disabled"  >
            <a data-toggle="tab" href="#teams-league-web" class="disabled"><img src="images/home/top-2019-6.png" /></a>
          </li>
          <li  class="martop5 disabled"  >
            <a data-toggle="tab" href="#juniors-join-web" class="disabled"><img src="images/home/top-2019-7.png" /></a>
          </li>
          <li  class="disabled"  >
            <a data-toggle="tab" href="#juniors-packages-web" class="disabled"><img src="images/home/top-2019-9.png" /></a>
          </li>
        </ul>
        <div class="tab-content">

          <div id="individuals-join-web" class="tab-pane fade">
            <div class="pane_content" >
             <div class="pane_content_left" >&nbsp;</div>
             <div class="pane_content_right" style="background-image: url();">
              <div class="pane_content_header" ><span>INDIVIDUALS</span><br />Join a Game</div>
              <div class="pane_content_footer" >
               <div class="pane_content_footer_title" >Itching to play?</div>
               <div class="pane_content_footer_desc" >Alone or a small group of friends? Keen to play? Its simple. Choose from any number of friendly games happening all over Singapore. Book your slot(s). Turn up. Play!</div>
             </div>
           </div>
         </div>
       </div>
       <div id="individuals-subscription-web" class="tab-pane fade ">
        <div class="pane_content" >
         <div class="pane_content_left" >&nbsp;</div>
         <div class="pane_content_right" style="background-image: url();">
          <div class="pane_content_header" ><span>INDIVIDUALS</span><br />Explore Subscriptions</div>
          <div class="pane_content_footer" >
           <div class="pane_content_footer_title" >Want to Save Big?</div>
           <div class="pane_content_footer_desc" >Play regularly? Its simple.  Pick a plan. Subscribe. Save.</div>
         </div>
       </div>
     </div>
   </div>
   <div id="individuals-book-web" class="tab-pane fade in active ">
    <div class="pane_content" >
     <div class="pane_content_left" >&nbsp;</div>
     <div class="pane_content_right" style="background-image: url(images/home/individuals-book.jpg);">
      <div class="pane_content_header" ><span>INDIVIDUALS</span><br />Book a Pitch</div>
      <div class="pane_content_footer" >
       <div class="pane_content_footer_title" >Tired of calling around?</div>
       <div class="pane_content_footer_desc" >Just need a field, plan and simple? Now you can book online with Ghost Football.</div>
     </div>
   </div>
 </div>
</div>
<div id="individuals-setup-web" class="tab-pane fade ">
  <div class="pane_content" >
   <div class="pane_content_left" >&nbsp;</div>
   <div class="pane_content_right" style="background-image: url();">
    <div class="pane_content_header" ><span>INDIVIDUALS</span><br />Set up your Game</div>
    <div class="pane_content_footer" >
     <div class="pane_content_footer_title" >Organizing giving you headaches?</div>
     <div class="pane_content_footer_desc" >Tired of chasing your players, booking a pitch, collecting cash? Set up your game on Ghost Football. We do it all. Just show up and host. Short of players? We can top up too.</div>
   </div>
 </div>
</div>
</div>
<div id="teams-friendly-web" class="tab-pane fade ">
  <div class="pane_content" >
   <div class="pane_content_left" >&nbsp;</div>
   <div class="pane_content_right" style="background-image: url();">
    <div class="pane_content_header" ><span>TEAMS</span><br />Book a Friendly</div>
    <div class="pane_content_footer" >
     <div class="pane_content_footer_title" >Ready to clash?</div>
     <div class="pane_content_footer_desc" >Already got an 11-a-side team? Just need a compatible opponent, pitch, and referee? Get it all with one click.</div>
   </div>
 </div>
</div>
</div>
<div id="teams-league-web" class="tab-pane fade ">
  <div class="pane_content" >
   <div class="pane_content_left" >&nbsp;</div>
   <div class="pane_content_right" style="background-image: url();">
    <div class="pane_content_header" ><span>TEAMS</span><br />Join a League</div>
    <div class="pane_content_footer" >
     <div class="pane_content_footer_title" >Got your eye on the Trophy?</div>
     <div class="pane_content_footer_desc" >Looking for some serious competition?  Gather your teammates and join one of our leagues!</div>
   </div>
 </div>
</div>
</div>
<div id="juniors-join-web" class="tab-pane fade ">
  <div class="pane_content" >
   <div class="pane_content_left" >&nbsp;</div>
   <div class="pane_content_right" style="background-image: url();">
    <div class="pane_content_header" ><span>JUNIORS (9-16 YEARS)</span><br />Join a Game</div>
    <div class="pane_content_footer" >
     <div class="pane_content_footer_title" >SOMETIMES A KID JUST WANTS TO PLAY</div>
     <div class="pane_content_footer_desc" >Kids from 9 - 16 can choose from games happening all over Singapore, book one or more slot(s), and just jump in!</div>
   </div>
 </div>
</div>
</div>
<div id="juniors-packages-web" class="tab-pane fade ">
  <div class="pane_content" >
   <div class="pane_content_left" >&nbsp;</div>
   <div class="pane_content_right" style="background-image: url();">
    <div class="pane_content_header" ><span>JUNIORS (9-16 YEARS)</span><br />Explore Packages</div>
    <div class="pane_content_footer" >
     <div class="pane_content_footer_title" >SINGAPORE'S BEST VALUE FOOTBALL PACKAGES!</div>
     <div class="pane_content_footer_desc" >Traditional academies are great, but can be costly and rigid. Sometimes a kid just wants to PLAY. No coaches here! Just gently facilitated games. And tremendous value. Enjoy a 3-month package, with 12 sessions, at just $120 (usual $160)!</div>
   </div>
 </div>
</div>
</div>

</div>
</div>
</div>

</div>
</div>
</section>


<section class="promo-section" >
	<div class="container" >
		<div class="row" >

			<div class="col-md-12 col-sm-12 col-xs-12 promo_title" >Venues To Play Football</div>

			<div class="col-md-12 col-sm-12 col-xs-12 promo_desc" >

				<div class="owl-carousel" id="promo_owl" >
          <?php
          $query   = " SELECT * FROM pitch ";
          $result  = mysqli_query($conn,$query);
          while ($row=mysqli_fetch_assoc($result)) {
            echo "<div class='promo_item' >
            <a href='pitch.php?pitch_id={$row['pitch_id']}' >
            <div class='image_section' >";
            echo "<img src='images/blank.png' style='background-image:url(../admin/upload/{$row['pitch_image']});' />"; 
            echo "</div>
            <div class='desc_section' >
            <div class='promo_desc_title' >{$row['pitch_name']}</div>
            <div class='promo_description' >{$row['description']}</div>
            </div>
            <div class='button_section'>
            <button class='button_orange' >See More!</button>
            </div>
            </a>
            </div>";     
          }
          ?>

        </div>

      </div>

    </div>
  </div>
</section>

<section class="testi-section" >
	<div class="container" >
		<div class="row" >

			<div class="col-md-12 col-sm-12 col-xs-12 teti_title" >football Legends</div>

			<div class="col-md-12 col-sm-12 col-xs-12 teti_desc" >

				<div class="owl-carousel" id="testi_owl" >

          <div class="testi_item" >
            <div class="testi_img" ><img src="images/blank.png" style="background-image:url(images/messi.png);"></div>
            <div class="player_name" >Lionel Messi</div>
            <div class="player_game" >Argentian</div>
            <div class="player_desc" >“The only thing that matters is playing. I have enjoyed it since I was a little boy, and I still try to do that every time I go out on to a pitch. I always say that when I no longer enjoy it or it’s no longer fun to do it, then I won’t do it anymore. I do it because I love it and that’s all I care about.”</div>
          </div>
          
					
					<div class="testi_item" >
						<div class="testi_img" ><img src="images/blank.png" style="background-image:url(images/ronaldo.png);"></div>
						<div class="player_name" >Cristiano Ronaldo</div>
            <div class="player_game" >Portuguese</div>
            <div class="player_desc" >“I am not a perfectionist, but I like to feel that things are done well. More important than that, I feel an endless need to learn, to improve, to evolve, not only to please the coach and the fans, but also to feel satisfied with myself. It is my conviction that here are no limits to learning, and that it can never stop, no matter what our age.”</div>
          </div>


          <div class="testi_item" >
            <div class="testi_img" ><img src="images/blank.png" style="background-image:url(images/ronaldo99.png);"></div>
            <div class="player_name" >Ronaldo Phenomenon </div>
            <div class="player_game" >Brazilian</div>
            <div class="player_desc" >“Football is great because you always have another opportunity to change history, my life has always been a series of challenges and I'm psychologically-prepared but this is the biggest challenge of my life.”</div>
          </div>


          <div class="testi_item" >
            <div class="testi_img" ><img src="images/blank.png" style="background-image:url(images/ronaldinho.PNG);"></div>
            <div class="player_name" >Ronaldinho</div>
            <div class="player_game" >Brazilian</div>
            <div class="player_desc" >“My game is based on improvisation. Often, a forward does not have the time to think too much. You have a second, rarely more, to decide whether to dribble, shoot or pass to the right or left. It is instinct that gives the orders.”</div>
          </div>

          <div class="testi_item" >
            <div class="testi_img" ><img src="images/blank.png" style="background-image:url(images/zlatan.png);"></div>
            <div class="player_name" >Zlatan Ibrahimovic</div>
            <div class="player_game" >Swedish</div>
            <div class="player_desc" >“Anything that happens in your life was meant to happen. It is your destiny. It was my destiny to have the life I have now, and I can’t have any regrets.”</div>
          </div>


        </div>

      </div>

    </div>
  </div>
</section>


<section class="home_app_section" id="app_section">
  <div class="layer_bg">
    <div class="container">
      <div class="row">
        <div class="on_demand_description">
          <div class="ondemand_hello">The Ghost Football is simply dummy text.</div>
          <div class="on_demand_what">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include('includes/public_footer.php')
?>