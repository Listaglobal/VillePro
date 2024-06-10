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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="d-flex justify-content-between align-content-center card-body">
                    <h4 class="card-title">Request for Unassigned shift</h4>
                  </div>
                  
                    <div v-if="bookings" class="table-responsive">
                      <table class="table">
                        <thead>
                              <tr>
                              <th>Staff</th>
                              <th>Jobs</th>
                              <th>Date</th>
                              <th>Work Hour</th>
                              <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(item, index) in bookings" :key="index">
                                <td>Staff Unassigned</td>
                                <td>{{item.jobs_name}}</td>
                                <td>{{item.date}}</td>
                                <td>{{item.work_hour}}</td>
                                <td> 
                                  <div class="template-demo">
                                    <button class="btn btn-primary btn-rounded btn-fw mb-4" @click="requestShift(item.id)"> Request Shift </button>
                                  </div>
                                </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      <div>
                        <h1 v-if="!bookings">All Job Assigned</h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Request for Shift</h5>
                  <button type="button" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date from</label>
                      <input type="date" v-model="days" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date to</label>
                      <input type="date" v-model="daysto" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Work Hour</label>
                        <select v-model="work_hour" class="form-control" aria-label="Default select example">
                            <option value="null">Select Work Hour</option>
                            <option value="Full Day">Full Day</option>
                            <option value="Half Day">Half Day</option>
                        </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" @click.prevent="sendRequest()" class="btn btn-primary">Send Request</button>
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