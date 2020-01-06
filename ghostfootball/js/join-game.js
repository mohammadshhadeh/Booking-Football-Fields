function deposit_form(amount, type) {
    $('#deposit_amount').val(amount);
    $('#deposit_reason').val(type);
    $('#paypal_payment').trigger('submit');
}

function reject_join_cause_rsvp() {
    //362 
    show_popups(362)  
    //alert('You need to clear your RSVP payment first!');
}

function pre_join_check(game_id, response_team) {
    // Check if need to rate previous game (applicable for joining only) //

    $.ajax({
        url: global_site_url+"scripts/check_prev_game_rate.php",
        type: "POST",
        data: "",
        dataType: "json",
        success: function (status) {
            if (status == 'login') {
                show_popups(19,'',callback_redirect_urls,"#login_up");
            }

            else if (status == 'otp') {
                 show_popups(47,'',callback_show_popup,{ask_otp:'.popup_otp'});
            }

            else if (status == 'rate') {
                $('.ratepopupmain').fadeIn();
                $('.popupMain_preferred_position').fadeOut();

            } 

            else if (response_team == 1) {
                process_join_free();
            } // FORCE GAME RATE POPUP

            else {
                
                process_join(); // Allow to join
            } // End allow join game // 
        }
    });  // End CHECK PREV GAME AJAX //

    // End Check if need to rate previous game (applicable for joining only) //
}

function process_join() {
    // START JOIN GAME AJAX //
    // var purpose = parseInt($('#purpose').val());
    // var any = parseInt($('#Any_value').val()); 
    // var gk = parseInt($('#Goalkeeper_value').val()); 
    // var def = parseInt($('#Defender_value').val()); 
    // var mid = parseInt($('#Midfielder_value').val()); 
    // var fw = parseInt($('#Forward_value').val()); 
    // var total = any + gk + def + mid + fw;
    // var join_num = parseInt($('#join_num').val());
    // var add_remove = parseInt($('#add_remove').val());

    $.ajax({
        url: global_site_url+"scripts/user_join_status.php",
        type: "POST",
        data: formData, 
        dataType: "json",
        success: function (status) {

            show_popup_again(status);
            //remaim

            /*if (status['deposit'] == 'deposit') {

                var r = confirm('You need to top up your account balance to join this game. Would you like to do so?');
                if (r == true) {
                     // if (status['user_currency']=='MYR') { 
                     //    window.location.assign('topup');           
                     // }
                    //else {
                    $('.popupMain_preferred_position').fadeOut();

                    $("#topup_amt_list").empty();
                    var amt = [10, 20, 30, 50, 100, 200, 300, 500];
                    var amt_needed = status['amount_needed'].toFixed(2);
                    var created_id = status['created_id'];

                    $("#topup_amt_list").append("<li ><a href='javascript:;' style='color:#ed1a3b; ' >" + status['currency_sign'] + "" + amt_needed + " (exact)</a><input type='number' step='0.01' value='" + amt_needed + "'></li>");
                    var counter = 0;
                    var num = 2;
                    while (counter <= 6) {
                        if (num > 6) {
                            break;
                        }
                        if (amt[counter] > amt_needed) {
                            $("#topup_amt_list").append("<li><a href='javascript:;' >" + status['currency_sign'] + "" + amt[counter] + "</a><input type='number' step='0.01' value='" + amt[counter] + "'></li>");
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
            }


            else if (status['enough'] == 'enough') {

                var r = confirm(status['currency_sign'] + Number(status['deposit_amount']).toFixed(2) + ' will be deducted to join this game. Are you sure you want to join this game? ');
                if (r == true) {
                    $.post('/scripts/insert_join_details.php', function (data) {
                        alert(data);
                        location.reload();
                    });
                }
            } else if (status['remove'] == 'remove') {

                if (status['num'] <= 1) {
                    var r = confirm('Are you sure you want to remove ' + parseInt(status['num'], 10) + ' player from this game?');
                }
                else {
                    var r = confirm('Are you sure you want to remove ' + parseInt(status['num'], 10) + ' players from this game?');
                }

                if (r == true) {
                    $.post('/scripts/remove_player.php', {remove_num: status['num'], created_id: status['created_id'], player_status: status['join_status'], pos_remove: status['pos_remove'], purpose: status['purpose']}, function (data) {
                        alert(data);
                        window.location.assign('');
                    });
                }
            
            } else if (status == 'no team') {
                alert('You need to create a team first before joining a team game');
                window.location.assign('team-profile#manage_teams_popup');
            } else{ 
                alert(status);
            }*/
        }

    }); // END AJAX (user_join_status) // 

}

