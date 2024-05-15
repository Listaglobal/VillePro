<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header_link.php' ?>
</head>

<body>
    <div id="admin" v-cloak class="container-scroller">
        <!-- Header Start -->
        <?php include 'includes/header.php' ?>
        <!-- Header End  -->
        <div class="container-fluid page-body-wrapper">

            <!-- sidebar Start -->
            <?php include 'includes/sidebar.php' ?>
            <!-- Sibar End  -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Hello Johnson</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Jobs Available</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th> S/N </th>
                                                <th> First name </th>
                                                <th> Progress </th>
                                                <th> Amount </th>
                                                <th> Deadline </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1</td>
                                                <td> Herman Beck </td>
                                                <td> Herman Beck </td>
                                                <td> $ 77.99 </td>
                                                <td> May 15, 2015 </td>
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

    <?php include 'includes/footer_link.php' ?>
</body>

</html>