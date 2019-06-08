jQuery(document).ready(function ($) {

    $('#payment').on('click', function () {
        var array = [];
        var tbId= parseInt($($('.product-bar')).data('p-id'));

        alert(tbId);
        $('.product-bar').each(function () {
            var id = $(this).data('p-id');
            var sasia = $(this).children().find(".pr-quantity").val();

            array.push({
                "prod_id": id,
                "sasia": sasia
            });
        });
        console.log(array);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr(
                    'content')
            }
        });

        $.ajax({
            url: 'http://127.0.0.1:8000/api/orders/'+tbId,
            type: 'POST',
            data: array,
            dataType: 'application/json',
            success: function (data) { 
                console.log(response); 
            }
        }); 
        
    });
});