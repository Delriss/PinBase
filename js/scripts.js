//Login Form
$('#loginForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        type:'POST',
        url:'./includes/_auth',
        data:$('#loginForm').serialize(),

        success: function(data) {
          if (data == "You have successfully logged in.") {
            location.href = "./index";
            alert(data);
          }
        },           
    });
});