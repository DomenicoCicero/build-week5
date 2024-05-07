<?php

$searchVisible = false;

?>
<nav
 class="navbar navbar-expand-lg bg-dark"
        data-bs-theme="dark"
        style="background-color: #221f1f !important"
      >
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/progetto-netflix-php/build-week5/homepage.php"
            ><img src="assets/logo.png" style="width: 100px; height: 55px"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fw-bold" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">TV Shows</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">Recently Added</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">My List</a>
              </li>
            </ul>
            <div class="d-flex align-items-center">
              <i class="bi bi-search icons" onclick="<?= $searchVisible = !$searchVisible ?>"></i>
              <div id="kids" class="fw-bold">KIDS</div>
              <i class="bi bi-bell icons"></i>
              <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle icons"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" style="background-color: white;">
                            <li><a class="dropdown-item" href="http://localhost/progetto-netflix-php/build-week5/logout.php" style="color: black;">Esci</a></li>
                        </ul>
                    </div>
              <!-- <a href="http://localhost/progetto-netflix-php/build-week5/logout.php"><i class="bi bi-person-circle icons"></i></a> -->
            </div>
          </div>
        </div>
      </nav>