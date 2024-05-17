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
    <?php include 'includes/header2.php'; ?>
    <!-- header end -->

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area bg_img pb-160" data-overlay="8" data-background="assets/images/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2 class="title">Join Our Team</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>|</li>
                            <li>Join Our Team</li>
                        </ul>
                        <h1 class="back-title">Vancacy</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- our-expert area start -->
    <section id="admin" v-cloak class="our-expert-area bg-2 pt-100 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 text-center">
                    <div class="section-heading mb-70">
                        <h2 class="section-title shape">Join Our Experts</h2>
                        <p>Join our team and embark on a journey of growth, collaboration, and success.</p>
                    </div>
                </div>
            </div>
            <div v-for="jobs" class="row no-gutters expert-box-wrap">
                <div v-for="(item, index) in jobs" class="col-xl-6 col-lg-12">
                    <div class="single-expert-box">
                        <div class="expert-box-left">
                            <div class="thumb">
                                <img src="assets/images/faq-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name">{{item.name}}</h5>
                                <h5 class="name">{{item.location}}</h5>
                            </div>
                        </div>

                        <div class="expert-box-right">
                            <div class="content">
                                <p>J{{item.details}}
                                </p>
                                <div class="expert-box-buttons">
                                    <a href="#joinUs" class="site-btn white">Contact Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-expert area end -->

    <!-- contact area start -->
    <div id="admin" v-cloak class="contact-area pt-110 pb-110 bg_img" id="joinUs" data-overlay="94" data-background="assets/images/bg/contact-bg-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-buttons">
                        <ul class="nav text-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="appointment-tab" data-toggle="tab" href="#appointment" role="tab"
                                    aria-controls="appointment" aria-selected="true">Fill to Join Our Team</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
                                    <div class="contact-form">
                                        <form >
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" v-model="name" placeholder="Enter your name">
                                                        <span class="icon"><i class="fal fa-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" v-model="email" placeholder="Enter your email">
                                                        <span class="icon"><i class="fal fa-envelope"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="tel" v-model="phone" placeholder="Enter your phone number">
                                                        <span class="icon"><i class="fal fa-phone"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="tel" v-model="location" placeholder="Enter your Location">
                                                        <span class="icon"><i class="fal fa-map-marker"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" v-model="availabilty" placeholder="Enter your Availabilty">
                                                        <span class="icon"><i class="fal fa-calander"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select name="subject">
                                                            <option data-display="Select Department" v-model="job">Select Jobs</option>
                                                            <option value="1">Supported Living Care</option>
                                                            <option value="2">Travel Buddy</option>
                                                            <option value="3">Post-Incident Assistant Team</option>
                                                            <option value="4">Domicillary Care</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="file"  @change='uploadImage' placeholder="Upload Certificate">
                                                        <span class="icon"><i class="fal fa-upload"></i></span>
                                                        <small class="form-text text-muted">Upload your Certificate</small>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea v-model="message" placeholder="Your message"></textarea>
                                                        <span class="icon"><i class="fal fa-edit"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-4 text-center">
                                                    <button @click.prevent="RequestedBooking" class="site-btn red">Submit Request</button>
                                                </div>
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
    </div>
    <!-- contact area end -->


    <!-- footer start -->
    <?php include 'includes/footer.php'; ?>
    <!-- footer end -->

    <!--========= Footer Link =========-->
    <?php include 'includes/footer_link.php'; ?>

</body>

</html>