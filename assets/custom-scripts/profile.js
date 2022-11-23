// function adminUpDetails() {
//   $.ajax({
//     type: "POST",
//     url: "../../controllers/adminProfileController.php",
//     data: $("#adminUpDetails").serialize() + "&adminUpDetails=true",
//     dataType: "JSON",
//     beforeSend: function () {},
//     success: function (feedback) {
//       if (feedback.status == 1) {
//         toastr.success(feedback.msg);
//         setTimeout(function () {
//           location.replace("profile.php");
//         }, 2000);
//       } else {
//         console.log(feedback.msg);
//         toastr.error(feedback.msg);
//       }
//     },
//     error: function (error) {
//       console.log(error);
//       toastr.warning("Error ocoured.");
//     },
//   });
// }

// function adminUpPass() {
//   $.ajax({
//     type: "POST",
//     url: "../../controllers/adminProfileController.php",
//     data: $("#adminUpPass").serialize() + "&adminUpPassword=true",
//     dataType: "JSON",
//     beforeSend: function () {},
//     success: function (feedback) {
//       if (feedback.status == 1) {
//         toastr.success(feedback.msg);
//         setTimeout(function () {
//           location.replace("profile.php");
//         }, 2000);
//       } else {
//         console.log(feedback.msg);
//         toastr.error(feedback.msg);
//       }
//     },
//     error: function (error) {
//       console.log(error);
//       toastr.warning("Error ocoured.");
//     },
//   });
// }

function adminUpDetails() {
  var data = $("#adminUpDetails").serialize() + "&adminUpDetails=true";
  scheduleAjaxPost(data, "adUpDetails");
}
function adminUpPass() {
  var data = $("#adminUpPass").serialize() + "&adminUpPassword=true";
  scheduleAjaxPost(data, "adUpPass");
}

function userUpDetails() {
  var data = $("#userUpDetails").serialize() + "&userUpDetails=true";
  scheduleAjaxPost(data, "usrUpDetails");
}
function userUpPass() {
  var data = $("#userUpPass").serialize() + "&userUpPassword=true";
  scheduleAjaxPost(data, "usrUpPass");
}

function checkNIC() {
  var NICNum = document.getElementById("profileNIC").value;
  var data = "nic=" + NICNum + "&nicCheck=true";
  scheduleAjaxPost(data, "nic");
}

function scheduleAjaxPost(data, status) {
  $.ajax({
    type: "POST",
    url: "../../controllers/profileController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        if (status != "nic") {
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      } else {
        toastr.warning(feedback.msg);
      }
      pageLoaderToggle(false);
    },
    error: function (error) {
      errorDisplay(error);
      pageLoaderToggle(false);
    },
  });
}
