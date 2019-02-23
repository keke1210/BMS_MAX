$(document).ready(function () {
    $('#ajaxSubmit').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "produkte/post'",
            method: 'POST',
            data: {
                name: $('#name').val(),
                price: $("#price").val()
            },
            success: function (result) {
                swal("Rezultati: " + result.success)
            },
            error: function (result) {
                console.log(result);
            }
        })
    });
});