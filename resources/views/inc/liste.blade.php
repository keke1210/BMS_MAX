<link rel="stylesheet" href="{{asset('css/liste-style.css')}}">
<link rel="stylesheet" href="{{asset('css/varela-font.css')}}">
<link rel="stylesheet" href="{{asset('css/material-icon.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
{{-- <script src="{{asset('js/edit-form.js')}}"></script> --}}
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
   
        //Fshi Produkt
        $('.delete').click(function(){
      var product_id = $(this).attr('id');
      var product_name = $(this).data('pname');
    
      var delete_button = $( ".Produkti");
        $('#deleteProductModal').find( delete_button ).attr("id",product_id);
        $('.delete_form').attr("action","products/"+product_id);
        $('#deleteProductModal').find( delete_button ).html(product_name);
        $('#deleteProductModal').find( delete_button ).attr("action",product_name);
      });

       $('.Cancel').click(function(){    
      var delete_button = $( ".Produkti");
        $('#deleteProductModal').find( delete_button ).attr("id",'');
        $('.delete_form').attr("action","products/");
        $('#deleteProductModal').find( delete_button ).html('');
      });

      //Edito Produktin
       $('#editProductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var productID = button.data('pid');
        console.log(productID);
        $('#test').load('test.txt'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('#test').load('test.txt', function(responseTxt, statusTxt, xhr){
          if(statusTxt=="success")
            swal ( "Status: " + xhr.status ,  "Gjithcka shkoi mire! "+ xhr.statusText  ,  "success"  )
          if(statusTxt=="error")
            swal ( "Oops" + xhr.status ,  "Something went wrong!" + xhr.statusText ,  "error" )
        });
        modal.find('.modal-title').text('Edito Produkt');
        modal.find('#editForm').attr('action',"/products/"+productID);
        modal.find('.modal-body #emri').val(button.data('pem'));
        modal.find('.modal-body #cmimi').val(button.data('pc'));
        modal.find('.modal-body #prod_id').attr('value',productID);
        });

        //Zgjidh sasi produkti 
        $('#productQuantity').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var productID = button.data('pid');
        console.log(productID); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Edito Produkt');
        modal.find('#editForm').attr('action',"/products/"+productID);
        modal.find('.modal-body #emri').val(button.data('pem'));
        modal.find('.modal-body #prod_id').attr('value',productID);
        });
        
        //Edito Perdorues
     /* $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userID = button.data('pid');
        console.log(userID); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Edito Përdorues');
        modal.find('#editForm').attr('action',"/users/"+userID);
        modal.find('.modal-body #emri').val(button.data('pem'));
        modal.find('.modal-body #email').val(button.data('pc'));
        // modal.find('.modal-body #password').attr('value',userID);
        }); */

        $('#editUserModal').on('show.bs.modal', function (event) {
          
        });

        //Fshi Perdorues
        $('.deleteUser').click(function(){
      var user_id = $(this).attr('id');
      var user_name = $(this).data('pname');
      $('#deleteUserModal').find('.delete_form').attr("action","/users/"+user_id);
      var delete_button = $( ".User");
        $('#deleteUserModal').find( delete_button ).attr("id",user_id);
        $('#deleteUserModal').find( delete_button ).html(user_name);
        $('#deleteUserModal').find( delete_button ).attr("action",user_id);
      });

       $('.Cancel').click(function(){    
      var delete_button = $( ".User");
        $('#deleteUserModal').find( delete_button ).attr("id",'');
        $('#deleteUserModal').find('.delete_form').attr("action","/users/");
        $('#deleteUserModal').find( delete_button ).html('');
      });

        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });
    </script> 


