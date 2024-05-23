<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="index.php">
            <img src="assets/images/logo.jpg" alt="logo" />
          </a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.php">
            <img src="assets/images/logo.jpg" alt="logo" />
          </a>
        </div>
        <ul class="nav">
          <li v-if="adminDetails" class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">{{adminDetails.fullname}}</span>
                <span class="font-weight-normal">{{adminDetails.skills}}</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booking.php">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Booking</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void();" @click="logout()">
              <i class="mdi mdi-switch menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>