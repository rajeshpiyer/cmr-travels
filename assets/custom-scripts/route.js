function cerateRouteFun(modelId) {
  var data = $("#createRouteForm").serialize() + "&adminCreateRoute=true";
  scheduleAjaxPost(data, modelId);
}
function updateRouteFun(modelId) {
  var data = $("#updateRouteForm").serialize() + "&adminUpdateRoute=true";
  scheduleAjaxPost(data, modelId);
}
function deleteRouteFun(modelId) {
  var data = $("#deleteRouteForm").serialize() + "&adminDeleteRoute=true";
  scheduleAjaxPost(data, modelId);
}

function scheduleAjaxPost(data, modelId) {
  $.ajax({
    type: "POST",
    url: "../../controllers/adminRouteController.php",
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
