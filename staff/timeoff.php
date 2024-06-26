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
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title">Request Time Off</h4>
                  </div>
                  <div class="template-demo">
                    <button type="button" class="btn btn-primary btn-rounded btn-fw mb-4" data-toggle="modal" data-target="#exampleModalCenter"> Request Time </button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table v-if="request" class="table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Request Date From</th>
                        <th>Request Date to</th>
                        <th>Reason</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in request">
                        <td>{{index + 1}}</td>
                        <td>{{item.days}}</td>
                        <td>{{item.daysto}}</td>
                        <td>{{item.reason}}</td>
                        <td>
                          <label v-if="item.status == 1" class="badge badge-primary">Awaiting Approval</label>
                          <label v-if="item.status == 2" class="badge badge-success">Approved</label>
                          <label v-if="item.status == 3" class="badge badge-danger">Request Declined</label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div>
                    <h1 v-if="!request">No Request Yet</h1>
                  </div>
                </div>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Request Time Off</h5>
            <button type="button" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Date From</label>
                <input type="date" v-model="days" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Date to</label>
                <input type="date" v-model="daysto" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Reason for request</label>
                <textarea class="form-control" v-model="reason"  id="exampleFormControlTextarea1" rows="3"></textarea>
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
  <?php include 'includes/footer_link.php'; ?>
</body>

</html>