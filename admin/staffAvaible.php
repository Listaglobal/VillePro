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
                                        <h4 class="card-title">All Staff Available Request</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div v-for="request" class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Staff Name</th>
                                                    <th scope="col">Date From</th>
                                                    <th scope="col">Date To</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr v-for="(item, index) in request">
                                                    <th scope="row">{{index + 1}}</th>
                                                    <td>{{item.staff_fullname}}</td>
                                                    <td>{{item.days}}</td>
                                                    <td>{{item.daysto}}</td>
                                                    <td>
                                                        <span v-if="item.status == 2" class="badge badge-success"> Approved</span>
                                                        <span v-if="item.status == 1" class="badge badge-primary"> Awaiting Approval</span>
                                                        <span v-if="item.status == 3" class="badge badge-danger"> Declined</span>
                                                        
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a v-if="item.status != 2" @click="changeRequestStatus(item.id, 2)" class="dropdown-item" href="#">Approve</a>
                                                                <a v-if="item.status != 3" @click="changeRequestStatus(item.id, 3)" class="dropdown-item" href="#">Declined</a>
                                                            </div>
                                                        </div>
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