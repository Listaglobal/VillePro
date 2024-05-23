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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Booking and Shift</h4>
                    <div class="table-responsive">
                      <table v-if="bookings" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Job</th>
                            <th>Location</th>
                            <th>Job Details</th>
                            <th>Admin Name</th>
                            <th>Availablity</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(item, index) in bookings">
                          <td>
                              <h6 class="mb-0">{{ item.name }}</h6>
                            </td>
                            <td>{{ item.details }}</td>
                            <td>{{ item.location }}</td>
                            <td>{{ item.fullname }}</td>
                            <td>{{ item.availablity }}</td>
                            <td>
                              <div class="badge badge-inverse-success"> Completed </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
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