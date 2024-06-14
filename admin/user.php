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
                                            <h4 class="card-title">All Staff</h4>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#verticalCenter">Add Staff</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div v-for="staff" class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S/N</th>
                                                        <th scope="col">Staff Image</th>
                                                        <th scope="col">Full Name</th>
                                                        <th scope="col">EMail</th>
                                                        <th scope="col">Skills</th>
                                                        <th scope="col">Phone No</th>
                                                        <th scop="col">Location</th>
                                                        <th scope="col">Availability</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in staff">
                                                        <th scope="row">{{index + 1}}</th>
                                                        <td><img :src="baseUrl +'/assets/images/certificate/'+item.profile_pic" alt="item.fullname" width="50" height="50"></td>
                                                        <td>{{item.fullname}}</td>
                                                        <td>{{item.email}}</td>
                                                        <td>{{item.skills}}</td>
                                                        <td>{{item.phoneno}}</td>
                                                        <td>{{item.address}}</td>
                                                        <td>{{item.availablity}}</td>
                                                        <td>
                                                            <p class="text-right text-success" v-if="item.status == 1">Active</p>
                                                            <p class="text-right text-danger" v-if="item.status == 2">Inactive</p>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">Active</a>
                                                                    <a class="dropdown-item" href="#">Deactivactive</a>
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
                                                    <a v-if="currentPage > 1" class="page-item pagination-prev" @click.prevent="currentPage = parseInt(currentPage) - 1; getAllStaff(2)" href="javascrpit:void(0)">
                                                        Previous
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0">
                                                        <li class="active"><a class="page" href="#" :data-i="currentPage" :data-page="totalPage">{{currentPage}}</a></li>
                                                    </ul>
                                                    <a v-if="currentPage != totalPage" @click.prevent="currentPage = parseInt(currentPage) + parseInt(1); getAllStaff(2)" class="page-item pagination-next" href="javascrpit:void(0)">
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
                            <h5 class="modal-title" id="verticalCenterTitle">Add Experts</h5>
                            <button type="submit" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form @submit.prevent="addStaff">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" v-model="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <input type="text" v-model="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Location</label>
                                                <input type="text" v-model="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Location">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Skills</label>
                                                <input type="text" v-model="skills" class="form-control" id="exampleInputPassword1" placeholder="Skills">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Avaliability</label>
                                                <input type="text" v-model="availability" class="form-control" id="exampleInputPassword1" placeholder="Avaliability">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="text" v-model="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Upload Image</label>
                                                <input type="file" @change='uploadImage' class="form-control" id="inputGroupFile01">>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Add Experts</button>
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