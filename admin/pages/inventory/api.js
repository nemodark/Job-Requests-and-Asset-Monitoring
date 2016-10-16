$(function(){

   $('.push').click(function(){
      var assetid = $(this).attr('id');

       $.ajax({
          type : 'post',
           url : 'invsystem.php', // in here you should put your query 
          data :  'post_id='+ assetid, // here you pass your id via ajax .
                     // in php you should use $_POST['post_id'] to get this value 
       success : function(r)
           {
              // now you can show output in your modal 
              $('#mymodal').modal('show');  // put your modal id 
             $('.something').show().html(r);
           }
    });


});

   });