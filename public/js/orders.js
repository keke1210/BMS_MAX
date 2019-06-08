jQuery(document).ready(function ($) {

    function gjejProdukt($prod_id, $x){
        $i=0;
        //kontrollon ne te djathte dhe kne te majte
        for($i=0;$i<$x;$i++)
        {
            if($prod_id==$($('.product-bar')[$i]).data('p-id')){
                return $i+1;
            }
        }
        return 0;
    }

    $(".item").on("click",function(){
        //Produkti qe klikohet
        $id=$(this).data('id');
        $name=$(this).data('emer');
        $cmimi=$(this).data('cmimi');
        $sasia=$(this).data('sasia');

        //Numri i details qe jane ne te djathte
         $nr_details=$(".product-bar").length;

         //id e produktit dhe numri i details dergohen si parametra tek funksioni
         $pozicioni=gjejProdukt($id,$nr_details);

         if($pozicioni==0)
            {
                $( ".products" ).append('<div class="product-bar" id="'+$id+'" data-p-id="'+$id+'"><span>'+$name+'</span><span class="pr-cmim">'+$cmimi+'</span><span><input type="number" class="pr-quantity" value='+$sasia+' min="1"></span><button class="btn delete delete-order-detail order-detail"><i class="material-icons" title="Fshi">&#xE872;</i></button></div>');
            }
            else{
                $sasia=$($(".pr-quantity")[$pozicioni]).val();
                $($(".pr-quantity")[$pozicioni]).val()=$sasia+1;
            }
        
        
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
        $(this).parent().remove();
        calculateSum();
    });
    
});