function process_join_free() {
    // START JOIN GAME AJAX //
    // var purpose = parseInt($('#purpose').val());
    // var any = parseInt($('#Any_value').val()); 
    // var gk = parseInt($('#Goalkeeper_value').val()); 
    // var def = parseInt($('#Defender_value').val()); 
    // var mid = parseInt($('#Midfielder_value').val()); 
    // var fw = parseInt($('#Forward_value').val()); 
    // var total = any + gk + def + mid + fw;
    var join_num = parseInt($('#join_num').val());
    var add_remove = parseInt($('#add_remove').val());
    var response_team = parseInt($('#response_team').val());
    var response_pa = parseInt($('#response_pa').val());
    var vars = { 'join_num_dynamic': join_num }

    if (add_remove == 1) {
        // response team //
        if (response_team == 1) {

            //523
          /*  if (join_num == 1) {
                var r = confirm('You need to be a responsible student to enjoy this game for free, or you will loss this privilege. Being responsible means be present for the game and enjoying the game in a friendly and safe manner. Are you sure you want to join this game for 1 player? ');
            }
            else if (join_num > 1) {
                var r = confirm('You need to be a responsible student to enjoy this game for free, or you will loss this privilege. Being responsible means be present for the game and enjoying the game in a friendly and safe manner. Are you sure you want to join this game for ' + join_num + ' players? ');
            }*/
            
            show_popups(523,vars,join_callback_join_free_game_ok,formData);


        } else if (response_pa == 1) {

            /*if (join_num == 1) {
                var r = confirm('You need to be a pa member to enjoy this game for free, or you will loss this privilege. Being responsible means be present for the game and enjoying the game in a friendly and safe manner. Are you sure you want to join this game for 1 player? ');
            }
//                                            Andre Rexdian Archie
            else if (join_num > 1) {
                var r = confirm('You need to be a pa member to enjoy this game for free, or you will loss this privilege. Being responsible means be present for the game and enjoying the game in a friendly and safe manner. Are you sure you want to join this game for ' + join_num + ' players? ');
            }*/
            show_popups(530,vars,join_callback_join_free_game_ok,formData);

        }
        // friend join free
        else {

           /* if (join_num == 1) {
                var r = confirm('Are you sure you want to join this game for 1 player? ');
            }
            else if (join_num > 1) {
                var r = confirm('Are you sure you want to join this game for ' + join_num + ' players? ');
            }*/
           
            show_popups(537,vars,join_callback_join_free_game_ok,formData);

        }


       /* if (r == true) {
            $.post('/scripts/insert_join_free.php', formData, function (data) {
                if (data.substr(0, 5) == 'valid') {
                    var join_num = data.split(" ");
                    alert("Game joined for " + join_num[1] + " player(s). Have a great game!");
                    //$('.popupMain_join_free').fadeOut();
                    window.location.assign('');
                }
                else {
                    alert(data);
                }
            });
        }*/

    }

    else if (add_remove == 2) {

       /* if (join_num == 1) {
            var r = confirm('Are you sure you want to remove 1 player from this game?');
        }
        else {
            var r = confirm('Are you sure you want to remove ' + join_num + ' players from this game?');
        }*/
            show_popups(453,vars,join_callback_remove_free_game_ok,formData);

        /*if (r == true) {
            $.post('/scripts/remove_player_free.php', formData, function (data) {
                alert(data);
                window.location.assign('');
            });
        }*/
    }

    else{
        show_popups(502);
        /*alert('Something is stopping you from proceeding. Please contact us at 97269110 or <?=$CONTACT_EMAIL?> for help.');*/
    }

}

