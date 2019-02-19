$(document).ready(function(){
$('#side-menu').on('click','li',function(){
    $('#side-menu li.active').removeClass('active');
    $(this).addClass('active');
 });
});