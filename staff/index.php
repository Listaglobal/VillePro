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
              <h3 class="mb-0"> Hi, welcome back! </h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Job</p>
                            <h2 class="text-white"> 30 </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Margin</p>
                            <h2 class="text-white">300</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Orders</p>
                            <h2 class="text-white"> 17</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Affiliate</p>
                            <h2 class="text-white">238</h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
              <div  class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Booking History</h4>
                    <div class="table-responsive">
                      <table v-if="bookings" class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>Jobs</th>
                            <th>Location</th>
                            <th>Job Details</th>
                            <th>Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(item, index) in bookings">
                          <td>
                              <h6 class="mb-0">{{ item.jobs_name }}</h6>
                            </td>
                            <td>{{ item.jobs_details }}</td>
                            <td>{{ item.days }}</td>
                            <td>{{ item.admin_fullname }}</td>
                            <td>{{ item.date }}</td>
                            <td>
                              <div class="badge badge-inverse-success"> Completed </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                    <a class="text-black mt-3 d-block pl-4" href="booking.php">
                      <span class="font-weight-medium h6">View All Booking History</span>
                      <i class="mdi mdi-chevron-right"></i></a>
                  </div>
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