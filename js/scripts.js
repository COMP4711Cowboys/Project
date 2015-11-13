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

    //bar chart
    if (jQuery(".custom-custom-bar-chart")) {
        jQuery(".bar").each(function () {
            var i = jQuery(this).find(".value").html();
            jQuery(this).find(".value").html("");
            jQuery(this).find(".value").animate({
                height: i
            }, 2000);
        });
    }

}

jQuery(document).ready(function(){
    initializeJS();
    
    
    //Bootstrap switch functions, this makes my layout and edit mode 
    //selection look so snazzy
    // --Devan
    $('input[name="edit-switch"]').bootstrapSwitch();
    $('input[name="layout-switch"]').bootstrapSwitch();

    
    var mode = $.cookie("edit-mode");

    //if the cookie is not set (bad news!) or off, we set it to off
    if (mode == null || mode == "OFF") {
        $('#edit-switch').bootstrapSwitch("state",false,true);
        $.cookie("edit-mode", "OFF");
    }else {
        $('#edit-switch').bootstrapSwitch("state",true,true);
        $.cookie("edit-mode", "ON");
    }
    
    mode = $.cookie("layout-mode");

    //if the cookie doesn't exist (oh noes!) or is set to table, set the
    //switch to off (which is the table value)
    if (mode == null || mode == "TABLE") {
        $('#layout-switch').bootstrapSwitch("state",false,true);
        $.cookie("layout-mode", "TABLE");
    } else {
        $('#layout-switch').bootstrapSwitch("state",true,true);
        $.cookie("layout-mode", "GALLERY");
    }
    
    //the following methods are called when the swich is changed
    //going to use this to send a message to update the tables
    $('input[name="edit-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //change the cookie value depending on the state
        var mode = state ? "ON" : "OFF";
        $.cookie("edit-mode", mode);
        
        //if we're on the roster page, we should refresh the page
        //but give it some time to complete the animation
        setTimeout(function(){ location.reload(true);}, 1000);
        
    });

    $('input[name="layout-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
        //change the cookie value depending on the state
        var mode = state ? "GALLERY" : "TABLE";
        $.cookie("layout-mode", mode);
        
        //if we're on the roster page, we should refresh the page
        //but give it some time to look all cool and slidy
        setTimeout(function(){ location.reload(true);}, 1000);
    });
});


