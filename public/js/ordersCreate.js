jQuery(document).ready(function ($) {

    // var email = "admin@gmail.com";
    // var password = "admin1";
    //  // Log in , get the token then store it
    //  $.ajax({
    //     method: "POST",
    //     url: "http://127.0.0.1:8000/api/login",
    //     contentType: 'application/json',
    //     data : {email : email, password: password}
    //   }).done(function(data, status) {
    //     localStorage.setItem('appname_token', data.token);
    //     // the following part makes sure that all the requests made later with jqXHR will automatically have this header.
    //     $( document ).ajaxSend(function( event, jqxhr, settings ) {
    //         jqxhr.setRequestHeader('Authorization', "Bearer " + data.token); 
    //     });
    //   }).fail(function(error){
    //     // handle the error
    //     console.log(error);
    //   });


    //   $.ajax({ 
    //     url: 'foo/bar', 
    //     headers: { 
    //       'Authorization': 'Bearer ' + localStorage.getItem('appname_token') 
    //     } 
    //   });




    $('#payment').on('click', function () {
        var array = [];
        var tbId= parseInt($($('#idtavoline')).data('tbl'));

        // alert(tbId);
        if($('.product-bar').length==0)
        {
            swal("Ju nuk keni perzgjedhur asnje produkt", "", "warning")
        }
        else{
        $('.product-bar').each(function () {
            var id = $(this).data('p-id');
            var sasia = parseInt($(this).children().find(".pr-quantity").val());

            array.push({
                "prod_id": id,
                "sasia": sasia
            });
        });
        var myJsonString = JSON.stringify(array);

        $('input[name="vlerat"]').val(myJsonString);
        
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr(
        //             'content')
        //     }
        // });

        // $.ajax({
        //     url: '/orders/'+tbId,
        //     type: 'POST',
        //     data: myJsonString,
        //     dataType: 'json',
        //     contentType: 'application/json',
        //     success: function (data, status) { 
        //         console.log(data, status); 
        //     },
        //     error: function( xhr, status, error ) {
        //         console.log(error, status);//...
        //     }
        // }); 
    }
    });
});