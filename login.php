<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/header_link.php'; ?>
</head>

<body>
    <div id="admin" v-cloak>
        
        <!-- header start -->
        <?php include 'includes/header2.php'; ?>
        <!-- header end -->

        <!-- breadcrumb area start -->
        <section class="breadcrumb-area bg_img pb-160" data-overlay="8" data-background="https://suttoninhomeseniorcare.com/elder-care/wp-content/uploads/2018/08/senior-caregiver-1000x576.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-content">
                            <h2 class="title">Login</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>|</li>
                                <li>Login</li>
                            </ul>
                            <h1 class="back-title">LOGIN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- login Area Strat-->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Login From Here As Admin</h3>
                            <form @submit.prevent="Login">
                                <label for="name">Email Address </label>
                                    <input id="name" type="text" v-model="email" placeholder="Enter Email address..." />
                                <label for="pass">Password </label>
                                    <input id="pass" type="password" v-model="password" placeholder="Enter password..." />
                                <button class="site-btn red w-100" type="submit">Login Now</button>
                            </form>
                            <div class="login-action mt-20 fix">
                                <span class="forgot-login f-right">
                                    <a href="staffLogin.php">Are you a Staff, Login here!</a>
                                </span>
                            </div>
                            <div class="login-action mt-20 fix" data-toggle="modal" data-target="#exampleModalLong">
                                <span class="forgot-login f-left">
                                    <a href="javascript:void(0)">Create a Super Admin</a>
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Admin Name</label> -->
                        <select class="form-control">
                            <option>Admin</option>
                            <option>Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Admin Image</label>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Admin</button>
                </div>
                </div>
            </div>
        </div>

        <!-- footer start -->
        <?php include 'includes/footer.php'; ?>
        <!-- footer end -->

        <!--========= Footer Link =========-->
        <?php include 'includes/footer_link.php'; ?>
    </div>
</body>

</html>