@if(count($errors)>0)
    @foreach ($errors->all() as $error)
      <script>
        swal({
         
            confirmButtonColor: "#AEDEF4",
            showCancelButton: true
            // more options
        });
    </script>
    @endforeach
@endif