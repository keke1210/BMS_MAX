jQuery(document).ready(function ($) {

    $('#payment').on('click', function () {
        var array = [];
        var tbId= parseInt($($('#idtavoline')).data('tbl'));

        alert(tbId);
        $('.product-bar').each(function () {
            var id = $(this).data('p-id');
            var sasia = parseInt($(this).children().find(".pr-quantity").val());

            array.push({
                "prod_id": id,
                "sasia": sasia
            });
        });
        var myJsonString = JSON.stringify(array);
        console.log(JSON.stringify(array));
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr(
                    'content')
            }
        });

        $.ajax({
            url: 'http://127.0.0.1:8000/api/orders/'+tbId,
            type: 'POST',
            data: myJsonString,
            dataType: 'application/json',
            success: function (data) { 
                console.log(response); 
            }
        }); 
        
    });
});