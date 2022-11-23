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
  <title>Buses</title>
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
            <a class="navbar-brand" href="#pablo"> Buses</a>
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
            <div class="col-md-6">
              <div class="card stacked-form">
                <div class="card-header ">
                  <h4 class="card-title">Update Profile</h4>
                </div>
                <div class="card-body ">

                  <form id="userUpDetails">
                    <div class="form-group">
                      <label>NIC</label>
                      <input type="text" placeholder="Enter first name" class="form-control" id="profileNIC" name="profileNIC" onchange="checkNIC()" value="<?= $_SESSION["user_nic"] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" placeholder="Enter first name" class="form-control" name="profileFName" value="<?= $_SESSION["user_fname"] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" placeholder="Enter last name" class="form-control" name="profileLName" value="<?= $_SESSION["user_lname"] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="profile_gender" name="profileGender" required>
                        <option hidden>Select gender</option>

                        <?php
                        if ($_SESSION["user_gender"] == "male") {
                          echo '
                            <option selected value="male">male</option>
                            <option value="female">female</option>
                          ';
                        } else if ($_SESSION["user_gender"] == "female") {
                          echo '
                            <option value="male">male</option>
                            <option selected value="female">female</option>
                          ';
                        } else {
                          echo '
                            <option value="male">male</option>
                            <option value="female">female</option>
                          ';
                        }
                        ?>


                      </select>
                    </div>
                    <div class="form-group">
                      <label>Phone number</label>
                      <input type="number" placeholder="Enter phone number" class="form-control" name="profilePhone" value="<?= $_SESSION["user_phone"] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" placeholder="Enter email" class="form-control" name="profileEmail" value="<?= $_SESSION["user_email"] ?>" required>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-success" style="width: 20%; min-width:100px">Update</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card stacked-form">
                <div class="card-header ">
                  <h4 class="card-title">Update password</h4>
                </div>
                <div class="card-body ">
                  <form id="userUpPass">
                    <div class="form-group">
                      <label>New password</label>
                      <input type="password" placeholder="Enter new password" class="form-control" name="profileNewPass" required>
                    </div>
                    <div class="form-group">
                      <label>Re-enter new password</label>
                      <input type="password" placeholder="Reenter new Password" class="form-control" name="profileRePass" required>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-success" style="width: 20%; min-width:100px">Update</button>
                    </div>
                  </form>
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
<script>
  $("#userUpDetails").submit(function(event) {
    userUpDetails();
    event.preventDefault();
  });
  $("#userUpPass").submit(function(event) {
    userUpPass();
    event.preventDefault();
  });
</script>
<script src="../../assets/custom-scripts/common.js" typ="text/javascript"></script>
<script src="../../assets/custom-scripts/profile.js" typ="text/javascript"></script>

<?php include_once '../components/footer-links.php'; ?>

</html>