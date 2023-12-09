<?php
     session_start();
?>




<nav class="navbar navbar-expand-xl foi-navbar justify-content-between navbar-light sticky-top"
    style=" top:-0px !important; min-width: 100%; border-radius: 0px; padding-bottom: 10px;">
    <div class="container" style="padding:0px;">
    <div class="navbar-brand navbar_logo" href="index.php">
        <a href="index.php"><img src="assets/images/logo_iiita.png" id="logo_gleam" alt="IIITA Library"
                style="width: auto; max-height:80px; margin-top: 15px; object-fit:cover ; margin-left:12px;"></a>
    </div>


    <div class="collapse navbar-collapse" id="collapsibleNav">
        <ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0">

            <li class="nav-item nav-items active" style="font-size: 11px;">
                <a class="nav-link text-gray" href="./frontend/profile.php" style="font-weight: 600; ">Return Books<span
                        class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item nav-items dropdown" style="font-size: 11px;">
                <a class="nav-link text-gray dropdown-toggle" href="#" id="pagesMenu" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="font-weight: 600; ">Categories</a>
                <div class="dropdown-menu" aria-labelledby="pagesMenu">
                  <a class="dropdown-item" href="./frontend/login.php">Fiction</a>
                  <a class="dropdown-item" href="./frontend/login.php">Poems</a>
                  <a class="dropdown-item" href="./frontend/login.php">Science</a>
                  <a class="dropdown-item" href="./frontend/login.php">Computer Science</a>
                    <a class="dropdown-item" href="./frontend/login.php">Daily Readings</a>
                </div>
            </li>



            <li class="nav-item nav-items" style="font-size: 11px;">
                <a class="nav-link text-gray nav_schedule_e_meet" href="./frontend/profile.php" style="font-weight: 600; ">Book Now</a>
            </li>
            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)  { ?>
            <li class="nav-item nav-items mr-sm-2 mb-lg-0" style="margin-left: 40px!important;">
              <a class="btn nav-itmes" style="background-color:#D11D27; color:white; 
                                                      z-index: 100; font-size: 11px; padding: 9px;"
                  href="./frontend/profile.php">
                  <i class="bi bi-person-square"></i> Account
              </a>
          </li>
          <?php
                                         } else {
                                             ?>
          <li class="nav-item nav-items mr-sm-2 mb-lg-0" style="margin-left: 40px!important;">
              <a class="btn nav-items" style="background-color:#D11D27; color:white; 
                                                      z-index: 100; font-size: 13px; padding: 13px;"
                  href="./frontend/login.php">Login</a>
          </li>
          <?php } ?>
        </ul>
                                               ?>

                                        ?>


    </div>
                                        </div>
</nav>