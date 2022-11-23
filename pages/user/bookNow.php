<?php
// Start the session
session_start();
if (isset($_SESSION["user_status"]) && $_SESSION["user_status"] != null) {
} else {
  header("Location: sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Reserve</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <?php include_once '../components/header-links.php'; ?>
</head>

<body>

  <!-- loader -->
  <div class="loading-overlay">
    <lord-icon src="https://cdn.lordicon.com/dpinvufc.json" trigger="loop" colors="primary:#F5A953,secondary:#08a88a" style="width:100px;height:100px">
    </lord-icon>
  </div>
  <!-- End: loader -->

  <div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="../../assets/img/sidebar-6.jpg">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a class="simple-text logo-normal" style="font-weight: 500; margin-left: 1.7rem">
            C.M.R Travels
          </a>
        </div>
        <div class="user">
          <div class="photo" style="text-align: center">
            <i class="material-icons" style="font-size: 18px; margin-top: 0.4rem">person_outline</i>
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span><?= $_SESSION["user_fname"] . " " . $_SESSION["user_lname"] ?></span>
            </a>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="bookNow.php">
              <i class="material-icons" style="font-size: 30px">book_online</i>
              <p>Book Now</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myBookings.php">
              <i class="material-icons" style="font-size: 30px">class</i>
              <p>My Bookings</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buses.php">
              <i class="material-icons" style="font-size: 30px">directions_bus</i>
              <p>Buses</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="routes.php">
              <i class="material-icons" style="font-size: 30px">edit_road</i>
              <p>Routes</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="seats.php">
              <i class="material-icons" style="font-size: 30px">airline_seat_recline_normal</i>
              <p>Seats</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="
                    btn btn-warning btn-fill btn-round btn-icon
                    d-none d-lg-block
                  ">
                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Book Now</a>
          </div>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa fa-cog" style="font-size: 16px"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="font-size: 12px">
                  <a class="dropdown-item" href="profile.php">
                    <i class="fa fa fa-user" style="
                          font-size: 16px;
                          margin-top: 0.3rem;
                          margin-right: 1rem;
                        "></i>
                    Profile
                  </a>
                  <a class="dropdown-item" onclick="signOut()">
                    <i class="fa fa-sign-out" style="
                          font-size: 16px;
                          margin-top: 0.3rem;
                          margin-right: 1rem;
                        "></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">

            <div id="bookingForm" class="col-md-4 align-container-center">
              <form id="createBookingForm">

                <div class="card" id="firstCard">
                  <div class="card-header mt-3">
                    <h4 class="card-title text-center">Place a Reservation</h4>
                  </div>
                  <div class="card-body">
                    <input type="text" class="cs-hide" name="booking_passenger_NIC" id="booking_passenger_NIC" value="<?= $_SESSION["user_nic"] ?>">
                    <div class="form-group has-label">
                      <label>Route <star class="star">*</star></label>
                      <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_route_id" name="booking_route_id" onchange="onSelectLoad(this,'booking_bus')" required>
                        <option hidden>Select Route</option>
                        <?php
                        include_once '../../controllers/dbConnection.php';

                        $loadDataSql = "SELECT * FROM route";

                        $loadDataResult = $con->query($loadDataSql);

                        if ($loadDataResult->num_rows > 0) {
                          // output data of each row
                          while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                            $routeId = $loadDataRow["routeId"];
                            $routeTo = $loadDataRow["routeTo"];
                            $routeFrom = $loadDataRow["routeFrom"];

                            echo '
                              <option value="' . $routeId . '">' . $routeFrom . ' to ' . $routeTo . '</option>
                            ';
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group has-label">
                      <label>Bus <star class="star">*</star></label>
                      <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_bus" name="booking_bus" onchange="onSelectLoad(this,'booking_seat_id')" required>
                        <option hidden>---</option>
                      </select>
                    </div>
                    <div class="form-group has-label">
                      <label>Seat <star class="star">*</star></label>
                      <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_seat_id" name="booking_seat_id" required>
                        <option hidden>---</option>
                      </select>
                    </div>


                  </div>
                  <div class="card-footer text-center mb-4">
                    <input type="button" class="btn btn-warning btn-fill btn-wd" onclick="showHideDiv('secondCard', 1);showHideDiv('firstCard', 0);" value="Next">
                  </div>
                </div>

                <div class="card cs-hide" id="secondCard">
                  <div class="card-header mt-3">
                    <h4 class="card-title text-center">Place a Reservation</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group has-label">
                      <label>Date <star class="star">*</star></label>
                      <input type="text" class="form-control datepicker" placeholder="Date Picker Here" id="booking_date" name="booking_date" required>
                    </div>


                    <div class="form-check form-check-radio">
                      <label>Payment Method <star class="star">*</star></label><br>
                      <label class="form-check-label mt-1">
                        <input class="form-check-input" type="radio" name="payment" id="payment1" value="payment1" onclick="showHideDiv('cardDetails', 1)" required>
                        <span class="form-check-sign"></span>
                        Visa / Master Card
                      </label>
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="payment" id="payment2" value="payment2" onclick="showHideDiv('cardDetails', 0)">
                        <span class="form-check-sign"></span>
                        Cash
                      </label>
                    </div>

                    <div class="cs-hide" id="cardDetails">
                      <hr>
                      <div class="form-group has-label">
                        <label>Card Number <star class="star">*</star></label>
                        <input type="text" placeholder="Enter card number" class="form-control">
                      </div>
                      <div class="form-group has-label">
                        <label>CVV<star class="star">*</star></label>
                        <input type="text" placeholder="Enter cvv" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center mb-4">
                    <input type="button" class="btn btn-default btn-wd btn-back" onclick="showHideDiv('secondCard', 0);showHideDiv('firstCard', 1);" value="Back">
                    <button type="submit" class="btn btn-success btn-fill btn-wd">Reserve Now</button>
                  </div>
                </div>


              </form>
            </div>

            <div id="demoTicket" class="col-md-6 align-container-center cs-hide">
              <div class="card ">
                <div class="card-header mt-4">
                  <h4 class="card-title text-center">Your Ticket</h4>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-10 border-4 ticketDisplay">
                      <div class="row text-center mt-3 mb-1">
                        <div class="col-12">
                          <h3 class="mt-1 mb-0">TICKET</h3>
                        </div>
                        <div class="col-12">
                          <p class="tkt_num mb-1" id="demoBusNameId"> Bus Name 3 | #98867</p>
                        </div>
                      </div>
                      <div class="row text-center mb-3">
                        <div class="col-12">
                          <p class="mb-0 tktDetails" id="demoBusRoute">Gampaha - Ragama</p>
                          <p class="mb-1 mt-0">Depeture Time:<b id="demoDepature"> 10:50 am</b></p>
                          <p class="mb-1 mt-0">Bus Number:<b id="demoBusNum"> CAW2224</b></p>
                          <p class="mb-0 tktDetails" id="demoPrice" >Rs 500.00 /=</p>

                        </div>
                      </div>

                    </div>

                  </div>
                </div>
                <div class="card-footer text-center mb-4">
                  <button class="btn btn-warning btn-fill btn-wd" onclick="locationReload()">Back</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="container">
          <nav>
            <ul class="footer-menu">
              <li>
                <a href="bookNow.php"> Book Now </a>
              </li>
              <li>
                <a href="myBookings.php"> My bookings </a>
              </li>
              <li>
                <a href="buses.php"> Buses </a>
              </li>
              <li>
                <a href="routes.php"> Routes </a>
              </li>
              <li>
                <a href="seats.php"> Seats </a>
              </li>
            </ul>
            <p class="copyright text-center">
              Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              | C.M.R Travels
            </p>
          </nav>
        </div>
      </footer>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/custom-scripts/common.js" typ="text/javascript"></script>
<script src="../../assets/custom-scripts/booking.js" typ="text/javascript"></script>

<script>
  $("#createBookingForm").submit(function(event) {
    cerateUsrBookingFun();
    event.preventDefault();
  });
</script>

<?php include_once '../components/footer-links.php'; ?>

</html>