<link rel="stylesheet" href="{{asset('css/liste-style.css')}}">
<link rel="stylesheet" href="{{asset('css/varela-font.css')}}">
<link rel="stylesheet" href="{{asset('css/material-icon.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.delete').click(function () {
            var product_id = $(this).attr('id');
            var product_name = $(this).data('pname');

            var delete_button = $(".Produkti");
            $('#deleteProductModal').find(delete_button).attr("id", product_id);
            $('.delete_form').attr("action", "products/" + product_id);
            $('#deleteProductModal').find(delete_button).html(product_name);
            $('#deleteProductModal').find(delete_button).attr("action", product_name);
        });

        $('.Cancel').click(function () {
            var delete_button = $(".Produkti");
            $('#deleteProductModal').find(delete_button).attr("id", '');
            $('.delete_form').attr("action", "products/");
            $('#deleteProductModal').find(delete_button).html('');
        });


        $('#editProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var productID = button.data('pid');
            var modal = $(this);

            modal.find('.modal-title').text('Edito Produkt');
            modal.find('#editForm').attr('action', "/products/" + productID);
            modal.find('.modal-body #emri').val(button.data('pem'));
            modal.find('.modal-body #cmimi').val(button.data('pc'));
            modal.find('.modal-body #prod_id').attr('value', productID);
        });

 
        
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userID = button.data('pid');
            console.log(userID);
            console.log(button.data('prol'));
            var modal = $(this);
            modal.find('.modal-title').text('Edito Përdorues');
            modal.find('#editForm').attr('action', "/users/" + userID);
            modal.find('.modal-body #emri').val(button.data('pem'));
            modal.find('.modal-body #email').val(button.data('pc'));
            if (button.data('prol') == 'kamarier') {
                modal.find('#user_rol').val('kamarier');
            } else {
                modal.find('#user_rol').val('ekonomist');
            }
        });

       

        
        $('.deleteUser').click(function () {
            var user_id = $(this).attr('id');
            var user_name = $(this).data('pname');
            $('#deleteUserModal').find('.delete_form').attr("action", "/users/" + user_id);
            var delete_button = $(".User");
            $('#deleteUserModal').find(delete_button).attr("id", user_id);
            $('#deleteUserModal').find(delete_button).html(user_name);
            $('#deleteUserModal').find(delete_button).attr("action", user_name);
        });

        $('.Cancel').click(function () {
            var delete_button = $(".User");
            $('#deleteUserModal').find(delete_button).attr("id", '');
            $('#deleteUserModal').find('.delete_form').attr("action", "/users/");
            $('#deleteUserModal').find(delete_button).html('');
        });

       
        $('#editTableModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var table_ID = button.data('pid');
            var table_lloj = button.data('tlloj');
            console.log(table_lloj);
            var modal = $(this);
            modal.find('.modal-title').text('Edito Tavolinë');
            modal.find('#editForm').attr('action', "/tables/" + table_ID);
            if (table_lloj == 'tek') {
                modal.find('#selectLloj').val('tek');
            } else {
                modal.find('#selectLloj').val('dysh');
            }

        });



        
        $('.deleteTable').click(function () {
            var table_id = $(this).attr('id');

            $('#deleteTableModal').find('.delete_form').attr("action", "/tables/" + table_id);


        });


        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        
    });
</script>
