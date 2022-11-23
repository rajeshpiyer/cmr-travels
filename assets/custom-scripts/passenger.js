function ceratePassengerFun(modelId) {
  var data =
    $("#createPassengerForm").serialize() + "&adminCreatePassenger=true";
  scheduleAjaxPost(data, modelId);
}
function updatePassengerFun(modelId) {
  var data =
    $("#updatePassengerForm").serialize() + "&adminUpdatePassenger=true";
  scheduleAjaxPost(data, modelId);
}
function deletePassengerFun(modelId) {
  var data =
    $("#deletePassengerForm").serialize() + "&adminDeletePassenger=true";
  scheduleAjaxPost(data, modelId);
}

function scheduleAjaxPost(data, modelId) {
  $.ajax({
    type: "POST",
    url: "../../controllers/adminPassengerController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      $("#" + modelId).modal("hide");
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        setTimeout(function () {
          location.reload();
        }, 2000);
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
