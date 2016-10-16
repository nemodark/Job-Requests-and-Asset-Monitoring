/*password validation */
    $('#password, #cpassword').on('keyup', function () {
    if ($('#password').val() == $('#cpassword').val()) {
        $('#message').html('<i class="fa fa-check"></i>Password matched').css('color', 'green');
    } else 
        $('#message').html("<i class='fa fa-times'></i>These passwords don't match.").css('color', 'red');
    }); 

      $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password").val();
        var checkVal = $("#cpassword").val();
        if (passwordVal != checkVal ) {
            $("#cpassword").after(alert("Passwords don't match!"));
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
    var maxLength = 11;
  $('#contact').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars').text(length+" characters remaining");
  if(length <= 10)
    {
        $("#chars").css("color","red");
    }
    else
    {
        $("#chars").css("color","green");
    }
});


/*add date */
      var time = new Date();
var year = time.getYear();
if (year < 1900) {
year = year + 1900;
}
var date = year - 101; /*change the '101' to the number of years in the past you want to show */
var future = year + 100; /*change the '100' to the number of years in the future you want to show */ 
document.writeln ("<FORM><SELECT><OPTION value=\"\">Year");
do {
date++;
document.write ("<OPTION value=\"" +date+"\">" +date+ "");
}
while (date < future)
document.write ("</SELECT></FORM>");
//   -->

    </script>