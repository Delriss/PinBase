//Login Form
$('#loginForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        type:'POST',
        url:'./includes/_auth',
        data:$('#loginForm').serialize(),

        success: function(data) {
          if (data == "You have successfully logged in.") {
            alert(data);
            window.location = "./index";
          }
        },           
    });
});

//Create User Form
$('#createUser').submit(function (e) {
  e.preventDefault();
  
  $.ajax({
      url: './includes/_createUser',
      type: 'POST',
      data: $('#createUser').serialize(),
      success: function (data) {
          alert(data);
          window.location = "./index";
      }
  });
});

//Create Pin Form
$('#createPin').submit(function (e) {
  e.preventDefault();
  
  $.ajax({
      url: './includes/_createPin',
      type: 'POST',
      data: $('#createPin').serialize(),
      success: function (data) {
          alert(data);
          window.location = "./createPin";
      }
  });
});