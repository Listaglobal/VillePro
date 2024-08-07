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
                                        <h4 class="card-title">All Available Jobs</h4>
                                    </div>
                                    <div>
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
                                                        <p class="text-right text-success" v-if="item.status == 1">Active</p>
                                                        <p class="text-right text-danger" v-if="item.status == 2">Inactive</p>
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
                    </div>
                   
                </div>
            </footer>
        </div>

        <!-- modal  -->
        <div class="modal fade" id="verticalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticalCenterTitle">Add Jobs</h5>
                        <button type="submit" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <form @submit.prevent="addJobs">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" v-model="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Location of the job</label>
                                        <input type="text" v-model="details" class="form-control" id="exampleInputPassword1" placeholder="Location of the job">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Details</label>
                                        <input type="text" v-model="locations" class="form-control" id="exampleInputPassword1" placeholder="Details of the job">
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                                        <button type="submit" class="btn btn-success">Add jobs</button>
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