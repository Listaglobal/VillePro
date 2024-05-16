<!DOCTYPE html>
<html lang="en">


<head>
    <title>Dorchester Health Services</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/logo.jpg">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
    <!-- app style -->
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
            <!-- header -->
            <header class="app-header top-bar">
                <?php include('include/header.php'); ?>
            </header>
            <!-- begin app-container -->
            <div class="app-container">
                <?php include('include/sidebar.php'); ?>
                <div class="app-main" id="main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h4 class="card-title">All Available Jobs</h4>
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#verticalCenter">Add Jobs</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div v-for="jobs" class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Location Of the Job</th>
                                                    <th scope="col">Details</th>
                                                    <th scop="col">Added By</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr v-for="(item, index) in jobs">
                                                    <th scope="row">{{index + 1}}</th>
                                                    <td>{{item.name}}</td>
                                                    <td>{{item.location}}</td>
                                                    <td>{{item.details}}</td>
                                                    <td>{{item.fullname}}</td>
                                                    <td>
                                                        <p class="text-right text-success" v-if="item.status = 1">Completed</p>
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
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <!-- <p>&copy; Copyright 2024. All rights reserved.</p> -->
                    </div>
                   
                </div>
            </footer>
        </div>

        <!-- modal  -->
        <!-- Vertical Center Modal -->
        <div class="modal fade" id="verticalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Add jobs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer_link.php'); ?>
    
</body>


</html>