<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/header_link.php'; ?>
</head>

<body>

    <!-- preloader  -->
    <?php include 'includes/preloader.php'; ?>
    <!-- preloader end -->

    <!-- header start -->
    <?php include 'includes/header.php'; ?>
    <!-- header end -->

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area bg_img pb-160" data-overlay="8" data-background="assets/images/about.jpg">
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
                        <h3 class="text-center mb-60">Login From Here</h3>
                        <form action="#">
                            <label for="name">Email Address </label>
                            <input id="name" type="text" placeholder="Enter Username or Email address..." />
                            <label for="pass">Password </label>
                            <input id="pass" type="password" placeholder="Enter password..." />
                            <div class="login-action mb-20 fix">
                                <span class="log-rem f-left">
                                    <input id="remember" type="checkbox" />
                                    <label for="remember">Remember me!</label>
                                </span>
                            </div>
                            <button class="site-btn red w-100">Login Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <button class="site-btn w-100">Sign Up Here</button>
                        </form>
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
    
</body>

</html>
