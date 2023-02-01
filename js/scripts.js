//Login Form
$("#loginForm").submit(function (e) {
  e.preventDefault();
  grecaptcha.ready(function () {
    grecaptcha
      .execute("6Ld55UAkAAAAADqgU6Wjw1hHORSUgTX7e4mn85Rq", {
        action: "create_comment",
      })
      .then(function (token) {
        $("#recapToken").val(token);
        $.ajax({
          type: "POST",
          url: "./includes/_auth",
          data: $("#loginForm").serialize(),

          success: function (data) {
            if (data.includes("You have successfully logged in.")) {
              //Output
              Swal.fire({
                title: "Login Successful",
                text: "You have successfully logged in.",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Continue",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location = "./index";
                }
              });
            } else {
              Swal.fire({
                title: "Login Failed",
                text: "Login Failed: ".data,
                icon: "error",
              });
            }
          },
        });
      });
  });
});

//Create User Form
$("#createUser").submit(function (e) {
  e.preventDefault();
  grecaptcha.ready(function () {
    grecaptcha
      .execute("6Ld55UAkAAAAADqgU6Wjw1hHORSUgTX7e4mn85Rq", {
        action: "create_comment",
      })
      .then(function (token) {
        $("#recapToken").val(token);
        $.ajax({
          url: "./includes/_createUser",
          type: "POST",
          data: $("#createUser").serialize(),
          success: function (data) {
            Swal.fire({
              title: "Registration Successful",
              text: "You have successfully registered.",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Continue",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "./index";
              }
            });
          },
        });
      });
  });
});

//Create Pin Form
$("#createPin").submit(function (e) {
  e.preventDefault();

  $.ajax({
    url: "./includes/_createPin",
    type: "POST",
    data: $("#createPin").serialize(),
    success: function (data) {
      Swal.fire({
        title: "Pin Creation Successful",
        text: "You have successfully created a pin.",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Continue",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "./createPin";
        }
      });
    },
  });
});

// //On viewPin.php page load - load the pins
$(document).ready(function () {
  $.ajax({
    url: "./includes/_viewPins",
    type: "GET",
    success: function (data) {
      $("#viewPins").html(data);
    },
  });
});

//Checkboxes
$("#expiryCheck").change(function () {
  if (this.checked) {
    $("#expiryDate").attr("disabled", false);
  } else {
    $("#expiryDate").attr("disabled", true);
  }
});

$("#passwordCheck").change(function () {
  if (this.checked) {
    $("#password").attr("disabled", false);
  } else {
    $("#password").attr("disabled", true);
  }
});
