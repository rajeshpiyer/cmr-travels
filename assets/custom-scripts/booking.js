function cerateBookingFun(modelId) {
  var data = $("#createBookingForm").serialize() + "&createBooking=true";
  scheduleAjaxPost(data, modelId, 1);
}
function updateBookingFun(modelId) {
  var data = $("#updateBookingForm").serialize() + "&adminUpdateBooking=true";
  scheduleAjaxPost(data, modelId, 0);
}
function deleteBookingFun(modelId) {
  var data = $("#deleteBookingForm").serialize() + "&adminDeleteBooking=true";
  scheduleAjaxPost(data, modelId, 0);
}

function scheduleAjaxPost(data, modelId, sendEmail) {
  $.ajax({
    type: "POST",
    url: "../../controllers/bookingController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      if (modelId != "" || modelId != 0) {
        $("#" + modelId).modal("hide");
      }
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        if (sendEmail == 1) {
          sendMailFun(feedback.bookingId);
        }
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

function cerateUsrBookingFun() {
  var data = $("#createBookingForm").serialize() + "&createBooking=true";
  $.ajax({
    type: "POST",
    url: "../../controllers/bookingController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        getBookingData(feedback.bookingId);
        showHideDiv("bookingForm", 0);
        showHideDiv("demoTicket", 1);

        sendMailFun(feedback.bookingId);
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

function getBookingData(id) {
  var data = "id=" + id + "&getBookingData=true";
  $.ajax({
    type: "POST",
    url: "../../controllers/bookingController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        const obj = JSON.parse(feedback.bookingData);

        setDemoData(
          obj.id,
          obj.routeFrom,
          obj.routeTo,
          obj.seatPrice,
          obj.busName,
          obj.busNumber,
          obj.departureTime
        );
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

function onSelectLoad(current, nxtElement) {
  var curElementValue = current.value;
  var data =
    "curElementVal=" +
    curElementValue +
    "&nxtElementID=" +
    nxtElement +
    "&onSelectLoadItems=true";

  $.ajax({
    type: "POST",
    url: "../../controllers/bookingController.php",
    data: data,
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
        var resData = feedback.data;
        removeOptions(nxtElement);
        addOptions(nxtElement, resData);
      } else {
        console.log(feedback.status);
        toastr.warning(feedback.msg);
      }
      pageLoaderToggle(false);
    },
    error: function (error) {
      console.log(error);
      errorDisplay(error);
      pageLoaderToggle(false);
    },
  });
}

function removeOptions(elementId) {
  $("#" + elementId + " option").remove();
}
function addOptions(elementId, data) {
  $("#" + elementId).append('<option hidden value="">---</option>' + data);
}

function showHideDiv(element, state) {
  if (state == 0) {
    document.getElementById(element).classList.add("cs-hide");
  } else {
    document.getElementById(element).classList.remove("cs-hide");
  }
}
function locationReload() {
  location.reload();
}
function setDemoData(id, from, to, price, busName, busNumber, dTime) {
  document.getElementById("demoBusNameId").innerHTML = busName + " | #" + id;
  document.getElementById("demoBusRoute").innerHTML = from + " - " + to;
  document.getElementById("demoDepature").innerHTML = " " + dTime;
  document.getElementById("demoBusNum").innerHTML = " " + busNumber;
  document.getElementById("demoPrice").innerHTML = "Rs " + price + ".00/=";
}
