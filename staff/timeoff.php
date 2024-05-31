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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Profile</th>
                        <th>VatNo.</th>
                        <th>Created</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Jacob</td>
                        <td>53275531</td>
                        <td>12 May 2017</td>
                        <td>
                          <label class="badge badge-danger">Pending</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Messsy</td>
                        <td>53275532</td>
                        <td>15 May 2017</td>
                        <td>
                          <label class="badge badge-warning">In progress</label>
                        </td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>53275533</td>
                        <td>14 May 2017</td>
                        <td>
                          <label class="badge badge-info">Fixed</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>53275534</td>
                        <td>16 May 2017</td>
                        <td>
                          <label class="badge badge-success">Completed</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td>20 May 2017</td>
                        <td>
                          <label class="badge badge-warning">In progress</label>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Request Time Off</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Date</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Reason for request</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include 'includes/footer_link.php'; ?>
</body>

</html>