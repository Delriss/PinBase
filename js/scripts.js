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
          else {
            alert(data);
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

// //On viewPin.php page load - load the pins
$(document).ready(function() {
  $.ajax({
    url: './includes/_viewPins',
    type: 'GET',
    success: function (data) {
      $('#viewPins').html(data);
    }
  });
});

//Checkboxes
$('#expiryCheck').change(function() {
  if(this.checked) {
    $('#expiryDate').attr('disabled', false);
  } else {
    $('#expiryDate').attr('disabled', true);
  }
});

$('#passwordCheck').change(function() {
  if(this.checked) {
    $('#password').attr('disabled', false);
  } else {
    $('#password').attr('disabled', true);
  }
});
