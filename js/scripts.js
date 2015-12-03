function initializeJS() {

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    //custom scrollbar
        //for html
    jQuery("html").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    jQuery(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
    
    //sidebar dropdown menu
    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));        
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');            
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');            
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if(diff>0)
            jQuery("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            jQuery("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

    // sidebar menu toggle
    jQuery(function() {
        function responsiveView() {
            var wSize = jQuery(window).width();
            if (wSize <= 768) {
                jQuery('#container').addClass('sidebar-close');
                jQuery('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                jQuery('#container').removeClass('sidebar-close');
                jQuery('#sidebar > ul').show();
            }
        }
        jQuery(window).on('load', responsiveView);
        jQuery(window).on('resize', responsiveView);
    });

    jQuery('.toggle-nav').click(function () {
        if (jQuery('#sidebar > ul').is(":visible") === true) {
            jQuery('#main-content').css({
                'margin-left': '0px'
            });
            jQuery('#sidebar').css({
                'margin-left': '-180px'
            });
            jQuery('#sidebar > ul').hide();
            jQuery("#container").addClass("sidebar-closed");
        } else {
            jQuery('#main-content').css({
                'margin-left': '180px'
            });
            jQuery('#sidebar > ul').show();
            jQuery('#sidebar').css({
                'margin-left': '0'
            });
            jQuery("#container").removeClass("sidebar-closed");
        }
    });

}

jQuery(document).ready(function(){
    initializeJS();
    
    //Check which league order option was selected
    //Set select option value for league order
    var league_order = $.cookie("league_order");
    
    if(league_order == "league"){
        $('#league-option').attr("selected",true);
    } else if(league_order == "conference"){
        $('#conference-option').attr("selected",true);
    } else if(league_order == "division"){
        $('#division-option').attr("selected",true);
    }
    
    //Set select option value for league order
    var league_sub_order = $.cookie("league_sub_order");
    
    if(league_sub_order == "city"){
        $('#city-option').attr("selected",true);
    } else if(league_sub_order == "team"){
        $('#team-option').attr("selected",true);
    } else if(league_sub_order == "standing"){
        $('#standing-option').attr("selected",true);
    }
    
    //Check how the roster is being ordered by
    //denote to user how it is being ordered.
    var order = $.cookie("roster_order");

    if (order == null || order == "jersey"){
        $("#jersey-btn").addClass("active");
    } else if (order == "surname") {
        $("#surname-btn").addClass("active");
    } else {
        $("#lastname-btn").addClass("active");
    }
    
    //Bootstrap switch functions, this makes my layout and edit mode 
    //selection look so snazzy
    // --Devan
    $('input[name="edit_switch"]').bootstrapSwitch();
    $('input[name="layout_switch"]').bootstrapSwitch();

    
    var mode = $.cookie("edit_mode");

    //if the cookie is not set (bad news!) or off, we set it to off
    if (mode == null || mode == "off") {
        $('input[name="edit_switch"]').bootstrapSwitch("state",false, true);
        $.cookie("edit_mode", "off", { path : '/' });
        $('#player_add_button').hide();
    }else {
        $('input[name="edit_switch"]').bootstrapSwitch("state",true, true);
        $.cookie("edit_mode", "on", { path : '/' });
        $('#player_add_button').show();
    }
    


    mode = $.cookie("layout_mode");

    //if the cookie doesn't exist (oh noes!) or is set to table, set the
    //switch to off (which is the table value)
    if (mode == null || mode == "table") {
        $('input[name="layout_switch"]').bootstrapSwitch("state",false,true);
        $.cookie("layout_mode", "table", { path : '/' });
    } else {
        $('input[name="layout_switch"]').bootstrapSwitch("state",true,true);
        $.cookie("layout_mode", "gallery", { path : '/' });
    }
    

    //the following methods are called when the swich is changed
    //going to use this to send a message to update the tables
    $('input[name="edit_switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //change the cookie value depending on the state
        var mode = state ? "on" : "off";

        $.cookie("edit_mode", mode, { path : '/' });
        
        //if we're on the roster page, we should refresh the page
        //but give it some time to complete the animation
        setTimeout(function(){ location.reload(true);}, 1000);
        
    });

    $('input[name="layout_switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //change the cookie value depending on the state
        var mode = state ? "gallery" : "table";
        $.cookie("layout_mode", mode, { path : '/' });
        
        //if we're on the roster page, we should refresh the page
        //but give it some time to look all cool and slidy
        setTimeout(function(){ location.reload(true);}, 1000);
    });

    //on prediction form submit, get html prediction result and append to div
    $("#prediction_submit").click(function () {
        $.ajax({
            type: 'ajax',
            url: '/prediction/predict/' + $("#opposition").val(),
            success: function(result){
                console.log($("#opposition").val());
                $("#prediction_result").html(result);
                
                //need to resize our scrollbars so we can use the scrollbar
                $("html").getNiceScroll().resize();
                $(".scroll-panel").getNiceScroll().resize();
                $("#main-content").resize();
                $("html").resize();
                $(".scroll-panel").resize();
            }
        });
    });
    
    $("#update_prediction_data").click(function () {
        $.ajax({
            type: 'ajax',
            url: '/scores/',
            success: function(result){
                $('#updateModal').modal('show'); 
            }
        });
    });
    
    $("#clear_prediction_data").click(function () {
        $.ajax({
            type: 'ajax',
            url: '/scores/clear_prediction_data',
            success: function(result){
                $('#resetModal').modal('show'); 
            }
        });
    });
    

});


