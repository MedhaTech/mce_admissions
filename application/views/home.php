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
                        <a class="rn-btn" href="#">
                            <span>Login</span>
                        </a>
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
                                    <?php if($this->session->flashdata('status')) :?>

                                    <!-- SUCCESS -->
                                    <!-- <div class="row">
                                        <div class="col-md-12 text-center">
                                            <i class="far fa-check-circle fa-5x text-success"></i>
                                            <h6 class="text-success">Thanks for submission</h6>
                                        </div>
                                    </div> -->
                                    <!-- END SUCCESS -->
                                    <!-- <p><?php echo $this->session->flashdata('status'); ?></p> -->

                                    <?php endif; ?>

                                    <?php echo validation_errors(); ?>
                                    <?php echo form_open_multipart($action, 'class="user"'); ?>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h5 class="text-danger">B.E Admissions Open for 2024-25</h5>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Student Full Name (As per SSLC)</label>
                                                    <input type="text" class="form-control form-control-sm" id="name"
                                                        name="name" placeholder="Enter Student Name">
                                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Student Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="mobile"
                                                        name="mobile" placeholder="Enter Student Mobile">
                                                    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Student Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="email"
                                                        name="email" placeholder="Enter Student Email">
                                                </div>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_name" name="par_name"
                                                        placeholder="Enter Parent/Guardian Name*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_mobile" name="par_mobile"
                                                        placeholder="Enter Parent/Guardian Mobile">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label"> Parent/Guardian Email</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_email" name="par_email"
                                                        placeholder="Enter Parent/Guardian Email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">SSLC Percentage/Grade<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="sslc_grade" name="sslc_grade"
                                                        placeholder="Enter SSLC Percentage/Grade*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('sslc_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">PUC-I(10+1) Percentage/Grade<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="puc1_grade" name="puc1_grade"
                                                        placeholder="Enter PUC-I(10+1) Percentage/Grade*">
                                                    <span
                                                        class="text-danger"><?php echo form_error('puc1_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">PUC-II(10+2) Percentage/Grade</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="puc2_grade" name="puc2_grade"
                                                        placeholder="Enter PUC-II(10+2) Percentage/Grade*">
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
                                                        name="city" placeholder="Enter City">
                                                    <span class="text-danger"><?php echo form_error('city'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Sports/Cultural Activities<span
                                                            class="text-danger">*</span></label>
                                                    <?php $sports_options = array(" "=>"Select Sports","State"=>"State","National"=>"National","International"=>"International");
                                                            echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : 'sports', 'class="form-control form-control-sm" id="sports"'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('sports'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label">Aadhar Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="adhaar"
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
                                                             echo form_dropdown('category', $type_options, '', 'class="form-control input-xs" id="category"');
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
                                        <?php echo anchor('https://www.mcehassan.ac.in/home/Institute','Know More','class=" rbt-button  rn-button-style--2 btn_border btn-size-md btn-theme" target="_blank"'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="thumbnail">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/WoVaA_NXMCc?controls=0&rel=0" frameborder="0"
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
                                <h2 class="title">Eligibility Criteria</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="rn-accordion">
                                <div id="accordion">
                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingOne">
                                            <a href="#" class="btn" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">Eligibility Criteria
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">
                                                <ul class="list-style--1">
                                                    <li><i data-feather="check"></i>Matriculation with 60% marks, Sr.
                                                        Secondary (10+2) with minimum 70% (Aggregate) & minimum 60%
                                                        marks in PCM, Computer Science/PCB for Biotechnology.</li>
                                                    <li><i data-feather="check"></i>Minimum 50% marks in Maths
                                                    </li>
                                                    <li><i data-feather="check"></i>For Management Admissions: Students
                                                        have to take any one of the Entrance Examination</li>
                                                    <li><i data-feather="check"></i>Entrance Examination: KEA / COMED-K
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingTwo">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">Scholarship
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">
                                                <p>Right to Education is one of the fundamental rights of every Indian
                                                    citizen. MCE believes that money should not be a road
                                                    block for a student with innovative ideas in his mind and passion in
                                                    his heart. We extend scholarships and financial assistance to
                                                    meritorious students based on their academic achievements.</p>
                                                <p>A number of scholarships are offered to students depending on the
                                                    academic credentials and their achievements in sporting and cultural
                                                    arena. The University grants full to partial waiver on tuition fees
                                                    payable by the student.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingThree">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">Financial Assistance
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">
                                                Education Loan Assistance
                                                <p>MCE aims to support deserving/meritorious students in availing
                                                    financial assistance for pursuing their higher education. In order
                                                    to encourage students to take up higher education despite their
                                                    financial shortcomings, nowadays, most banks are providing
                                                    attractive loan facility to students.</p>

                                                <p>Students can avail loan from any bank. However, for the benefit of
                                                    its
                                                    students, MCE has tie-ups with the following banks: </p>
                                                <p>We help our students in speedy disposal of their loan applications
                                                    across the country. During June-August, a kiosk is set up inside the
                                                    Campus for the benefit of students seeking financial assistance
                                                    from the bank.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingFour">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">Are all Btech Programmes at Sharda
                                                University accredited?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingFour"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">
                                                A number of scholarships are offered to students depending on the
                                                academic credentials and their achievements in sporting and cultural
                                                arena. The University grants full to partial waiver on tuition fees
                                                payable by the student.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingFive">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">What is the admission procedure for the
                                                course?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFive"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">Admission procedure for UG/PG/Diploma programmes
                                                is as follows (I). Students can submit thier Application by paying
                                                Admission Fee either in Cash or through DD/Challan/Online.
                                                (II). Personal One-on-One Interview will be conducted at MCE Campus.
                                                (III). Successful applicants
                                                after verification of documents will be called for GD/PI at MCE.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingSix">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">Is there a dedicated Placement Cell at the
                                                MCE Campus?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingSix"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">The centralized Placement-Cell handles all
                                                placements activities. A large number of Engineering students desiring
                                                placement have been interviewed by visiting companies.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="rn-card">
                                        <div class="rn-card-header" id="headingSeven">
                                            <a href="#" class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">Does the University have any Policy for
                                                “Ragging”?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingSeven"
                                            data-bs-parent="#accordion">
                                            <div class="rn-card-body">MCE has zero tolerance towards any
                                                kind of ragging on campus. Ragging in any form is strictly prohibited.
                                                There is strong vigilance to ensure enforcement of the anti-ragging
                                                policy.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                </div>
                            </div>
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