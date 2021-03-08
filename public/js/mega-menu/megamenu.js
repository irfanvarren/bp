/*global $ */
$(document).ready(function () {
    "use strict";
    $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    //Checks if li has sub (ul) and adds class for toggle icon - just an UI

    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    $('.menu > ul > li > ul:not(:has(ul))').parent("li").css({'position' : 'relative'});
    //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

    //Adds menu-mobile class (for mobile toggle menu) before the normal menu
    //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
    //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
    //Done this way so it can be used with wordpress without any trouble

    $(".menu > ul > li").hover(
        function (e) {
            if ($(window).width() > 1180) {
                var children = $(this).children("ul");

                if(children.length || $(this).hasClass('w-popup')){
                    $(this).children("ul").css({'display' : 'block'});
                    $('#main .popup-overlay').addClass('show');
                    $('#main .popup-overlay').removeClass('hide');
                    $("body").css({
                        "overflow" : "hidden"
                    });
                    $("header").css({
                       "padding-right" : "17px"
                   });
                }
                e.preventDefault();
            }
        }, function (e) {
            if ($(window).width() > 1180) {
                $(this).children("ul").fadeOut(100);
                $('#main .popup-overlay').removeClass('show');
                $('#main .popup-overlay').addClass('hide');
                $("body").css({
                   "overflow" : "auto"
               });
                $("header").css({
                   "padding-right" : "0"
               });
                e.preventDefault();
            }
        }
        );
    //If width is more than 1180px dropdowns are displayed on hover


    //the following hides the menu when a click is registered outside
    $(document).on('click', function(e){
     
        if($(e.target).parents('.menu').length === 0){
          
         $("header .logo").css({
            "position" : "relative"
        });
         if(e.target.id != "menu-mobile"){
            $(".menu > ul").removeClass('show-on-mobile');
        }
    }
});

    $(".menu > ul > li").click(function() {
        //no more overlapping menus
        //hides other children menus when a list item with children menus is clicked
        var thisMenu = $(this).children("ul");
        var prevState = thisMenu.css('display');
        $(".menu > ul > li > ul").fadeOut();
        if ($(window).width() < 1180) {
            if(prevState !== 'block')
                thisMenu.fadeIn(100);
        }
    });
    //If width is less or equal to 1180px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

    $("#menu-mobile").click(function (e) {


        if($(".menu > ul").hasClass('show-on-mobile')) {
         $("body").css({
            "overflow" : "auto"
        });
         $("header").css({
            "position" : "relative",
            "z-index" : "1",
            "top" : "auto",
            "left" : "auto",
            "width" : "auto",
            "margin" : "0 -15px"
        });
         
         $(".menu > ul").removeClass('show-on-mobile');
     }else{
       $(".menu > ul").addClass('show-on-mobile');
       $("body").css({
        "overflow" : "hidden"
    });
       $("header").css({
        "position" : "fixed",
        "z-index" : 990,
        "top" : "0",
        "left" : "0",
        "width" : "100%",
        "margin" : "0"
    });
   }
   e.preventDefault();
});
    //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

});
