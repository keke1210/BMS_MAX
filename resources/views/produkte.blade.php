<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="_token" content="{{csrf_token()}}" />

    <title>Grocery Store</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('js/produkte.js')}}"></script> --}}
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
</head>

<body>
    <div class="container">
        <form id="myForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price">
            </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#ajaxSubmit').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "produkte/post",
                    method: 'POST',
                    data: {
                        name: $('#name').val(),
                        price: $("#price").val()
                    },
                    success: function (result) {
                        swal("Rezultati: " + result.success)
                    },
                    response: function (result) {
                        console.log(result);
                    }
                })
            });
        });
    </script>
</body>

</html>