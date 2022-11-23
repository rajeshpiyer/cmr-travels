<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <title>C.M.R Travels</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-kit-pro.css?v=3.0.0" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

</head>

<body class="coworking bg-gray-200">
  <!-- Navbar -->
  <!-- Navbar Dark -->

  <nav class="
        navbar navbar-expand-lg navbar-dark
        bg-gradient-dark
        py-3
      " style="position: fixed;
        width: 100%;
        z-index: 100;">
    <div class="container">
      <a class="navbar-brand text-white" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank" style="font-size: 20px;
      font-weight: 600;
      padding: 0px;">
        <img src="assets/img/CMR_white.png" style="width: 10%; height: 10%;">&nbsp;&nbsp; C.M.R Travels
      </a>
      <a href="pages/user/sign-in.php" class="
            btn btn-sm
            bg-gradient-primary
            btn-round
            mb-0
            ms-auto
            d-lg-none d-block
          ">Book Now</a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
          <li class="nav-item mx-2">
            <a href="#Home" class="
                  nav-link
                  ps-2
                  d-flex
                  justify-content-between
                  cursor-pointer
                  align-items-center
                " role="button">
              Home
            </a>
          </li>
          <li class="nav-item mx-2">
            <a href="#about-us" class="
                  nav-link
                  ps-2
                  d-flex
                  justify-content-between
                  cursor-pointer
                  align-items-center
                " role="button">
              About us
            </a>
          </li>
          <li class="nav-item mx-2">
            <a href="#routes" class="
                  nav-link
                  ps-2
                  d-flex
                  justify-content-between
                  cursor-pointer
                  align-items-center
                " role="button">
              Routes
            </a>
          </li>
          <li class="nav-item mx-2">
            <a href="#contactUs" class="
                  nav-link
                  ps-2
                  d-flex
                  justify-content-between
                  cursor-pointer
                  align-items-center
                " role="button">
              Contact us
            </a>
          </li>
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuAccount" data-bs-toggle="dropdown" aria-expanded="false" role="button">
              <i class="material-icons opacity-6 me-2 text-md">contacts</i>
              Account
              <img src="assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-lg-2" />
            </a>
            <div class="
                  dropdown-menu dropdown-menu-animation dropdown-md
                  border-radius-xl
                  p-3
                  mt-0 mt-lg-3
                " aria-labelledby="dropdownMenuAccount">
              <div class="d-none d-lg-flex">
                <ul class="list-group w-100">
                  <li class="
                        nav-item
                        dropdown dropdown-hover dropdown-subitem
                        list-group-item
                        border-0
                        p-0
                      ">
                    <a href="pages/user/sign-in.php" class="
                          dropdown-item
                          border-radius-md
                          text-dark
                          ps-3
                          d-flex
                          align-items-center
                          mb-1
                        " id="dropdownSignIn">
                      <span>Sign In</span>
                    </a>
                  </li>
                  <li class="
                        nav-item
                        dropdown dropdown-hover dropdown-subitem
                        list-group-item
                        border-0
                        p-0
                      ">
                    <a href="pages/user/sign-up.php" class="
                          dropdown-item
                          border-radius-md
                          text-dark
                          ps-3
                          d-flex
                          align-items-center
                          mb-1
                        " id="dropdownSignUp">
                      <span>Sign Up</span>
                    </a>
                  </li>
                  <li class="
                        nav-item
                        dropdown dropdown-hover dropdown-subitem
                        list-group-item
                        border-0
                        p-0
                      ">
                    <a href="pages/admin/sign-in.php" class="
                          dropdown-item
                          border-radius-md
                          text-dark
                          ps-3
                          d-flex
                          align-items-center
                          mb-1
                        " id="dropdownSignUp">
                      <span>Admin</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="pages/user/sign-in.php" class="btn btn-sm bg-gradient-primary mb-0 me-1" role="button">Book Now</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 1 w/ text and image on right ------- -->
  <header>
    <div id="Home" class="page-header min-vh-75" style="background-image: url('assets/img/custom/gallery 16.jpg')" loading="lazy">
      <span class="mask bg-gradient-dark opacity-5"></span>
      <div class="container">
        <div class="row">
          <div class="
                col-lg-6 col-md-7
                d-flex
                justify-content-center
                text-md-start text-center
                flex-column
                mt-sm-0 mt-7
              ">
            <h1 class="text-white">C.M.R Travels</h1>
            <p class="lead pe-md-5 me-md-5 text-white opacity-8">
              Plan journey | Reserve bus seats | Reach destination
            </p>
            <div class="buttons">
              <a href="pages/user/sign-in.php">
                <button type="button" class="btn bg-gradient-primary mt-4">
                  Book Now
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">

    <section class="features-3 py-4" id="routes">
      <div class="container">
        <div class="row text-center justify-content-center">
          <div class="col-lg-6">
            <span class="badge rounded-pill badge-primary mb-2">Country Wide</span>
            <h2>ROUTES</h2>
            <p>we have 100+ registered buses running on 30 different routes.</p>
          </div>
        </div>
        <div class="row mt-5">

          <?php
          include_once 'controllers/dbConnection.php';

          $loadDataSql = "SELECT * FROM route INNER JOIN bus ON route.routeId = bus.busRouteId  LIMIT 4;";

          $loadDataResult = $con->query($loadDataSql);

          if ($loadDataResult->num_rows > 0) {
            // output data of each row
            while ($loadDataRow = $loadDataResult->fetch_assoc()) {

              $routeFrom = $loadDataRow["routeFrom"];
              $routeTo = $loadDataRow["routeTo"];
              $routeDTime = $loadDataRow["departureTime"];
              $routeATime = $loadDataRow["arrivalTime"];
              $routeBusNum = $loadDataRow["busNumber"];
              $busCondition = $loadDataRow["busType"];

              $format = 'H:i:s';
              $defaultDTime = DateTime::createFromFormat($format, $routeDTime);
              $newDTime = $defaultDTime->format('h:i a');

              $defaultATime = DateTime::createFromFormat($format, $routeATime);
              $newATime = $defaultATime->format('h:i a');

              echo '
                            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                              <div class="card bg-gradient-dark h-100">
                                <div class="card-header bg-transparent text-sm-start text-center pt-4 pb-3 px-4">
                                  <h5 class="mb-1 text-white">' . $routeFrom . ' - ' . $routeTo . '</h5>
                                  <p class="mb-3 text-sm text-white">' . $busCondition . '</p>
                                  <a href="pages/user/sign-in.php" class="btn btn-sm btn-white w-100 border-radius-md mt-4 mb-2">Book now</a>
                                </div>
                                <hr class="horizontal light my-0">
                                <div class="card-body">
                                  <div class="d-flex pb-3">
                                    <i class="material-icons my-auto text-white">done</i>
                                    <span class="text-sm text-white ps-3">' . $newDTime . ' From ' . $routeFrom . '</span>
                                  </div>

                                  <div class="d-flex pb-3">
                                    <i class="material-icons my-auto text-white">done</i>
                                    <span class="text-sm text-white ps-3">' . $newATime . ' To ' . $routeTo . '</span>
                                  </div>

                                  <div class="d-flex pb-3">
                                    <i class="material-icons my-auto text-white">done</i>
                                    <span class="text-sm text-white ps-3">Bus Number ' . $routeBusNum . '</span>
                                  </div>

                                </div>
                              </div>
                            </div>
                          ';
            }
          } else {
            echo '
                          <div class="col-lg-12 col-sm-12 mb-lg-0 mb-4">
                            <div class="card bg-gradient-dark h-20 pt-3 text-center">
                              <div class="row w-100 justify-content-center">
                                <div class="col-lg-1" style="padding-top:0.1rem;"><i class="material-icons my-auto text-white">close</i></div>
                                <div class="col-lg-2"><p class="text-white" style="font-weight: 200;"> No Routes to Show</p></div>
                              </div>
                            </div>
                          <div>
                          ';
          }
          ?>

        </div>
      </div>
    </section>

    <section class="py-4 position-relative" id="about-us" style="margin-top: 8rem;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10 mx-auto bg-gradient-dark border-radius-lg">
            <div class="row py-5">
              <div class="col-xl-4 col-md-6 px-5 position-relative">
                <img class="
                      img
                      border-radius-md
                      max-width-300
                      w-100
                      position-relative
                      z-index-2
                      mt-n7
                    " src="assets/img/custom/gallery 21.jpg" loading="lazy" alt="card image" />
              </div>
              <div class="
                    col-xl-4 col-md-5
                    z-index-2
                    position-relative
                    px-md-3 px-5
                    my-md-auto
                    mt-4
                  ">
                <i class="material-icons text-white text-5xl">format_quote</i>
                <p class="text-lg text-white">
                  Providing exceptional bus travel arrangements is the vision
                  that’s followed at C.M.S travels so one can make the right
                  travel arrangements for a great holiday. World largest
                  online bus ticketing platform has driven the country’s bus
                  booking journey over the past 15+ years through thousands of
                  bus operators and routes.
                </p>
                <hr class="vertical start-100 ms-n5 d-xl-block d-none" />
              </div>
              <div class="col-1"></div>
              <div class="col-xl-2 col-12 px-xl-0 px-5 my-xl-auto">
                <h3 class="text-white mt-xl-0 mt-5">1,679,700 +</h3>
                <p class="text-sm text-white opacity-8">
                  Drivers and customers around the world using our service.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-md-7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="text-center">
              <!-- <div class="
                    icon icon-md icon-shape
                    bg-gradient-primary
                    shadow-primary
                    text-center
                    border-radius-xl
                    mt-n4
                  ">
                <i class="material-icons opacity-10">payment</i>
              </div> -->
              <span class="badge rounded-pill badge-primary mb-2">Rule 01</span>
              <h5 class="mt-0">No Bus Cancellation</h5>
              <p class="mt-4">
                With this benefit, customers will receive a 25% refund on their bus ticket costs in case the bus that they need to travel in is delayed by 30 minutes.
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-7">
            <div class="text-center">
              <span class="badge rounded-pill badge-primary mb-2">Rule 02</span>
              <h5 class="mt-0">Bus On Time</h5>
              <p class="mt-4">
                With this benefit, customers will receive a 25% refund on their bus ticket costs in case the bus that they need to travel in is delayed by 30 minutes.
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-7">
            <div class="text-center">
              <span class="badge rounded-pill badge-primary mb-2">Rule 03</span>
              <h5 class="mt-0">Alternate Assurance</h5>
              <p class="mt-4">
                If a bus breaks down, the customers would have to wait for an alternate arrangement to be made by the bus operator. If this arrangement is not made within 6 hours from the time of the breakdown, the customers can get a 300% refund.
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-7">
            <div class="text-center">
              <span class="badge rounded-pill badge-primary mb-2">Rule 04</span>
              <h5 class="mt-0">Ez-Booking</h5>
              <p class="mt-4">
                Our customers can reserve their seat with in 30 seconds because we made our booking system very customer friendly design.
              </p>
            </div>
          </div>
        </div>

        <!-- <div class="row">

          <div class="col-md-4 ms-md-auto me-md-4">

          </div>
          <div class="col-md-4 me-md-auto ms-md-4">
            <div class="primary text-start border-radius-lg">
              <div class="
                    icon icon-md icon-shape
                    bg-gradient-primary
                    shadow-primary
                    text-center
                    border-radius-xl
                    mt-n4
                  ">
                <i class="material-icons opacity-10">access_alarms</i>
              </div>
              <h5 class="mt-3">Alternate Assurance</h5>
              <p>
                If a bus breaks down, the customers would have to wait for an
                alternate arrangement to be made by the bus operator. If this
                arrangement is not made within 6 hours from the time of the
                breakdown, the customers can get a 300% refund.
              </p>
            </div>
            <div class="primary text-start border-radius-lg mt-6">
              <div class="
                    icon icon-md icon-shape
                    bg-gradient-primary
                    shadow-primary
                    text-center
                    border-radius-xl
                    mt-n4
                  ">
                <i class="material-icons opacity-10">insights</i>
              </div>
              <h5 class="mt-3">Ez-Booking</h5>
              <p>
                Our customers can reserve their seat with in 30 seconds
                because we made our booking system very customer friendly
                design.
              </p>
            </div>
          </div>
        </div> -->
      </div>
    </section>
    <hr>

    <section class="py-7" id="contactUs">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 mx-auto text-center">
            <div class="ms-3 mb-md-5">
              <h3>Contact us</h3>
              <p>
                For further questions, please contact us using our contact form.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card card-plain">
              <form id="clientContact">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Full Name</label>
                        <input class="form-control" aria-label="Full Name" type="text" name="name" id="name">
                      </div>
                    </div>
                    <div class="col-md-6 ps-md-2">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                      </div>
                    </div>
                  </div>
                  <div class="input-group input-group-outline mb-4 mt-md-0 mt-4">
                    <label class="form-label" id="msgLabel">What can we help you?</label>
                    <textarea name="message" class="form-control" rows="6" name="message" id="message" onclick="clearElem('msgLabel')"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn bg-gradient-primary mt-4">Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- <section class="pb-5 position-relative bg-gradient-dark mx-n3" id="team">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-start mb-5 mt-5">
            <h3 class="text-white z-index-1 position-relative">
              MANAGEMENT TEAM
            </h3>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-4 z-index-2">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="assets/img/crew 3.jpg" alt="image" />
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Chameera Ranathunga</h5>
                    <h6 class="text-info">Manager</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-lg-4 mt-5 z-index-2">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="assets/img/crew 2.jpg" alt="image" />
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Shanika Ranathunga</h5>
                    <h6 class="text-info">Assistant Manager</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- -------- END PRE-FOOTER 8 w/ TEXT, BG IMAGE AND 2 BUTTONS ------- -->
  </div>
  <footer class="footer pt-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 ms-auto">
          <div>
            <h6 class="font-weight-bolder mb-1"">C.M.R Travels</h6>
            <p style=" font-size: 15px">
              Providing exceptional bus travel arrangements is the vision
              that’s followed at C.M.S travels so one can make the right
              travel arrangements for a great holiday. This is the World largest online
              bus ticketing platform.
              </p>
          </div>
          <div>
            <ul class=" d-flex flex-row ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" target="_blank">
                  <i class="fab fa-facebook text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" target="_blank">
                  <i class="fab fa-twitter text-lg opacity-8"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-5 col-5 mb-4">
          <div>
            <h6 class="text-sm">Company</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="#Home"> Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about-us"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#routes"> Routes </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactUs"> Contact Us </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-6 mb-4 me-auto">
          <div>
            <h6 class="text-sm">Contact us</h6>
            <div class="row pb-1">
              <div class="col-1" style="text-align: right;"><i class="fa fa-phone" style="font-size: 14px;"></i></div>
              <div class="col-5" style="font-size: 15px;">+94 713611973</div>
            </div>
            <div class="row pb-1">
              <div class="col-1" style="text-align: right;"><i class="fa fa-envelope" style="font-size: 14px;"></i></div>
              <div class="col-5" style="font-size: 15px;">cmrtravels@gmail.com</div>
            </div>
            <div class="row pb-1">
              <div class="col-1" style="text-align: right;"><i class="fa fa-address-book" style="font-size: 14px;"></i></div>
              <div class="col-5" style="font-size: 15px;">C M R Travels, Labuyaya, Kuliyapitiya</div>
            </div>

          </div>
        </div>
        <div class="col-12">
          <div class="text-center">
            <p class="text-dark my-4 text-sm font-weight-normal">
              Copyright © 2021 | C.M.R Travels
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/mattboldt/typed.js/ -->
  <script src="assets/js/plugins/typedjs.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="assets/custom-scripts/index.js" type="text/javascript"></script>
  <script src="assets/custom-scripts/common.js" type="text/javascript"></script>

  <script src="assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="assets/js/material-kit-pro.min.js?v=3.0.0" type="text/javascript"></script>

  <script>
    $("#clientContact").submit(function(event) {
      contactFormFun();
      event.preventDefault();
    });

    function clearElem(element) {
      document.getElementById(element).innerHTML = "";
    }
  </script>
</body>

</html>