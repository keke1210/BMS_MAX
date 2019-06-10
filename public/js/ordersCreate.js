jQuery(document).ready(function ($) {

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
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr(
                    'content')
            }
        });

        $.ajax({
            url: '/orders/'+tbId,
            type: 'POST',
            data: myJsonString,
            dataType: 'json',
            contentType: 'application/json',
            success: function (data, status) { 
                console.log(data, status); 
            },
            error: function( xhr, status, error ) {
                console.log(error, status);//...
            }
        }); 
    }
    });
});