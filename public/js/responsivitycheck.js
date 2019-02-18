  //shikojmë nëse menuja është pozicionuar mirë sipas madhësisë së ekranit.
         $ ( window ).resize(function ()
         {
             if($('body').hasClass('mini-navbar')){
         
                 $('.navbar-fixed-top').css('margin-left','70px');
             } else {
                 if($ ( window ).width()>768)
                 {
                     $('.navbar-fixed-top').css('margin-left', '220px');
                 }
                 else
                 {
                     $('.navbar-fixed-top').css('margin-left','0px');
                 }
             }
         });
         
         
        
         
         $(document).on('click', '.navbar-minimalize', function(){
             if($('.navbar-static-side').css('display') == 'none'){
                 $('.navbar-static-side').css('display','block');
             }
             checknav();
         })
         
         checknav();
         
         function checknav(){
             if($('body').hasClass('mini-navbar')){
                 $('#topbar').css('height','55px')
                 $('.navbar-fixed-top').css('margin-left','70px');
             } else {
                 $('#topbar').css('height','55.5px')
                 var screen_width = $(window).width();
                 if(screen_width>768)
                 {
                     $('.navbar-fixed-top').css('margin-left','220px');
                     $('.navbar-static-side').css('display','block');
                 }
                 else
                 {
                     $('.navbar-fixed-top').css('margin-left','0px');
                     $('.navbar-static-side').css('display','none');
                 }
                 
             }
         
         }