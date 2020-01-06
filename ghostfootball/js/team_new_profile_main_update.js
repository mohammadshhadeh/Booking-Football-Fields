$(document).ready(function(){
/* Uploading Profile  Image */
  $('body').on('change','#profilephotoimg', function()
  {
    //alert('hello!');
    $("#bgimageform").submit();
  });
});

$("#bgimageform").submit(function() {
    var formData = new FormData();
    formData.append('file', $('#profilephotoimg')[0].files[0]);

  var f=$('#profilephotoimg')[0].files[0];
  if(f.size > 1024000*4){
  //if(0){
    alert('Please upload maximum 4MB file.');
  }else{

    //  remove crop for mobile - allow crop for now //
    // if((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
    //   $('#is_mobile').val(0);
    // }else if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
    //   if($( window ).width() <= 767){
    //     $('#is_mobile').val(0);
    //   }
    // }


    $("#cropping_img").attr("src", '');
    formData.append('is_mobile', $('#is_mobile').val());

    $.ajax({
      url: "/background_face/team_profile_image_upload.php",
      async: false,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(status) {
        var err = status.split('::');
        if(err[0] == 'Error '){
          alert(status);
        }else{
          //alert(status);
          //$('#timelineBackground').empty();
          //$('#timelineBackground').append(status);

          //$('#timelineBackground').load(document.URL +  ' #timelineBackground');
          //var data = $('#timelineBackground img').attr('src');

          //$("#profile_thumb").attr("style",  "background-image:url("+status+")");

          $("#cropping_img").attr("src", '');
          $("#cropping_img").attr("src", 'images/team_logo/'+status);

        //   $('#bckgrd').empty();
        //   $('#bckgrd').append(status);

          /*$('#profile_thumb').load(document.URL +  ' #profile_thumb');
          $('#cropping_img').load(document.URL +  ' #cropping_img');*/

          $('#is_mobile').val(0);
          //$("#cropping_img").attr("src", data);

          //$("#cropping_click").click();

          //  remove crop for mobile - allow crop for now //
          // if( !(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
          //   if($( window ).width() > 300){

              var inst = $('[data-remodal-id=cropping_form]').remodal();
              inst.open();

              //$("#cropping_img").removeClass('cropper-hidden');

              //$('#cropping_img').cropper('reset');

          //   }
          // }
        }
      }
    });
  }
    return false;
});

$(document).ready(function()
{
/* Uploading Profile  Image */
$('body').on('change','#backphotoimg', function()
{
    //alert('going to submit background');
$("#bgImageform2").submit();
});
});

$("#bgImageform2").submit(function(){
    var formData2 = new FormData();
    formData2.append('file', $('#backphotoimg')[0].files[0]);

    $.ajax({
        url:"/background_face/background_image_upload.php",
        async:false,
        type: "POST",
        data: formData2,
        contentType: false,
        processData: false,
        success: function(status){
            //alert(status);
            $('#bckgrd').empty();
            $('#bckgrd').append(status);
        }
        });
        //alert('background submit');
        return false;
});

/* Banner position drag */
$('body').on('mouseover','.movingface',function ()
{
  /*var y1 = $('#timelineBackground').height();
  var y2 =  $('.movingface').height();
  var x1 = $('#timelineBackground').width();
  var x2 =$('.movingface').width();
  $(this).draggable({
  drag: function(event, ui) {
     console.log(ui.position.left);
  if(ui.position.left >= -1 ){
    ui.position.left =-1
  }else if(ui.position.left <= x1 - x2)
  {
    ui.position.left = x1 - x2;
  }


  if(ui.position.top >= 0)
  {
    ui.position.top = 0;
  }
  else if(ui.position.top <= y1 - y2)
  {
    ui.position.top = y1 - y2;
  }
  },
    stop: function(event, ui)
  {
  }
  });*/
});

