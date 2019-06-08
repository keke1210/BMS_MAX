jQuery(document).ready(function ($) {
$('#payment').on('click', function(){
    var array = [];

$('.product-bar').each(function(){
    var id=$(this).data('p-id');
    var sasia=$(this).children().find(".pr-quantity").val();

    array.push({"prod_id":id, "sasia": sasia});
}); 

console.log(array);

});
    
});