tj_callback_topup_now_ok = function(val){

   
	$('.popupMain_preferred_position').fadeOut();

        $("#topup_amt_list").empty();
        var amt = [10, 20, 30, 50, 100, 200, 300, 500];
        var amt_needed = parseFloat(val.amount_to_topup_for_rsvp).toFixed(2);
        $("#topup_amt_list").append("<li ><a href='javascript:;' style='color:#ed1a3b; ' >$" + amt_needed + " (exact)</a><input type='number' step='0.01' value='" + amt_needed + "'></li>");
        var counter = 0;
        var num = 2;
        while (counter <= 6) {
            if (num > 6) {
                break;
            }
            if (amt[counter] > amt_needed) {
                $("#topup_amt_list").append("<li><a href='javascript:;' >$" + amt[counter] + "</a><input type='number' step='0.01' value='" + amt[counter] + "'></li>");
                num++;
            }
            counter++;
        }
        $("#selected_amt").val(amt_needed);

        $('.popupMain_topup').fadeIn();

        $('#topup_amt_list li a').click(function () {
            $('#topup_amt_list li a').css('color', '#94969a');
            $(this).css('color', '#ed1a3b');
            var selected_amt = $(this).next("input").val();
            $("#selected_amt").val(selected_amt);

        });
}
tj_callback_join_ok = function(val){
      $.post(global_site_url+'scripts/insert_join_details_rsvp.php',{ 'created_id': val.created_id}, function (data) {
           
            data = JSON.parse(data);
            show_popup_again(data);
            /*alert(data);
            window.location.assign('');*/
        });
}

tj_callback_delete_game_ok = function(val){
     $.post(global_site_url+'scripts/delete_event.php',{'created_id':val.created_id}, function(data) {
            
            data = JSON.parse(data);
            show_popup_again(data);
            /*alert(data);
            window.location.replace('');*/
        });
}