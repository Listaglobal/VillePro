<!DOCTYPE html>
<html lang="en">


<head>
    <title>Dorchester Health Services Admin DashBoard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/img/logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <!-- begin app -->
    <div id="admin" v-cloak class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>

            <header class="app-header top-bar">
                <?php include('include/header.php'); ?>
            </header>

            <div class="app-container">
                <!-- begin app-nabar -->
                <?php include('include/sidebar.php'); ?>
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                    <div class="page-title mr-4 pr-4 border-right">
                                        <h1>Dashboard</h1>
                                    </div>
                                    <div class="breadcrumb-bar align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Index
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>

                                </div>
                                <!-- end page title -->
                            </div>
                        </div>

                        <div v-if="adminStat" class="row">
                            <div class="col-sm-12">
                                <div class="card card-statistics">
                                    <div class="row no-gutters">
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                                                <div class="d-flex m-b-10">
                                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Jobs</p>
                                                </div>
                                                <div class="d-block d-sm-flex h-100 align-items-center">
                                                    <div class="apexchart-wrapper">
                                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{adminStat.Jobs}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                                                <div class="d-flex m-b-10">
                                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Staff</p>
                                                </div>
                                                <div class="d-block d-sm-flex h-100 align-items-center">
                                                    <div class="apexchart-wrapper">
                                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{adminStat.staff}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                                                <div class="d-flex m-b-10">
                                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Booking Made</p>
                                                </div>
                                                <div class="d-block d-sm-flex h-100 align-items-center">
                                                    <div class="apexchart-wrapper">
                                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{adminStat.booking}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-12 m-b-30">
                                <div class="card card-statistics h-100 mb-0 apexchart-tool-force-top">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Recent Booking</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div v-for="bookings" class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">S/N</th>
                                                            <th scope="col">Staf Name</th>
                                                            <th scope="col">Staff Email</th>
                                                            <th scope="col">Phone Number</th>
                                                            <th scope="col">Availability</th>
                                                            <th scop="col">Job Title</th>
                                                            <th scop="col">Job Location</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in bookings">
                                                            <th scope="row">{{index + 1}}</th>
                                                            <td>{{item.staff_fullname}}</td>
                                                            <td>{{item.staff_email}}</td>
                                                            <td>{{item.staff_phoneno}}</td>
                                                            <td>{{item.date}}</td>
                                                            <td>{{item.days}}</td>
                                                            <td>{{item.jobs_name}}</td>
                                                            <td>{{item.jobs_details}}</td>
                                                            <td>
                                                                <p class="text-success" v-if="item.status == 1">Active</p>
                                                                <p class="text-danger" v-if="item.status == 2">Inactive</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="booking.php" class="text-left">View All Booking</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 m-b-30">
                                <div class="card card-statistics h-100 mb-0 apexchart-tool-force-top">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Recent Staff</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div v-for="staff" class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">S/N</th>
                                                            <th scope="col">Full Name</th>
                                                            <th scope="col">EMail</th>
                                                            <th scope="col">Skills</th>
                                                            <th scope="col">Phone No</th>
                                                            <th scop="col">Location</th>
                                                            <th scope="col">Availability</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in staff">
                                                            <th scope="row">{{index + 1}}</th>
                                                            <td>{{item.fullname}}</td>
                                                            <td>{{item.email}}</td>
                                                            <td>{{item.skills}}</td>
                                                            <td>{{item.phoneno}}</td>
                                                            <td>{{item.address}}</td>
                                                            <td>{{item.availablity}}</td>
                                                            <td>
                                                                <p class="text-success" v-if="item.status == 1">Active</p>
                                                                <p class="text-danger" v-if="item.status == 2">Inactive</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="user.php" class="text-right">View All Staff</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xxl-12 m-b-30">
                                <div class="card card-statistics h-100 mb-0 apexchart-tool-force-top">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">Recent Staff Time off</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div v-for="request" class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">S/N</th>
                                                            <th scope="col">Staff Name</th>
                                                            <th scope="col">Request Reason</th>
                                                            <th scope="col">Date From</th>
                                                            <th scope="col">Date To</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in request">
                                                            <th scope="row">{{index + 1}}</th>
                                                            <td>{{item.staff_fullname}}</td>
                                                            <td>{{item.reason}}</td>
                                                            <td>{{item.days}}</td>
                                                            <td>{{item.daysto}}</td>
                                                            <td>
                                                                <span v-if="item.status == 2" class="badge badge-success"> Approved</span>
                                                                <span v-if="item.status == 1" class="badge badge-primary"> Awaiting Approval</span>
                                                                <span v-if="item.status == 3" class="badge badge-danger"> Declined</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="staffRequest.php" class="text-right">View All Staff Time Out</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>

                <footer class="footer">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-left">
                            <p>&copy; Copyright 2024. All rights reserved.</p>
                        </div>

                    </div>
                </footer>
                <!-- end footer -->
            </div>
            <!-- end app-wrap -->
        </div>
        <!-- end app -->

        <?php include('include/footer_link.php'); ?>
</body>


</html>