function modelCreateBusFun(modelId) {
  var data = $("#modelCreateBusForm").serialize() + "&createBus=true";
  scheduleAjaxPost(data, modelId);
}
function modelUpdateBusFun(modelId) {
  var data = $("#modelUpdateBusForm").serialize() + "&updateBus=true";
  scheduleAjaxPost(data, modelId);
}
function modelDeleteBusFun(modelId) {
  var data = $("#modelDeleteBusForm").serialize() + "&deleteBus=true";
  scheduleAjaxPost(data, modelId);
}

function scheduleAjaxPost(data, modelId) {
  $.ajax({
    type: "POST",
    url: "../../controllers/busController.php",
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
