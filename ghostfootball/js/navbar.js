
          $(document).ready(function() {

          var $divs = $(".slider_div").hide(),
          current = 0;

          $divs.eq(0).show();
          var imageUrl = $('#slider_0').attr('src');
          $('#video_bg').css('background-image', 'url(' + imageUrl + ')');

          function showNext() {
            if (current < $divs.length - 1) {
              $divs.eq(current).delay(4000).fadeOut('slow', function() {
                current++;
                imageUrl = $('#slider_'+current).attr('src');
                $('#video_bg').css('background-image', 'url(' + imageUrl + ')');
                $divs.eq(current).fadeIn('slow');
                showNext();
              });
            }else{
              $divs.eq(current).delay(4000).fadeOut('slow', function() {
                current = 0;
                imageUrl = $('#slider_'+current).attr('src');
                $('#video_bg').css('background-image', 'url(' + imageUrl + ')');
                $divs.eq(current).fadeIn('slow');
                showNext();
              });
            }
          }
          showNext();

        });

 /* Sticky menu start */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1){
            $('.topnav_stk').addClass("sticky");
        }else{
            $('.topnav_stk').removeClass("sticky");
        }
    });

    $( window ).resize(function() {
        if($(window).scrollTop() == 0){
            $('.topnav_stk').removeClass("sticky");
        }else{
            $('.topnav_stk').addClass("sticky");
        }
    });
    /* Sticky menu over */

  $('#testi_owl').owlCarousel({
    loop:true,
    margin:50,
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
      },
      680:{
        items:2,
        nav:false,
        dots:true
      },
      1000:{
        items:3,
        nav:false,
        dots:true,
        loop:false
      }
    }
  });

  $('#promo_owl').owlCarousel({
    loop:true,
    margin:25,
    responsiveClass:true,
    navText: ["<img src='https://strangersoccer.com//images/home/promo-prev.png'>", "<img src='images/home/promo-next.png'>"],
    responsive:{
      0:{
        items:1,
        stagePadding: 30,
        nav:false,
        loop:true,
        dots:false,
      },
      561:{
        items:2,
        stagePadding: 30,
        nav:false,
        loop:true,
        dots:false
      },
      1064:{
        items:3,
        nav:true,
        dots:false,
        loop:true
      }
    }
  });


  $(".show_demand").on("click", function(){
    var DmnClk = $(this).data('click');
    if( $( window ).width() <= 1030 ){
      $('.on_demand_tab_desc1').hide();
      $('.on_demand_tab_desc2').hide();
      $('.on_demand_tab_desc3').hide();
      $('.on_demand_tab_desc4').hide();

      $('.first_gradient').removeClass('active');
      $('.second_gradient').removeClass('active');
      $('.third_gradient').removeClass('active');
      $('.fourth_gradient').removeClass('active');

      $('.on_demand_tab_main .join_a_game').removeClass('active');
      $('.on_demand_tab_main .organize_a_game').removeClass('active');
      $('.on_demand_tab_main .find_an').removeClass('active');
      $('.on_demand_tab_main').find('.book_a_pitch').removeClass('active');

      $('.on_demand_tab_desc'+DmnClk).show();

      if(DmnClk == 1){
       $('.first_gradient').addClass('active');
       $('.on_demand_tab_main .join_a_game').addClass('active');
     }else if(DmnClk == 2){
       $('.second_gradient').addClass('active');
       $('.on_demand_tab_main .organize_a_game').addClass('active');
     }else if(DmnClk == 3){
       $('.third_gradient').addClass('active');
       $('.on_demand_tab_main .find_an').addClass('active');
     }else if(DmnClk == 4){
       $('.fourth_gradient').addClass('active');
       $('.on_demand_tab_main').find('.book_a_pitch').addClass('active');
     }

   }else{
    var DmnHref = $(this).data('href');
    window.location.href=DmnHref;
  }
});

  $( window ).resize(function() {
   var WinW = $( window ).width();
   if(WinW > 1030){
    $('.on_demand_tab_desc1').hide();
    $('.on_demand_tab_desc2').hide();
    $('.on_demand_tab_desc3').hide();
    $('.on_demand_tab_desc4').hide();

    $('.first_gradient').removeClass('active');
    $('.second_gradient').removeClass('active');
    $('.third_gradient').removeClass('active');
    $('.fourth_gradient').removeClass('active');

    $('.on_demand_tab_main .join_a_game').removeClass('active');
    $('.on_demand_tab_main .organize_a_game').removeClass('active');
    $('.on_demand_tab_main .find_an').removeClass('active');
    $('.on_demand_tab_main .book_a_pitch').removeClass('active');
  }else{

   $('.on_demand_tab_desc1').show();
   $('.on_demand_tab_main .first').click();
   $('.first_gradient').addClass('active');
   $('.on_demand_tab_main  .join_a_game').addClass('active');
 }
});

  var WinW = $( window ).width();
  if(WinW < 1030){
   $('.on_demand_tab_desc1').hide();
   $('.on_demand_tab_desc2').hide();
   $('.on_demand_tab_desc3').hide();
   $('.on_demand_tab_desc4').hide();

   $('.first_gradient').addClass('active');
   $('.on_demand_tab_main  .join_a_game').addClass('active');
   $('.on_demand_tab_desc1').show();
 }else{
   $('.on_demand_tab_desc1').hide();
   $('.on_demand_tab_desc2').hide();
   $('.on_demand_tab_desc3').hide();
   $('.on_demand_tab_desc4').hide();

   $('.first_gradient').removeClass('active');
   $('.on_demand_tab_main .join_a_game').removeClass('active');
 }
