jQuery(document).ready(function ($) {

    $(".item").on("click",function(){
        $id=$(this).data('id');
        $name=$(this).data('emer');
        $cmimi=$(this).data('cmimi');
        $sasia=$(this).data('sasia');
        if($(".product-bar").length>0)
        {
        $(".product-bar").each(function(){
                
            if($(this).data("p-id")==$id){
              $sasia=$(this).children().find(".pr-quantity").val();
              $(this).children().find(".pr-quantity").val(parseInt($sasia, 10)+1);
              return false;
            } else{
                $( ".products" ).append('<div class="product-bar" id="'+$id+'" data-p-id="'+$id+'"><span>'+$name+'</span><span class="pr-cmim">'+$cmimi+'</span><span><input type="number" class="pr-quantity" value='+$sasia+' min="1"></span><button class="btn delete delete-order-detail order-detail"><i class="material-icons" title="Fshi">&#xE872;</i></button></div>');
                return false;
            }
        });
       }
       else{
       $( ".products" ).append('<div class="product-bar" id="'+$id+'" data-p-id="'+$id+'"><span>'+$name+'</span><span class="pr-cmim">'+$cmimi+'</span><span><input type="number" class="pr-quantity" value='+$sasia+' min="1"></span><button class="btn delete delete-order-detail order-detail"><i class="material-icons" title="Fshi">&#xE872;</i></button></div>');
       return false;}
        calculateSum();
    });

    $('.pr-quantity').on('change', function() {
        calculateSum();
    });

    function calculateSum() {

        $sum = 0;
        //iterate through each textboxes and add the values
        $(".pr-cmim").each(function() {
            //add only if the value is number
                //check cooresponding quantity
                var qty = $(this).parent().find('.pr-quantity').val();
                $sum += (parseFloat($(this).html()) * parseInt(qty, 10));
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $('#subTotal').val($sum.toFixed(2));
        $('#tvsh').val(($sum.toFixed(2)*0.17).toFixed(2));
        $("#sum").val(($sum+$sum*0.17).toFixed(2));
    }
    
    $(".order-detail").on("click", function(){
        $(this).parent().last().remove();
        calculateSum();
    });
    
});