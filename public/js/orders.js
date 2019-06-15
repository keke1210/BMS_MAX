jQuery(document).ready(function ($) {

    function gjejProdukt($prod_id, $x){
        $i=0;
        //kontrollon
        for($i=0;$i<$x;$i++)
        {
            if($prod_id==$($('.product-bar')[$i]).data('p-id')){
                return $i+1;
            }
        }
        return 0;
    }

    function perditesoSasi($pozicioni){
        if($pozicioni==0)
        {
            $( ".products" ).append('<div class="product-bar" id="'+$id+'" data-p-id="'+$id+'"><span>'+$name+'</span><span class="pr-cmim">'+$cmimi+'</span><span><input type="number" class="pr-quantity" name="prod_sasia" value='+$sasia+' min="1" max='+$gjendja+'></span><button class="btn delete delete-order-detail order-detail"><i class="material-icons" title="Fshi">&#xE872;</i></button></div>');
        }
        else{

            $sasia=$($('.product-bar')[$i]).children().find(".pr-quantity").val();
            $sasia=parseInt($sasia, 10)+1;
            if($sasia>$gjendja)
            {
                swal("Nuk ka me gjendje te produktit", "", "warning")
            }
            else
            $($('.product-bar')[$i]).children().find(".pr-quantity").val($sasia);
        }
    }

    $(".item").on("click",function(){
        //Produkti qe klikohet
        $id=$(this).data('id');
        $name=$(this).data('emer');
        $cmimi=$(this).data('cmimi');
        $sasia=$(this).data('sasia');
        $gjendja=$(this).data('gjendja');
        //Numri i details qe jane ne te djathte
         $nr_details=$(".product-bar").length;

         //id e produktit dhe numri i details dergohen si parametra tek funksioni
         $pozicioni=gjejProdukt($id,$nr_details);
         perditesoSasi($pozicioni);

         //kalkulo shumen
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
         var qty = $(this).parent().find('.pr-quantity').val();
         $sum += (parseFloat($(this).html()) * parseInt(qty, 10));
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $('#subTotal').val($sum.toFixed(2));
        $('#tvsh').val(($sum.toFixed(2)*0.17).toFixed(2));
        $("#sum").val(($sum+$sum*0.17).toFixed(2));
    }

    $(document).on("click",".order-detail",function(){
        $(this).parent().remove();
        calculateSum();
    });
    
    // $(".order-detail").on("click", function(){
    //     $(this).parent().remove();
    //     calculateSum();
    // });
    
});