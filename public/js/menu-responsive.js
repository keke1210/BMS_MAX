 //Rregullim i WEBSITE ne onload
	$(document).ready(function(){
       var win = $(window);
        if (win.width() <= 768) {  
             $('#topbar').css({'margin-left': '0px'});
             $("li.nav-header").css({'height':'55px'});
             $("a.navbar-minimalize.minimalize-styl-2.btn.btn-primary").css({'margin-left': '-60px!important;'});
          }
         else
         {
             $('#topbar').css({'margin-left': '220px'});
             $("body").removeClass("body-small");
             $("body").removeClass("mini-navbar");
             $("li.nav-header").css({'height':''});
             $("a.navbar-minimalize.minimalize-styl-2.btn.btn-primary").css({'margin-left': ''});
        }
    });
		 
		 
		   //Rregullim i WEBSITE ne ndryshimin e width
	$(window).on('resize', function(){
       var win = $(this); //this = window
        if (win.width() <= 768) {  
             $('#topbar').css({'margin-left': '0px'});
             $("li.nav-header").css({'height':'55px'});
             $("a.navbar-minimalize.minimalize-styl-2.btn.btn-primary").css({'margin-left': '-60px!important;'});
          }
         else 
         {  if ($('.navbar-default .navbar-static-side ').css('display') == 'none'){
             $('#topbar').css({'margin-left': '220px'});
             $("body").removeClass("body-small");
             $("body").removeClass("mini-navbar");
             $("li.nav-header").css({'height':''});
             $("a.navbar-minimalize.minimalize-styl-2.btn.btn-primary").css({'margin-left': ''});
             }
            else
            {
             $('#topbar').css({'margin-left': '220px'});
             $("body").removeClass("body-small");
             $("body").removeClass("mini-navbar");
             $("li.nav-header").css({'height':''});
             $("a.navbar-minimalize.minimalize-styl-2.btn.btn-primary").css({'margin-left': ''});
            }
         }
    });