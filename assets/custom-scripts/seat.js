function cerateSeatFun(modelId) {
  var data = $("#createSeatForm").serialize() + "&adminCreateSeat=true";
  scheduleAjaxPost(data, modelId);
}
function updateSeatFun(modelId) {
  var data = $("#updateSeatForm").serialize() + "&adminUpdateSeat=true";
  scheduleAjaxPost(data, modelId);
}
function deleteSeatFun(modelId) {
  var data = $("#deleteSeatForm").serialize() + "&adminDeleteSeat=true";
  scheduleAjaxPost(data, modelId);
}

function scheduleAjaxPost(data, modelId) {
  $.ajax({
    type: "POST",
    url: "../../controllers/adminSeatController.php",
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

// function cerateSeat() {
//   $.ajax({
//     type: "POST",
//     url: "../../controllers/adminSeatController.php",
//     data: $("#createSeatForm").serialize() + "&adminCreateSeat=true",
//     dataType: "JSON",
//     beforeSend: function () {},
//     success: function (feedback) {
//       if (feedback.status == 1) {
//         toastr.success(feedback.msg);
//         setTimeout(function () {
//           location.reload();
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

// function updateSeat() {
//   $.ajax({
//     type: "POST",
//     url: "../../controllers/adminSeatController.php",
//     data: $("#updateSeatForm").serialize() + "&adminUpdateSeat=true",
//     dataType: "JSON",
//     beforeSend: function () {},
//     success: function (feedback) {
//       if (feedback.status == 1) {
//         toastr.success(feedback.msg);
//         setTimeout(function () {
//           location.reload();
//         }, 2000);
//       } else {
//         console.log(feedback.msg);
//         toastr.error(feedback.msg);
//       }
//     },
//     error: function (error) {
//       console.log(error);
//       toastr.warning("Error occoured.");
//     },
//   });
// }

// function deleteSeat() {
//   var id = document.getElementById("del_seat_id").value;
//   $.ajax({
//     type: "POST",
//     url: "../../controllers/adminSeatController.php",
//     data: {
//       id: id,
//       adminDeleteSeat: true,
//     },
//     dataType: "JSON",
//     beforeSend: function () {},
//     success: function (feedback) {
//       if (feedback.status == 1) {
//         toastr.success(feedback.msg);
//         setTimeout(function () {
//           location.reload();
//         }, 2000);
//       } else {
//         toastr.error(feedback.msg);
//       }
//     },
//     error: function (error) {
//       console.log(error);
//       toastr.warning("Error occoured.");
//     },
//   });
// }
