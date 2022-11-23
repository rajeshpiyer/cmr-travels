<?php
// Start the session
session_start();
if (isset($_SESSION["admin_status"]) && $_SESSION["admin_status"] != null) {
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
  <title>Bookings</title>
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
              <span><?= $_SESSION["admin_name"] ?></span>
            </a>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons" style="font-size: 30px">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buses.php">
              <i class="material-icons" style="font-size: 30px">directions_bus</i>
              <p>Buses</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="passengers.php">
              <i class="material-icons" style="font-size: 30px">people_alt</i>
              <p>Passengers</p>
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
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <i class="material-icons" style="font-size: 30px">library_books</i>
              <p>Bookings</p>
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
            <a class="navbar-brand" href="#pablo"> Bookings</a>
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
            <div class="col-md-5">
              <h3 style="margin: 10px;">List Of Bookings</h3>
            </div>
            <div class="col-md-3">
              <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search" id="txt_search" onkeyup="sort_dives('txt_search', 'row_data')">
              </div>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success btn-wd" data-toggle="modal" data-target="#createBooking" style="width: 100%;"><span class="fa fa-plus-circle pr-3"></span>Create</button>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card bootstrap-table">
                <div class="card-body table-full-width">
                  <div class="bootstrap-table">
                    <div class="fixed-table-container">
                      <div class="fixed-table-body" style="overflow: hidden;">
                        <div class="fixed-table-loading" style="top: 41px">
                          Loading, please wait...
                        </div>
                        <table id="bootstrap-table" class="table table-hover">
                          <thead>
                            <tr>
                              <th data-field="name">
                                <div class="th-inner sortable both tbl-header">Booking Id</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th data-field="salary">
                                <div class="th-inner sortable both">Passenger</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th data-field="salary">
                                <div class="th-inner sortable both">Seat</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th data-field="salary">
                                <div class="th-inner sortable both">Route</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th data-field="country">
                                <div class="th-inner sortable both">Date</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th class="td-actions text-right" data-field="actions">
                                <div class="th-inner">Actions</div>
                                <div class="fht-cell"></div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            include_once '../../controllers/dbConnection.php';

                            $loadDataSql = "SELECT * FROM booking 
                            INNER JOIN
                            seat ON booking.seatId = seat.seatId
                            INNER JOIN
                            route ON booking.routeId = route.routeId
                            INNER JOIN passenger
                            ON booking.passengerNIC = passenger.nic;";

                            $loadDataResult = $con->query($loadDataSql);

                            if ($loadDataResult->num_rows > 0) {
                              // output data of each row
                              while ($loadDataRow = $loadDataResult->fetch_assoc()) {

                                $bookingId = $loadDataRow["id"];

                                $bookingPaNIC = $loadDataRow["passengerNIC"];
                                $bookingPaName = $loadDataRow["fname"];

                                $bookingSeatId = $loadDataRow["seatId"];
                                $bookingSeatName = $loadDataRow["seatNumber"];

                                $bookingRouteId = $loadDataRow["routeId"];
                                $bookingRouteFrom = $loadDataRow["routeFrom"];
                                $bookingRouteTo = $loadDataRow["routeTo"];

                                $bookingDate = $loadDataRow["date"];

                                echo '
                                
                                <tr class="row_data" data-index="0">
                                  <td class="tbl-data">' . $bookingId . '</td>
                                  <td>' . $bookingPaName . ' (' . $bookingPaNIC . ')</td>
                                  <td>' . $bookingSeatName . '</td>
                                  <td>' . $bookingRouteFrom . ' - ' . $bookingRouteTo . '</td>
                                  <td>' . $bookingDate . '</td>
                                  <td class="td-actions text-right">
                                    <a rel="tooltip" title="Edit" class="btn btn-link btn-warning table-action" data-toggle="modal" data-target="#editBooking" onclick="SetUpdateVal(\'' . $bookingId . '\', \'' . $bookingDate . '\')">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action" data-toggle="modal" data-target="#deleteBooking" onclick="setValueToDiv(\'' . $bookingId . '\', \'del_booking_id\')">
                                      <i class="fa fa-remove"></i>
                                    </a>
                                  </td>
                                </tr>

                                ';
                              }
                            } else {
                              echo '
                              <tr class="row_data" data-index="0">
                                <td colspan="6" style="text-align: center; background-color: #EFB25F; color: white;">
                                  <i class="fa fa-exclamation-circle"></i>&nbsp;  Now Record found
                                </td>
                                <td style="display: none"></td>
                              </tr>
                              ';
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
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
                <a href="buses.php"> Buses </a>
              </li>
              <li>
                <a href="passengers.php"> Passengers </a>
              </li>
              <li>
                <a href="routes.php"> Routes </a>
              </li>
              <li>
                <a href="seats.php"> Seats </a>
              </li>
              <li>
                <a href="bookings.php"> Bookings </a>
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

<?php include_once '../models/bookings/createBooking.php'; ?>
<?php include_once '../models/bookings/updateBooking.php'; ?>
<?php include_once '../models/bookings/deleteBooking.php'; ?>

<?php include_once '../components/footer-links.php'; ?>

</html>