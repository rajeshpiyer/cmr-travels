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
  <title>Dashboard</title>
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
              <span style="font-size: 16px;
              font-weight: 600;
              text-transform: uppercase;">
                <?= $_SESSION["admin_name"] ?></span>
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
            <a class="navbar-brand" href="#pablo"> Dashboard</a>
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
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning">
                        <i class="fa fa-list text-warning"></i>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="numbers" style="margin-top: 0.5rem">
                        <p class="card-category">Bookings</p>
                        <?php
                        include_once '../../controllers/dbConnection.php';

                        $loadDataSql = "SELECT COUNT(id) AS idCount FROM booking;";

                        $loadDataResult = $con->query($loadDataSql);

                        if ($loadDataResult->num_rows > 0) {
                          // output data of each row
                          while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                            echo '<h4 class="card-title">' . $loadDataRow["idCount"] . '</h4>';
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                  <div class="stats">
                    <i class="fa fa-clock-o"></i> Current
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning">
                        <i class="fa fa-bus text-success"></i>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="numbers" style="margin-top: 0.5rem">
                        <p class="card-category">Buses</p>
                        <?php
                        include_once '../../controllers/dbConnection.php';

                        $loadDataSql = "SELECT COUNT(busNumber) AS idCount FROM bus;";

                        $loadDataResult = $con->query($loadDataSql);

                        if ($loadDataResult->num_rows > 0) {
                          // output data of each row
                          while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                            echo '<h4 class="card-title">' . $loadDataRow["idCount"] . '</h4>';
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                  <div class="stats">
                    <i class="fa fa-calendar-o"></i> Registered
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning">
                        <i class="fa fa-road text-danger"></i>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="numbers" style="margin-top: 0.5rem">
                        <p class="card-category">Routes</p>
                        <?php
                        include_once '../../controllers/dbConnection.php';

                        $loadDataSql = "SELECT COUNT(routeId) AS idCount FROM route;";

                        $loadDataResult = $con->query($loadDataSql);

                        if ($loadDataResult->num_rows > 0) {
                          // output data of each row
                          while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                            echo '<h4 class="card-title">' . $loadDataRow["idCount"] . '</h4>';
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                  <div class="stats">
                    <i class="fa fa-clock-o"></i> Current
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning">
                        <i class="fa fa-users text-primary"></i>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="numbers" style="margin-top: 0.5rem">
                        <p class="card-category">Passengers</p>
                        <?php
                        include_once '../../controllers/dbConnection.php';

                        $loadDataSql = "SELECT COUNT(nic) AS idCount FROM passenger;";

                        $loadDataResult = $con->query($loadDataSql);

                        if ($loadDataResult->num_rows > 0) {
                          // output data of each row
                          while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                            echo '<h4 class="card-title">' . $loadDataRow["idCount"] . '</h4>';
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                  <div class="stats">
                    <i class="fa fa-clock-o"></i> Current
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                <div class="card-header">
                  <h4 class="card-title">Bookings</h4>
                  <p class="card-category">today</p>
                </div>
                <div class="card-body table-full-width table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Booking Id</th>
                        <th>Passenger NIC</th>
                        <th>Seat Id</th>
                        <th>Route Id</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      include_once '../../controllers/dbConnection.php';

                      $loadDataSql = "SELECT * FROM booking";

                      $loadDataResult = $con->query($loadDataSql);

                      if ($loadDataResult->num_rows > 0) {
                        // output data of each row
                        while ($loadDataRow = $loadDataResult->fetch_assoc()) {

                          $bookingId = $loadDataRow["id"];
                          $bookingPId = $loadDataRow["passengerNIC"];
                          $bookingSeatId = $loadDataRow["seatId"];
                          $bookingRouteId = $loadDataRow["routeId"];
                          $bookingDate = $loadDataRow["date"];

                          echo '
                                
                                <tr class="row_data" data-index="0">
                                  <td class="tbl-data">' . $bookingId . '</td>
                                  <td>' . $bookingPId . '</td>
                                  <td>' . $bookingSeatId . '</td>
                                  <td>' . $bookingRouteId . '</td>
                                  <td>' . $bookingDate . '</td>
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
<script src="../../assets/custom-scripts/common.js" typ="text/javascript"></script>
<?php include_once '../components/footer-links.php'; ?>

</html>