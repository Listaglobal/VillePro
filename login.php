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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->

        <!-- footer start -->
        <?php include 'includes/footer.php'; ?>
        <!-- footer end -->

        <!--========= Footer Link =========-->
        <?php include 'includes/footer_link.php'; ?>
    </div>
</body>

</html>