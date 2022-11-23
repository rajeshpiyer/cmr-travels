function sort_dives(input_id, class_name) {
  var value = document.getElementsByClassName(class_name);
  var input = document.getElementById(input_id);

  filter = input.value.toUpperCase();

  for (let index = 0; index < value.length; index++) {
    txtValue = value[index].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      value[index].classList.remove("cs-hide");
    } else {
      value[index].classList.add("cs-hide");
    }
  }
}

function setValueToDiv(inp_data, div_id) {
  document.getElementById(div_id).value = inp_data;
}
function setValueToDiv2(inp_busNum, inp_busName, dep, ari, inp_busType) {
  document.getElementById("up_bus_num").value = inp_busNum;
  document.getElementById("up_bus_name").value = inp_busName;
  document.getElementById("up_dep_time").value = dep;
  document.getElementById("up_ari_time").value = ari;

  if (inp_busType == "Normal") {
    document.getElementById("up_bus_type").value = "1";
  } else if (inp_busType == "Semi Luxury") {
    document.getElementById("up_bus_type").value = "2";
  } else if (inp_busType == "Luxury") {
    document.getElementById("up_bus_type").value = "3";
  }
}
function signOut() {
  $.ajax({
    type: "POST",
    url: "../../controllers/logoutController.php",
    data: {},
    dataType: "JSON",
    beforeSend: function () {},
    success: function (feedback) {
      toastr.success(feedback.msg);
      setTimeout(function () {
        location.replace("sign-in.php");
      }, 2000);
    },
    error: function (error) {
      console.log(error);
      toastr.warning("Error occoured.");
    },
  });
}

function errorDisplay(error) {
  toastr.warning(
    "<p class='pb-0 mb-0' style='font-size: 15px; font-weight:600;'>Internal server Error !!</p><p class='cs-text-'>" +
      error.responseText +
      "</p>"
  );
}

function pageLoaderToggle(state) {
  var proBarCount = document.getElementsByClassName("pageLoader");
  for (let index = 0; index < proBarCount.length; index++) {
    if (state) {
      proBarCount[index].classList.remove("is-active");
    } else {
      proBarCount[index].classList.add("is-active");
    }
  }
}

function sendMailFun(bookingId) {
  $.ajax({
    type: "POST",
    url: "../../controllers/mailer.php",
    data: {
      bookingId: bookingId,
      sendEmail: true,
    },
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
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

function sendContactMailFun(name, email, message) {
  $.ajax({
    type: "POST",
    url: "controllers/mailer.php",

    data: {
      name: name,
      email: email,
      message: message,
      sendContactEmail: true,
    },
    dataType: "JSON",
    beforeSend: function () {
      pageLoaderToggle(true);
    },
    success: function (feedback) {
      if (feedback.status == 1) {
        toastr.success(feedback.msg);
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
