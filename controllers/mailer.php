<?php
include_once 'dbConnection.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sendEmail']) && $_POST['sendEmail'] == true) {

  require_once "../PHPMailer/PHPMailer.php";
  require_once "../PHPMailer/SMTP.php";
  require_once "../PHPMailer/Exception.php";

  $mail = new PHPMailer();

  //secondary information
  $bookingId = $_POST['bookingId'];
  $loadDataSql = "SELECT * FROM booking 
                  INNER JOIN
                  seat ON booking.seatId = seat.seatId
                  INNER JOIN
                  route ON booking.routeId = route.routeId
                  INNER JOIN passenger
                   ON booking.passengerNIC = passenger.nic WHERE booking.id = '" . $bookingId . "';";

  $loadDataResult = $con->query($loadDataSql);

  if ($loadDataResult->num_rows > 0) {
    // output data of each row
    while ($loadDataRow = $loadDataResult->fetch_assoc()) {

      $passengerNIC = $loadDataRow["nic"];
      $busNumber = $loadDataRow["busNumber"];
      $route = $loadDataRow["routeFrom"] . ' - ' . $loadDataRow["routeTo"];
      $seatNumber = $loadDataRow["seatNumber"];
      $date = $loadDataRow["date"];
      // $receiversAddress = "hishansjc@gmail.com";
      $receiversAddress = $loadDataRow["email"];


      $load2DataSql = "SELECT * FROM bus WHERE busNumber = '" . $busNumber . "';";

      $load2DataResult = $con->query($load2DataSql);

      if ($load2DataResult->num_rows > 0) {
        // output data of each row
        while ($load2DataRow = $load2DataResult->fetch_assoc()) {
          $departureTime = $load2DataRow["departureTime"];
          $departureTime = date('h:i A', strtotime($departureTime));
        }
      }
    }
  }

  $sendersName = "CMR Travels";
  $sendersEmail = 'noreply.livesl@gmail.com';
  $mailSubject = "Booking Details";
  $mailBody = '
  
  <html lang="en-US">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Bus Ticket</title>
    <meta name="description" content="Bus Ticket" />
  </head>
  <style>
    a:hover {
      text-decoration: underline !important;
    }
  </style>

  <body
    marginheight="0"
    topmargin="0"
    marginwidth="0"
    style="margin: 0px; background-color: #f2f3f8"
    leftmargin="0"
  >
    <table
      cellspacing="0"
      border="0"
      cellpadding="0"
      width="100%"
      bgcolor="#f2f3f8"
      style="
        @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);
        font-family: "Open Sans", sans-serif;
      "
    >
      <tr>
        <td>
          <table
            style="background-color: #f2f3f8; max-width: 670px; margin: 0 auto"
            width="100%"
            border="0"
            align="center"
            cellpadding="0"
            cellspacing="0"
          >
            <tr>
              <td style="height: 80px">&nbsp;</td>
            </tr>
            <!-- Email Content -->
            <tr>
              <td>
                <table
                  width="95%"
                  border="0"
                  align="center"
                  cellpadding="0"
                  cellspacing="0"
                  style="
                    max-width: 670px;
                    background: #fff;
                    border-radius: 3px;
                    -webkit-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                    -moz-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                    box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                    padding: 0 40px;
                  "
                >
                  <tr>
                    <td style="height: 40px">&nbsp;</td>
                  </tr>
                  <!-- Title -->
                  <tr>
                    <td style="padding: 0 15px; text-align: center">
                      <h1
                        style="
                          color: #1e1e2d;
                          font-weight: 400;
                          margin: 0;
                          font-size: 32px;
                          font-family: "Rubik", sans-serif;
                        "
                      >
                        Reservation Details
                      </h1>
                      <span
                        style="
                          display: inline-block;
                          vertical-align: middle;
                          margin: 9px 0 28px;
                          border-bottom: 1px solid #cecece;
                          width: 100px;
                        "
                      ></span>
                    </td>
                  </tr>
                  <!-- Details Table -->
                  <tr>
                    <td>
                      <table
                        cellpadding="0"
                        cellspacing="0"
                        style="width: 100%; border: 1px solid #ededed"
                      >
                        <tbody>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Ticket ID:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $bookingId . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Passenger NIC:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $passengerNIC . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Bus Number:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $busNumber . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Route:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $route . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Seat Number:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $seatNumber . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Departure Time:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $departureTime . '
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                border-right: 1px solid #ededed;
                                width: 35%;
                                font-weight: 500;
                                color: rgba(0, 0, 0, 0.64);
                              "
                            >
                              Date:
                            </td>
                            <td
                              style="
                                padding: 10px;
                                border-bottom: 1px solid #ededed;
                                color: #455056;
                              "
                            >
                              ' . $date . '
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="height: 40px">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="height: 80px">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>



  ';

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "noreply.livesl@gmail.com";
  $mail->Password = "JnDjBs7vbD2qEew";
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  //Email Settings
  $mail->setFrom($sendersEmail, $sendersName);
  $mail->addAddress($receiversAddress);
  $mail->Subject = $mailSubject;
  $mail->Body = $mailBody;
  $mail->isHTML(true);

  if ($mail->send()) {
    echo json_encode(['status' => '1', 'msg' => 'Email sent']);
  } else {
    echo json_encode(['status' => '0', 'msg' => $mail->ErrorInfo]);
  }
} else if (isset($_POST['sendContactEmail']) && $_POST['sendContactEmail'] == true) {
  require_once "../PHPMailer/PHPMailer.php";
  require_once "../PHPMailer/SMTP.php";
  require_once "../PHPMailer/Exception.php";

  $mail = new PHPMailer();

  $sendersName = $_POST['name'];
  $sendersEmail = $_POST['email'];
  $message = $_POST['message'];
  $mailSubject = "More info";
  $receiversAddress = "noreply.livesl@gmail.com";
  $mailBody = '
  <html lang="en-US">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Reset Password Email Template</title>
        <meta name="description" content="Reset Password Email Template.">
        <style type="text/css">
            a:hover {text-decoration: underline !important;}
        </style>
    </head>

    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
        <!--100% body table-->
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
            style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
            <tr>
                <td>
                    <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                        align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 35px;">
                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">More Information</h1>
                                            <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                ' . $message . '
                                            </p>
                                            <p style="font-size: 14px;">
                                                - ' . $sendersName . ' -
                                            </p>
                                            <a href="mailto: ' . $sendersEmail . '"
                                                style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reply Now</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--/100% body table-->
    </body>
  </html>

  ';

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "noreply.livesl@gmail.com";
  $mail->Password = "JnDjBs7vbD2qEew";
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  //Email Settings
  $mail->setFrom($sendersEmail, $sendersName);
  $mail->addAddress($receiversAddress);
  $mail->Subject = $mailSubject;
  $mail->Body = $mailBody;
  $mail->isHTML(true);

  if ($mail->send()) {
    echo json_encode(['status' => '1', 'msg' => 'We will get back to you soon.']);
  } else {
    echo json_encode(['status' => '0', 'msg' => $mail->ErrorInfo]);
  }
} else {
  echo json_encode(['status' => '0', 'msg' => 'Executed Outside']);
}