jQuery(document).ready(function () {

    $("#join_shortcut_1").click(function () {
        $("#team_assign").val("1");
        $(".ed_join_num_form").trigger('submit');
        return false;
    });


    $("#join_shortcut_2").click(function () {
        $("#team_assign").val("2");
        $(".ed_join_num_form").trigger('submit');
        return false;
    });

    $("#open_pos_btn").click(function () {

        var purpose = parseInt($('#purpose').val());
        // var any = parseInt($('#Any_value').val()); 
        // var gk = parseInt($('#Goalkeeper_value').val()); 
        // var def = parseInt($('#Defender_value').val()); 
        // var mid = parseInt($('#Midfielder_value').val()); 
        // var fw = parseInt($('#Forward_value').val()); 
        // var total = any + gk + def + mid + fw;
        // var join_num = parseInt($('#join_num').val());
        var add_remove = parseInt($('#add_remove').val());
        if (purpose == 1 && add_remove != 2) {
            $('.popupMain_preferred_position').fadeIn();
        }
        else if (purpose == 1 && add_remove == 2) {
            $('.popupMain_remove_position').fadeIn();
        }

        return false;
    });

    $(".ed_join_num_form").submit(function () {
        //Leo
        $("input[type=submit]",this).attr('disabled','disabled');

        formData = $(this).serialize();
        var in_game = parseInt($('#in_game').val());
        var game_id = parseInt($('#event_id').val());
        var purpose = parseInt($('#purpose').val());
        var friend = parseInt($('#friend').val());
        var response_team = parseInt($('#response_team').val());
        var response_pa = parseInt($('#response_pa').val());
        var rsvped = parseInt($('#rsvped').val());
        var team_assign = $("#team_assign").val();
        console.log("team "+team_assign);

        // friend join for free 
        if (friend == 1) {
            process_join_free();
        }

        else if (response_team == 1 || response_pa == 1) {
            pre_join_check(game_id, 1);
        }

        else if (rsvped == 1) {
            reject_join_cause_rsvp();
        }


        // 11 a side team join or in game for individual
        else if (purpose == 2 || purpose == 3 || in_game == 0) {
            pre_join_check(game_id);
        }

        // allow to join, add or remove // 
        else if (in_game == 1) { //alert('joining 2'); 
            process_join();
        } // END allow join // 

        return false;

    }); /** END JOIN SUBMIT **/

    $(".gk_join").click(function () {

        var new_val = 1;
        $('#Goalkeeper').css('color', '#ed1a3b');
        $('#Goalkeeper').text('Goalkeeper x 1');
        $('#Goalkeeper_value').val(new_val);

        var new_val = 0;
        var max_val = parseInt($('#Any_max').val());
        $('#Any').css('color', '#94969a');
        $('#Any').text('Any (' + max_val + ')');
        $('#Any_value').val(new_val);

        var max_val = parseInt($('#Defender_max').val());
        $('#Defender').css('color', '#94969a');
        $('#Defender').text('Defender (' + max_val + ')');
        $('#Defender_value').val(new_val);

        var max_val = parseInt($('#Midfielder_max').val());
        $('#Midfielder').css('color', '#94969a');
        $('#Midfielder').text('Midfielder (' + max_val + ')');
        $('#Midfielder_value').val(new_val);

        var max_val = parseInt($('#Forward_max').val());
        $('#Forward').css('color', '#94969a');
        $('#Forward').text('Forward (' + max_val + ')');
        $('#Forward_value').val(new_val);

        //$("#Goalkeeper").trigger( "click" );
        $('.popupMain_preferred_position').fadeIn();

        var join_num = 1;
        $("#join_num").val(join_num);
        //$("#join_num").selectpicker("refresh");

        return false;

    }); // join for goalkeeper short cut

    $(".def_join").click(function () {

        var new_val = 1;
        $('#Defender').css('color', '#ed1a3b');
        $('#Defender').text('Defender x 1');
        $('#Defender_value').val(new_val);

        var new_val = 0;
        var max_val = parseInt($('#Any_max').val());
        $('#Any').css('color', '#94969a');
        $('#Any').text('Any (' + max_val + ')');
        $('#Any_value').val(new_val);

        var max_val = parseInt($('#Goalkeeper_max').val());
        $('#Goalkeeper').css('color', '#94969a');
        $('#Goalkeeper').text('Goalkeeper (' + max_val + ')');
        $('#Goalkeeper_value').val(new_val);

        var max_val = parseInt($('#Midfielder_max').val());
        $('#Midfielder').css('color', '#94969a');
        $('#Midfielder').text('Midfielder (' + max_val + ')');
        $('#Midfielder_value').val(new_val);

        var max_val = parseInt($('#Forward_max').val());
        $('#Forward').css('color', '#94969a');
        $('#Forward').text('Forward (' + max_val + ')');
        $('#Forward_value').val(new_val);

        $('.popupMain_preferred_position').fadeIn();

        var join_num = 1;
        $("#join_num").val(join_num);
        //$("#join_num").selectpicker("refresh");

        return false;

    }); // join for goalkeeper short cut


    $(".mid_join").click(function () {

        var new_val = 1;
        $('#Midfielder').css('color', '#ed1a3b');
        $('#Midfielder').text('Midfielder x 1');
        $('#Midfielder_value').val(new_val);

        var new_val = 0;
        var max_val = parseInt($('#Any_max').val());
        $('#Any').css('color', '#94969a');
        $('#Any').text('Any (' + max_val + ')');
        $('#Any_value').val(new_val);

        var max_val = parseInt($('#Goalkeeper_max').val());
        $('#Goalkeeper').css('color', '#94969a');
        $('#Goalkeeper').text('Goalkeeper (' + max_val + ')');
        $('#Goalkeeper_value').val(new_val);

        var max_val = parseInt($('#Defender_max').val());
        $('#Defender').css('color', '#94969a');
        $('#Defender').text('Defender (' + max_val + ')');
        $('#Defender_value').val(new_val);

        var max_val = parseInt($('#Forward_max').val());
        $('#Forward').css('color', '#94969a');
        $('#Forward').text('Forward (' + max_val + ')');
        $('#Forward_value').val(new_val);

        $('.popupMain_preferred_position').fadeIn();

        var join_num = 1;
        $("#join_num").val(join_num);
        //$("#join_num").selectpicker("refresh");

        return false;

    }); // join for goalkeeper short cut


    $(".fw_join").click(function () {


        var new_val = 1;
        $('#Forward').css('color', '#ed1a3b');
        $('#Forward').text('Forward x 1');
        $('#Forward_value').val(new_val);

        var new_val = 0;
        var max_val = parseInt($('#Any_max').val());
        $('#Any').css('color', '#94969a');
        $('#Any').text('Any (' + max_val + ')');
        $('#Any_value').val(new_val);

        var max_val = parseInt($('#Goalkeeper_max').val());
        $('#Goalkeeper').css('color', '#94969a');
        $('#Goalkeeper').text('Goalkeeper (' + max_val + ')');
        $('#Goalkeeper_value').val(new_val);

        var max_val = parseInt($('#Defender_max').val());
        $('#Defender').css('color', '#94969a');
        $('#Defender').text('Defender (' + max_val + ')');
        $('#Defender_value').val(new_val);

        var max_val = parseInt($('#Midfielder_max').val());
        $('#Midfielder').css('color', '#94969a');
        $('#Midfielder').text('Midfielder (' + max_val + ')');
        $('#Midfielder_value').val(new_val);

        $('.popupMain_preferred_position').fadeIn();

        var join_num = 1;
        $("#join_num").val(join_num);
        //$("#join_num").selectpicker("refresh");

        return false;

    }); // join for goalkeeper short cut


    $(".any_join").click(function () {

        var new_val = 1;
        $('#Any').css('color', '#ed1a3b');
        $('#Any').text('Any x 1');
        $('#Any_value').val(new_val);

        var new_val = 0;
        var max_val = parseInt($('#Goalkeeper_max').val());
        $('#Goalkeeper').css('color', '#94969a');
        $('#Goalkeeper').text('Goalkeeper (' + max_val + ')');
        $('#Goalkeeper_value').val(new_val);

        var max_val = parseInt($('#Defender_max').val());
        $('#Defender').css('color', '#94969a');
        $('#Defender').text('Defender (' + max_val + ')');
        $('#Defender_value').val(new_val);

        var max_val = parseInt($('#Midfielder_max').val());
        $('#Midfielder').css('color', '#94969a');
        $('#Midfielder').text('Midfielder (' + max_val + ')');
        $('#Midfielder_value').val(new_val);

        var max_val = parseInt($('#Forward_max').val());
        $('#Forward').css('color', '#94969a');
        $('#Forward').text('Forward (' + max_val + ')');
        $('#Forward_value').val(new_val);

        $('.popupMain_preferred_position').fadeIn();

        var join_num = 1;
        $("#join_num").val(join_num);
        //$("#join_num").selectpicker("refresh");

        return false;

    }); // join for goalkeeper short cut


}); /** END jquery document **/
