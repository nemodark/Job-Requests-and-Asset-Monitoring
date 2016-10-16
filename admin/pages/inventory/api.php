$(function(){

   $('.push').click(function(){
      var essay_id = $(this).attr('id');

       $.ajax({
          type : 'post',
           url : 'your_url.php', // in here you should put your query 
          data :  'post_id='+ essay_id, // here you pass your id via ajax .
                     // in php you should use $_POST['post_id'] to get this value 
       success : function(r)
           {
              // now you can show output in your modal 
              $('#mymodal').show();  // put your modal id 
             $('.something').show().html(r);
           }
    });


});

   });