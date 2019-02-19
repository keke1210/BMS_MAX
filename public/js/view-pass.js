
         $(document).ready(function(){
               $('#username').focus();        
           
               setTimeout(() => {
                   $('.loginscreen').removeClass('animated');
               }, 500);
         
               Template.editPrediction.onRendered(()=>{
                   Materialize.updateTextFields()
               })
         
         
             })
         
             $(".toggle-password").click(function() {
         
               $(this).toggleClass("fa-eye fa-eye-slash");
               var input = $($(this).attr("toggle"));
               if (input.attr("type") == "password") {
                 input.attr("type", "text");
               } else {
                 input.attr("type", "password");
               }
             });
         
