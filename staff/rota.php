<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php include 'includes/header_link.php'; ?>
    
  </head>
  <style>
    [v-cloak] {
      display: none;
    }
  </style>
  <body>
    <div id="user" v-cloak class="container-scroller">
      <?php include 'includes/sidebar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'includes/header.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Check out Your Rota for the Month </h3>
            </div>
            <div class="card"></div>
              <div v-if="bookings" class="row">
                <div v-for="(item, index) in bookings" class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                  <div class="card bg-warning">
                    <div class="card-body px-3 py-4">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                          <p class="mb-0 color-card-head">{{item.days}}</p>
                          <h2 class="text-white"> {{item.staff_fullname}} - <span class="h5">{{item.work_hour}}</span>
                          </h2>
                        </div>
                      </div>
                      <h6 class="text-white">{{item.date}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="!bookings" class="card bg-primary">
                <div class="card-body px-3 py-4">
                  <div class="d-flex justify-content-between align-items-start">
                      <h2 class="text-white"> No rota for this Month</h2>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'includes/footer_link.php'; ?>
  </body>
</html>