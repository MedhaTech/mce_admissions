<body>
    <div class="main-page">

        <!-- Start Header -->
        <!-- Start Header -->
        <header class="header-area formobile-menu header-not-transparent black-logo-version small-logo color-black">
            <div class="header-wrapper" id="header-wrapper">
                <div class="header-left">
                    <div class="logo">
                        <a>
                            <img src="<?php echo base_url();?>themes/images/logo/MCE_logo.png" alt="MCE Logo">
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <nav class="mainmenunav d-lg-block navbar-example2">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu nav nav-pills onepagenav">
                            <li class="nav-item"><a class="nav-link" href="#programmes">Programmes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#eligibility">Eligibility</a></li>
                            <li class="nav-item"><a class="nav-link" href="#apply">How to Apply</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#testimonial">Testimonial</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                    <div class="header-btn">
                        <?php
                            echo anchor('student','<span>Login</span>','class="rn-btn"');
                        ?>
                    </div>
                    <!-- Start Humberger Menu  -->
                    <div class="humberger-menu d-block d-lg-none pl--20">
                        <span class="menutrigger text-white">
                            <i data-feather="menu"></i>
                        </span>
                    </div>
                    <!-- End Humberger Menu  -->
                    <!-- Start Close Menu  -->
                    <div class="close-menu d-block d-lg-none">
                        <span class="closeTrigger">
                            <i data-feather="x"></i>
                        </span>
                    </div>
                    <!-- End Close Menu  -->
                </div>
            </div>
        </header>

        <main class="page-wrapper">


            <!-- Start Slider Area  -->
            <div class="rn-slider-area ">

                <div class="slide slide-style-2 bg_overlay slider-paralax d-flex align-items-center justify-content-center paralx-slider parallax"
                    data-stellar-background-ratio="0.5"
                    style="background-image:url('themes/images/bg/bg-image-11.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="inner">
                                    <h2 class="text-white">Take the first step towards success: <span
                                            class="text-warning">admissions are currently open in MCE.</span></h2>
                                    <span class="text-white">Choose From 20+ Specializations</span>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="card p-4 bg-gray border">
                                    <!-- <?php if($this->session->flashdata('status')) :?> -->

                                    <!-- SUCCESS -->
                                    <!-- <div class="row">
                                        <div class="col-md-12 text-center">
                                            <i class="far fa-check-circle fa-5x text-success"></i>
                                            <h6 class="text-success">Thanks for submission</h6>
                                        </div>
                                    </div> -->
                                    <!-- END SUCCESS -->
                                    <!-- <p><?php echo $this->session->flashdata('status'); ?></p> -->

                                    <!-- <?php endif; ?> -->
                                    <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
                                        <?php echo $this->session->flashdata('message') ?>
                                    </div>
                                    <?php } ?>

                                    <!-- <?php echo validation_errors(); ?> -->
                                    <?php echo form_open_multipart($action, 'class="user"'); ?>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h5 class="text-danger">B.E Admissions Open for 2024-25</h5>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Student Full Name (As per SSLC)</label>
                                                    <input type="text" class="form-control form-control-sm" id="name"
                                                        value="<?php echo (set_value('name')) ? set_value('name') : $name; ?>"
                                                        name="name" placeholder="Enter Student Name">
                                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Student Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="mobile"
                                                        value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>"
                                                        name="mobile" placeholder="Enter Student Mobile">
                                                    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Email</label>
                                                    <input type="text" class="form-control form-control-sm" id="email"
                                                        value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>"
                                                        name="email" placeholder="Enter Email Id">
                                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_name"
                                                        value="<?php echo (set_value('par_name')) ? set_value('par_name') : $par_name; ?>"
                                                        name="par_name" placeholder="Enter Parent/Guardian Name*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_mobile"
                                                        value="<?php echo (set_value('par_mobile')) ? set_value('par_mobile') : $par_mobile; ?>"
                                                        name="par_mobile" placeholder="Enter Parent/Guardian Mobile">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Email</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_email"
                                                        value="<?php echo (set_value('par_email')) ? set_value('par_email') : $par_email; ?>"
                                                        name="par_email" placeholder="Enter Parent/Guardian Email">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">SSLC Percentage/Grade<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="sslc_grade"
                                                        value="<?php echo (set_value('sslc_grade')) ? set_value('sslc_grade') : $sslc_grade; ?>"
                                                        name="sslc_grade" placeholder="Enter SSLC Percentage/Grade*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('sslc_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">PUC-I(10+1) Percentage/Grade<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="puc1_grade"
                                                        value="<?php echo (set_value('puc1_grade')) ? set_value('puc1_grade') : $puc1_grade; ?>"
                                                        name="puc1_grade"
                                                        placeholder="Enter PUC-I(10+1) Percentage/Grade*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('puc1_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">PUC-II(10+2) Percentage/Grade</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="puc2_grade"
                                                        value="<?php echo (set_value('puc2_grade')) ? set_value('puc2_grade') : $puc2_grade; ?>"
                                                        name="puc2_grade"
                                                        placeholder="Enter PUC-II(10+2) Percentage/Grade*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('puc2_grade'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="course">Branch Preference-I<span
                                                            class="text-danger">*</span></label>
                                                    <?php 
                                                            echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control form-control-sm" id="course"'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="course">Branch Preference-II<span
                                                            class="text-danger">*</span></label>
                                                    <?php 
                                                            echo form_dropdown('course1', $course_options, (set_value('course1')) ? set_value('course1') : $course1, 'class="form-control form-control-sm" id="course1"'); 
                                                        ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('course1'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="course">Branch Preference-III<span
                                                            class="text-danger">*</span></label>
                                                    <?php 
                                                            echo form_dropdown('course2', $course_options, (set_value('course2')) ? set_value('course2') : $course2, 'class="form-control form-control-sm" id="course2"'); 
                                                        ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('course2'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="state">State<span class="text-danger">*</span></label>
                                                    <?php 
                                                            echo form_dropdown('state', $states, (set_value('state')) ? set_value('state') : $state, 'class="form-control form-control-sm" id="state"'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('state'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">City<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="city"
                                                        value="<?php echo (set_value('city')) ? set_value('city') : $city; ?>"
                                                        name="city" placeholder="Enter City">
                                                    <span class="text-danger"><?php echo form_error('city'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Sports/Cultural Activities<span
                                                            class="text-danger">*</span></label>
                                                    <?php $sports_options = array(" "=>"Select Sports","State Level"=>"State Level","National Level"=>"National Level","International Level"=>"International Level","Not Applicable"=>"Not Applicable");
                                                            echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : 'sports', 'class="form-control form-control-sm" id="sports"'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('sports'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Aadhar Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="adhaar"
                                                        value="<?php echo (set_value('adhaar')) ? set_value('adhaar') : $adhaar; ?>"
                                                        name="adhaar" placeholder="Enter Aadhar No">
                                                    <span class="text-danger"><?php echo form_error('adhaar'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <?php $gender_options = array(" "=>"Select Gender","Male"=>"Male","Female"=>"Female","Not Prefer to Say"=>"Not Prefer to Say");
                                                            echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control form-control-sm" id="gender"'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="category">Category<span
                                                            class="text-danger">*</span></label>
                                                    <?php
                                                             echo form_dropdown('category', $type_options, (set_value('category')) ? set_value('category') : $category, 'class="form-control form-control-sm" id="category"'); 
                                                        ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('category'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-8">
                                                    <input type="checkbox" class="form-check-input" id="applyCheck"
                                                        onclick="enable()">&nbsp;&nbsp;
                                                    <label class="form-check-label text-gray font--12" for="applyCheck">
                                                        I agree to receive information regarding my
                                                        enquiry*</label>
                                                </div>
                                                <div class="form-group col-4">
                                                    <button class="rn-button-style--2 btn_solid btn-size-sm"
                                                        type="submit" value="submit" name="submit" id="submit"
                                                        disabled="true">Apply
                                                        Now</button>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Start About Area  -->
            <div class="about-area about-with-experience-area pb--120 pt--120">
                <div class="about-wrapper">
                    <div class="container">
                        <div class="row row--35 align-items-center">

                            <div class="col-lg-6 col-md-12">
                                <div class="about-inner inner">
                                    <div class="section-title">
                                        <h2 class="title">About MCE</h2>
                                        <p class="description text-justify">Malnad College of Engineering (MCE), An
                                            Autonomous
                                            Institution,Afiliated by VTU, established in the year 1960, during the
                                            second 5 year plan, as a joint venture of Government of India, Government of
                                            Karnataka and the Malnad Technical Education Society, Hassan. The Malnad
                                            College of Engineering is now a
                                            reputed Engineering college in the country. The college has earned “ISTE
                                            Award” as
                                            one of the Best Engineering Colleges in the Country, in the year 2007. </p>
                                        <?php echo anchor('https://www.mcehassan.ac.in/home/Institute','Know More','class=" rbt-button  rn-button-style--2 mb-2 btn_border btn-size-md btn-theme" target="_blank"'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="thumbnail">
                                    <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/rV1EZaFJlCk?controls=0&rel=0" frameborder="0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start About Area  -->

            <!-- Start Portfolio Area  -->
            <div class="rn-portfolio-area rn-section-gap bg_color--5" id="programmes">
                <div class="portfolio-sacousel-inner pb--30">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-center mb--20 mb_sm--0 mb_md--0">
                                    <h2 class="title">Offering Programmes</h2>
                                    <p>Our proposed B.E programs offer a comprehensive understanding of diverse
                                        engineering domains, facilitating the development of personal networks through
                                        interdisciplinary collaborations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Portfolio Activation  -->
                    <div class="portfolio-slick-activation rn-slick-activation item-fluid rn-slick-dot mt--40 mt_sm--40"
                        data-slick-options='{
                                "spaceBetween": 15, 
                                "slidesToShow": 5, 
                                "slidesToScroll": 1, 
                                "arrows": true, 
                                "infinite": true,
                                "dots": true
                            }' data-slick-responsive='[
                            {"breakpoint":1600, "settings": {"slidesToShow": 4}},
                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                            {"breakpoint":890, "settings": {"slidesToShow": 3}},
                            {"breakpoint":590, "settings": {"slidesToShow": 2}},
                            {"breakpoint":480, "settings": {"slidesToShow": 1}}
                            ]'>

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-1"></div>
                                <div class="bg-blr-image image-1"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Civil-Engineering"
                                            target="_blank">Civil Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Civil-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-2"></div>
                                <div class="bg-blr-image image-2"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Mechanical-Engineering"
                                            target="_blank">Mechanical Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Mechanical-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-3"></div>
                                <div class="bg-blr-image image-3"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Electrical-and-Electronics-Engineering"
                                            target="_blank">Electrical and Electronics Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Electrical-and-Electronics-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-4"></div>
                                <div class="bg-blr-image image-4"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Electronics-and-Communication-Engineering"
                                            target="_blank">Electronics and Communication Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Electronics-and-Communication-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-5"></div>
                                <div class="bg-blr-image image-5"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Computer-Science-and-Engineering"
                                            target="_blank">Computer Science and Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Computer-Science-and-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <!-- <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-6"></div>
                                <div class="bg-blr-image image-6"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Electronics-and-Instrumentation-Engineering"
                                            target="_blank">Electronics and Instrumentation Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Electronics-and-Instrumentation-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-7"></div>
                                <div class="bg-blr-image image-7"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Information-Science-and-Engineering"
                                            target="_blank">Information Science and Engineering</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Information-Science-and-Engineering"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-8"></div>
                                <div class="bg-blr-image image-8"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Artificial-Intelligence-and-Machine-Learning"
                                            target="_blank">Artificial Intelligence and Machine Learning</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Artificial-Intelligence-and-Machine-Learning"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->

                        <!-- Start Single Portfolio  -->
                        <div class="portfolio">
                            <div class="thumbnail-inner">
                                <div class="thumbnail image-9"></div>
                                <div class="bg-blr-image image-9"></div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <p>B.E</p>
                                    <h4><a href="https://www.mcehassan.ac.in/home/Overview/Computer-Science-and-Business-Systems"
                                            target="_blank">Computer Science and Business Systems</a></h4>
                                    <div class="portfolio-button">
                                        <a class="rn-btn"
                                            href="https://www.mcehassan.ac.in/home/Overview/Computer-Science-and-Business-Systems"
                                            target="_blank">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Portfolio  -->


                    </div>
                    <!-- End Portfolio Activation  -->
                </div>
            </div>
            <!-- End Portfolio Area  -->

            <!-- Start Accordion Area  -->
            <div class="rn-accordion-area rn-section-gap" id="eligibility">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
                                <h2 class="title">Eligibility & Selection Criteria</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="h5 text-center">
                                <li>10+2 or equivalent (Central, State and Recognised International Boards)</li>
                                <li>MCE Selection Process + Personal Interview </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container mt--60">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
                                <h2 class="title">Admission Process Flow</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="service-item mt--30 col-lg-3 col-md-3 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 1</h3>
                                            <p>Complete Online Application</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div
                            class="service-item mt--30 col-lg-3 col-md-3 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 2</h3>
                                            <p>Selection /Interveiw Process</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div
                            class="service-item mt--30 col-lg-3 col-md-3 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 3</h3>
                                            <p>Programme Registration</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div
                            class="service-item mt--30 col-lg-3 col-md-3 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 4</h3>
                                            <p>Finish Admission Process</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Accordion Area  -->


            <!-- Start Contact Address Area  -->
            <div class="rn-contact-address-area rn-section-gap bg_color--5" id="contact">
                <div class="container">
                    <div class="row mt_dec--40">
                        <div class="section-title section-title--2 text-center">
                            <!-- <span class="sub-title">Contact us today</span> -->
                            <h3 class="title rbt-section-title"><span>Contact us for more information</span></h3>
                            <!-- <p>There are many variations of passages of Lorem Ipsum <br> available but the majority.</p> -->
                        </div>
                        <!-- Start Single Address  -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
                            <div class="rn-address">
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="inner">
                                    <h4 class="title">Phone Number</h4>
                                    <p><a href="tel:+08172245317">08172-245317</a></p>
                                    <!-- <p><a href="tel:+856325652984">+856 325 652 984</a></p> -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Address  -->

                        <!-- Start Single Address  -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
                            <div class="rn-address">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="inner">
                                    <h4 class="title">Email Address</h4>
                                    <p><a href="mailto:admissions@mcehassan.ac.in">admissions@mcehassan.ac.in</a></p>
                                    <!-- <p><a href="mailto:office@mcehassan.ac.in">office@mcehassan.ac.in</a></p> -->

                                </div>
                            </div>
                        </div>
                        <!-- End Single Address  -->

                        <!-- Start Single Address  -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
                            <div class="rn-address">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="inner">
                                    <h4 class="title">Location</h4>
                                    <p>No 21, Salagame Rd, Rangoli Halla, <br /> Hassan, Karnataka 573202</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Address  -->

                    </div>
                </div>
            </div>
            <!-- End Contact Address Area  -->