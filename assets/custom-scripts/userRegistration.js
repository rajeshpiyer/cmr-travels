function userLogin() {
  var data = $("#userLogin").serialize() + "&userLogin=true";
  scheduleAjaxPost(data, "log");
}
function userRegistration() {
  var data = $("#userRegistration").serialize() + "&userReg=true";
  scheduleAjaxPost(data, "reg");
}

function checkNIC() {
  var NICNum = document.getElementById("userNIC").value;
  var data = "nic=" + NICNum + "&nicCheck=true";
  scheduleAjaxPost(data, "nic");
}

function scheduleAjaxPost(data, status) {
  var signUpBtn = document.getElementById("userSignUpBtn");
  $.ajax({
    type: "POST",
    url: "../../controllers/userRegistration.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);

        if (status == "log") {
          setTimeout(function () {
            location.replace("bookNow.php");
          }, 2000);
        } else if (status == "reg") {
          setTimeout(function () {
            location.replace("sign-in.php");
          }, 2000);
        } else if (status == "nic") {
          signUpBtn.disabled = false;
        }
      } else {
        toastr.error(feedback.msg);
        if (status == "nic") {
          signUpBtn.disabled = true;
        }
      }
      pageLoaderToggle(false);
    },
    error: function (error) {
      errorDisplay(error);
      pageLoaderToggle(false);
    },
  });
}
