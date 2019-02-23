$(document).ready(function(){
    $("#edito").click(function(){
        var modal = $(this);
      $.post("/products/"+ $(this).val(),
      {
        name: "Donald Duck",
        cmimi: "120"
      },
      function(data,status){
        alert("Data: " + data + "\nStatus: " + status);
      });
    });
  });