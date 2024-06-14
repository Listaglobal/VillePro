<!DOCTYPE html>
<html lang="en">


<head>
    <title>Dorchester Health Services</title>
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
    <div id="admin" v-cloak class="app">
        <div class="app-wrap">
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
                <?php include('include/sidebar.php'); ?>
                <div class="app-main" id="main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="card-heading">
                                            <h4 class="card-title">All Booking</h4>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#verticalCenter">Add Booking</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div v-for="bookings" class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S/N</th>
                                                        <th scope="col">Staf Name</th>
                                                        <th scope="col">Staff Email</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Availability</th>
                                                        <th scope="col">Work Hour</th>
                                                        <th scope="col">Day</th>
                                                        <th scop="col">Job Title</th>
                                                        <th scop="col">Job Location</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in bookings">
                                                        <th scope="row">{{index + 1}}</th>
                                                        <td>{{item.staff_fullname}}</td>
                                                        <td>{{item.staff_email}}</td>
                                                        <td>{{item.staff_phoneno}}</td>
                                                        <td>{{item.date}}</td>
                                                        <td>{{item.work_hour}}</td>
                                                        <td>{{item.days}}</td>
                                                        <td>{{item.jobs_name}}</td>
                                                        <td>{{item.jobs_details}}</td>
                                                        <td>
                                                            <p class="text-success" v-if="item.status == 1">Active</p>
                                                            <p class="text-danger" v-if="item.status == 2">Inactive</p>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a v-if="item.status != 1" @click="changeBookingStatus(item.id, 1)" class="dropdown-item" href="#">Approve</a>
                                                                    <a v-if="item.status != 2" @click="changeBookingStatus(item.id, 2)" class="dropdown-item" href="#">Declined</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <div class="d-flex justify-content-end">
                                                <div class="pagination-wrap hstack gap-2">
                                                    <a v-if="currentPage == 1" class="page-item pagination-prev disabled" href="javascrpit:void(0)">
                                                        Previous
                                                    </a>
                                                    <a v-if="currentPage > 1" class="page-item pagination-prev" @click.prevent="currentPage = parseInt(currentPage) - 1; getAllBooking(2)" href="javascrpit:void(0)">
                                                        Previous
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0">
                                                        <li class="active"><a class="page" href="#" :data-i="currentPage" :data-page="totalPage">{{currentPage}}</a></li>
                                                    </ul>
                                                    <a v-if="currentPage != totalPage" @click.prevent="currentPage = parseInt(currentPage) + parseInt(1); getAllBooking(2)" class="page-item pagination-next" href="javascrpit:void(0)">
                                                        Next
                                                    </a>
                                                    <a v-if="currentPage == totalPage" class="page-item pagination-next disabled" href="javascrpit:void(0)">
                                                        Next
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-left">
                        </div>

                    </div>
                </footer>
            </div>

            <!-- modal  -->
            <div class="modal fade" id="verticalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verticalCenterTitle">Schedule Shift</h5>
                            <button type="submit" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form @submit.prevent="requestShift">
                                            <div class="datepicker-form mb-3">
                                                <div class="card-heading">
                                                    <label class="card-title">Job Date {{date}}</label>
                                                </div>
                                                <div class='input-group'>
                                                    <input v-model="date" class="form-control" type='date' placeholder="mm/dd/yyyy" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Day</label>
                                                <select v-model="days" class="form-control" aria-label="Default select example">
                                                    <option value="null">Select Days</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Work Hour</label>
                                                <select v-model="work_hour" class="form-control" aria-label="Default select example">
                                                    <option value="null">Select Work Hour</option>
                                                    <option value="Full Day">Full Day</option>
                                                    <option value="Half Day">Half Day</option>

                                                </select>
                                            </div>
                                            <div v-if="jobs" class="form-group">
                                                <label for="exampleInputEmail1">Job</label>
                                                <select v-model="jobs_id" class="form-control" aria-label="Default select example">
                                                    <option value="null">Select Jobs Available</option>
                                                    <option v-for="(item, index) in jobs" :value="item.trackid">{{item.name}}</option>
                                                </select>
                                            </div>

                                            <div v-if="staff" class="form-group">
                                                <label for="exampleInputPassword1">Staff</label>
                                                <select v-model="user_id" class="form-control" aria-label="Default select example">
                                                    <option value=" ">Select Staff Available</option>
                                                    <option v-for="(item, index) in staff" :value="item.staff_id">{{item.fullname}}</option>

                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                                                <button type="submit" class="btn btn-success">Schedule Shift</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include('include/footer_link.php'); ?>

</body>


</html>