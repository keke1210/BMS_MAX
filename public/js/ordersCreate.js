jQuery(document).ready(function ($) {

    // function LoginUser() {
    //     var token = $("input[name=_token]").val();

    // }



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
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'http://127.0.0.1:8000/api/orders/'+tbId,
            type: 'POST',
            data: myJsonString,
            headers: { 'Authorization' :'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQwZTQyMTc1NWRlN2U4OGFhNmQ5NTRjMzNiMjgxN2I0YWY3Njc2NjM3MWRhYWFlNmY4YzZlNGE2M2VjNTFkYjEyMDcwMjYwMDFmMzE2Njg4In0.eyJhdWQiOiIxIiwianRpIjoiZDBlNDIxNzU1ZGU3ZTg4YWE2ZDk1NGMzM2IyODE3YjRhZjc2NzY2MzcxZGFhYWU2ZjhjNmU0YTYzZWM1MWRiMTIwNzAyNjAwMWYzMTY2ODgiLCJpYXQiOjE1NTk5Nzk4MTcsIm5iZiI6MTU1OTk3OTgxNywiZXhwIjoxNTkxNjAyMjE3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.uw5cQ27armYrdNuvLhoqo8zGLfDo91J_vhGVMyJEAMS7Xafk--WIA-wuV7v3FhhJqEBVfTIAusKfBCEL8TtzLydeWXrqIMqb8_4uSSyqrCPnqvIpG1zTyE2ol_JYf5kNQ9UQtiMz_lnKl6YJQKiu1JnEMYQCPNJrXBdfM6TVhNPjw-55Dht9-rYEq1iuY2cvUomKKdjnUbwFyAUcBTL3dYLcDkMAM0wCHSPSJ06Wrs1ZUQt7A9OzuijwlohSB2xZf6Bd1Ezrs0SQGQSlMaS_evc40yEdG2U7d6JBjwJimmwX0dsrzCrbDB50IY2k7sJTuGmIRZBLcZBMZwHaSWNy6NnJZ9gTWkr7hCwzBcWpguVw7KTBYZPiYzZS1mfF7aXsojrZ6y11E7VpmmVzbf3vXcsIy_jGb6BIwrdBNnVPs14fZ4p-wHJk_JAROr7A0Pl0T68DqxuFre9CYzS-O5uHZqGRiwdKhguNEtDhLW-QVE4bzWZhwctAVRlfG6tI2D5azw2-KfA0SzvIfFWfDqkfTBrZQUEUjCu0wTnA3vMuTIAz-IXvBRmCcgl-eFkQMM6j4qfgdmcKZNlWmcndt29fXhT1S1Yl7WYx6itfxJxvpJ7SHWeo5csKgNIhahUHhUNiUqONOxino9ev3FzBORP2E3e-JrJRwjAg3Gm5aETfol0',
                        "Accept":"application/json"
                    },
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) { 
                console.log(response); 
            }
        }); 
        
    });
});