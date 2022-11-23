function adminLogin() {
  $.ajax({
    type: "POST",
    url: "../../controllers/adminLoginRegController.php",
    data: $("#adminLogin").serialize() + "&adminLog=true",
    dataType: "JSON",
    beforeSend: function () {},
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        setTimeout(function () {
          location.replace("../admin/dashboard.php");
        }, 2000);
      } else {
        console.log(feedback.msg);
        toastr.error(feedback.msg);
      }
    },
    error: function (error) {
      console.log(error);
      toastr.warning("Error ocoured.");
    },
  });
}
