<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
  <title>Sign in</title>
  <?php include_once '../components/loginRegHeader-links.php'; ?>

</head>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <nav class="
        navbar navbar-expand-lg
        position-absolute
        top-0
        z-index-3
        w-100
        shadow-none
        my-3
        navbar-transparent
        mt-4
      ">
    <div class="container">
      <a class="navbar-brand text-white d-none d-md-block" href="../../index.php" rel="tooltip" title="" data-placement="bottom" target="_blank">
        <img src="../../assets/img/CMR_long.png" style="width: 25%; height:20%;">
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a href="../../index.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" role="button" id="dropdownMenuPages10">
              <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
              Home
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('../../assets/img/custom/gallery 16.jpg')" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-body">
              <p style="text-align: center; font-size: 25px; font-weight: 600">
                Login
              </p>
              <form id="userLogin" role="form" class="text-start">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="userLogEmail" required />
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="userLogPassword" required />
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" style="background-color: #c68841">
                    Sign in
                  </button>
                </div>
                <p class="mt-4 text-sm text-center">
                  Don't have an account?
                  <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-12 col-md-6 my-auto">
            <div class="copyright text-center text-sm text-white text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , Copyright © 2021 | C.M.R Travels
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script>
    $("#userLogin").submit(function(event) {
      userLogin();
      event.preventDefault();
    });
  </script>
  <script src="../../assets/custom-scripts/userRegistration.js" type="text/javascript"></script>
  <script src="../../assets/custom-scripts/common.js" type="text/javascript"></script>

  <?php include_once '../components/loginRegFooter-links.php'; ?>
</body>

</html>