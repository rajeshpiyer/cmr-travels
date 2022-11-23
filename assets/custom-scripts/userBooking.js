function setData() {
  var getRouteId = document.getElementById("bookingGetRouteId").value;
  document.getElementById("bookingRouteId").value = getRouteId;
  document.getElementById("bookingForm1").classList.add("cs-hide");
  document.getElementById("bookingForm2").classList.remove("cs-hide");
}

function cerateBooking() {
  var bookingRouteId = document.getElementById("bookingRouteId").value;
  var bookingSeatId = document.getElementById("bookingSeatId").value;
  var bookingDate = document.getElementById("bookingDate").value;

  $.ajax({
    type: "POST",
    url: "../../controllers/userBookingController.php",
    data: {
      bookingRouteId: bookingRouteId,
      bookingSeatId: bookingSeatId,
      bookingDate: bookingDate,
      adminCreateBooking: true,
    },
    dataType: "JSON",
    beforeSend: function () {},
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        setTimeout(function () {
          location.reload();
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
