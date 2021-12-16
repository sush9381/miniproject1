<?php require('includes/head.php');

?>
    <section class="banner">

        <!-- banner text -->
        <div class="container">
            <div class="banner_text_wthree_pvt">
                <h3 class="home-banner-w3">In which sports you are interested in</h3>

                <div class="row">
                    <div class="col-lg-4">
                        <form action="controllers/home.php" method="post">
                            <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon"
                                 name="event" required>
                                    <option value="">Choose...</option>
                                    <option value="1">Badminton</option>
                                    <option value="2">Cricket</option>
                                    <option value="3">Football</option>
                                    <option value="4">Others</option>
                                </select>
                                <div class="input-group-append">
                                    <input type="submit" class="btn bg-theme" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //banner text -->
        
    </section>
    <!-- //banner -->
    
    <!-- services -->
    <section class="bg-services position-relative align-w3" id="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-bg-color">
                        <div class="wthree_pvt_title mb-3">
                            <h4 class="w3pvt-title">what we provide
                            </h4>
                            <span class="sub-title">EFFICIENT REGISTRATION SYSTEM</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 service-title my-4">
                                <h4 class="home-title text-theme">Efficient Online Registration</h4>
                                <p class="sec-4">We will be providing online registration of the events which were
                                    available offline earlier. It will be easy for the user to register it while sitting
                                    at home.
                                </p>
                            </div>
                            <div class="col-md-6 service-title my-md-4">
                                <h4 class="home-title text-theme">Venue and Timings</h4>
                                <p class="sec-4"> We will be proving the venue and the exact timing of the event so that
                                user is able to attend the event on time and at the proper place.
                                </p>
                            </div>
                            <div class="col-md-6 service-title mt-4">
                                <h4 class="home-title text-theme">Certificate Distribution</h4>
                                <p class="sec-4">We will be distributing certificates online to the users who
                                    registered through our website.
                                </p>
                            </div>
                            <div class="col-md-6 service-title mt-4">
                                <h4 class="home-title text-theme">Reminders</h4>
                                <p class="sec-4">User are provided with the reminders of the timing and venue of the event
                                    one day before the event. 
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <a href="about.php" class="btn w3ls-btn">view more</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- //services -->
    <?php require('includes/foot.php');
?>