//<div id="uX" class="bgSave wallbutton blackButton">Save Cover</div><img src=coverUploads/1481187619.jpg id="timelineBGload" class= "headerimage ui-corner-all" style="top:0px"/>
// $(document).ready(function(){
//     var formData = $("#bgimageform").serialize();
//     $('body').on('change','#bgphotoimg', function(){
//     alert("open");
//     $("#bgimageform").ajaxForm({data:formData ,target: '#timelineBackground',
//         type: "POST", success:function(){alert('SUCCESS')}}).submit();
//     });
// });


// function press(){
//     var x = document.getElementById("face_pic");
//     if ('files' in x) {
//         var face = x.files[0].name;
//     }

//         alert("face:" + face);
//          $.ajax({ url: "/background_face/background_image_upload.php",type:"POST",
//          data:{picture : face}
//          }).done( function( result ) { alert( result ); });
//         alert('button pressed!');

//     //$('#backgroundPic').attr('style', 'background-image:url(images/be-endorsed-girl.png)');
//     //document.getElementById("backgroundPic").className = "headerimage ui-corner-all ui-draggable";
//     //$('#backgroundPic').attr('class', 'headerimage ui-corner-all ui-draggable');
//     //$('#backgroundPic').attr('style', 'top:0px');
// }

// function pressSubmit(){
//     alert('submit pressed!');
//     $('#backgroundPic').attr('style', 'background-image:url(images/top-profile-thumb.jpg');
// }

$(document).ready(function() {

  var $image = $('#cropping_img');
  var $button = $('#crop_button');
  var $result = $('#result');
  var croppable = true;

  $('#cropping_form').on('shown', function() {
      $image.cropper({
        aspectRatio: 1,
        viewMode: 1,
        built: function () {
          croppable = true;
          //$(this).cropper('reset');
        }
      });
  });

  $button.on('click', function () {

    var croppedCanvas;
    var roundedCanvas;
    var $image = $('#cropping_img');

    if (!croppable) {
      return;
    }

    // Crop
    croppedCanvas = $image.cropper('getCroppedCanvas');

    var Furl = 'newimg='+croppedCanvas.toDataURL();

    $.ajax({
        url: '/save-file-crop-file-team-new.php',
        type: 'POST',
        data: Furl,
        async: false,
        success: function (data){

            /*$("#hprofile_img").val(data);*/

            //$("#profile_thumb").hide();
            //$("#profile_thumb").attr("src", data);
            $("#cropping_img").attr("src", '');

            //$("#profile_thumb").show();

            $("#camera_icon").attr("src", 'images/team_logo/'+data);
            $("#team_logo").val(data);


            var inst = $('[data-remodal-id=cropping_form]').remodal();
            inst.close();
        }
    });


  });

});

/*$(function() {
    $( "#team_banner_link_click" ).on( "click", function() {
        $("#profilephotoimg").click();
    });
});*/
function click_file(){
    $("#profilephotoimg").click();
}

$(document).ready(function() {
    $('#cropping_form').on('shown', function() {
        Cropping_fun();
    })
});

$(document).on('opened', '.remodal', function () {
  if(!$(this).hasClass('remodal_teams')){
    //console.log('Modal is opening');
    var $image = $('#cropping_img');
    var $button = $('#crop_button');
    var $result = $('#result');
    //var croppable = false;

    $image.cropper({
        aspectRatio: 1,
        autoCropArea: 0.20,
        minCropBoxWidth: 215,
        minCropBoxHeight: 215,
        viewMode: 1,
        cropBoxMovable: true,
        cropBoxResizable: false,
        built: function () {
          croppable = true;
        },
    });
  }
});

$(document).on('closed', '.remodal', function () {
  if(!$(this).hasClass('remodal_teams')){
    //window.location.reload();
      $("#cropping_img").attr("src", '');
      var $image = $('#cropping_img');
      $image.cropper('destroy');
  }
});

$(document).on('click', '#close_button', function () {
    var inst = $('[data-remodal-id=cropping_form]').remodal();
    inst.close();
});
