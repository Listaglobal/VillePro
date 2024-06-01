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
                                        <h4 class="card-title">All Admin</h4>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#verticalCenter">Add Admin</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div v-for="admins" class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Staff Image</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">EMail</th>
                                                    <th scope="col">Phone No</th>
                                                    <th scop="col">Level</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr v-for="(item, index) in admins">
                                                    <th scope="row">{{index + 1}}</th>
                                                    <td><img :src="baseUrl +'/assets/images/staff/'+item.profile_pic" alt="Admin Image" width="50" height="50"></td>
                                                    <td>{{item.fullname}}</td>
                                                    <td>{{item.email}}</td>
                                                    <td>{{item.phoneno}}</td>
                                                    <td v-if="item.level == 1">Super Admin</td>
                                                    <td v-if="item.level == 2">Admin</td>
                                                    <td>
                                                        <span v-if="item.status == 2" class="badge badge-danger"> Inactive</span>
                                                        <span v-if="item.status == 1" class="badge badge-success"> Active</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"  href="#" @click='item.id = itemDetails' data-toggle="modal" data-target="#exampleModalLong" >Edit Admin</a>
                                                                <a class="dropdown-item" v-if="item.status != 1" @click="changeAdminStatus(item.id, 1)" href="#">Active</a>
                                                                <a class="dropdown-item" v-if="item.status != 2" @click="changeAdminStatus(item.id, 2)" href="#">Deactivactive</a>
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

        <!-- Add modal  -->
        <div class="modal fade" id="verticalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticalCenterTitle">Add Admin</h5>
                        <button type="submit" class="close" id="_closedisco" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form @submit.prevent="addAdmin">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Admin FullName</label>
                                            <input type="text" v-model="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
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
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text" v-model="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Level</label>
                                            <select v-model="level" aria-label="Default select example">
                                                <option value="null">Select Level</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Admin</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Upload Image</label>
                                            <input type="file" @change='uploadImage' class="form-control" id="inputGroupFile01">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Add Admin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal  -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="itemDetails">
                    <div class="col-xl-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <form @submit.prevent="updateAdmin">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin FullName</label>
                                        <input type="text" v-model="itemDetails.fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" v-model="itemDetails.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" v-model="itemDetails.phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" v-model="itemDetails.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Level</label>
                                        <select v-model="itemDetails.level" aria-label="Default select example">
                                            <option value="null">Select Level</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Upload Image</label>
                                        <input type="file" @change='uploadImage' class="form-control" id="inputGroupFile01">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update Admin</button>
                                    </div>
                                </form>
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