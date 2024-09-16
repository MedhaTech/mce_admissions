<body>
    <div class="main-page">

        <!-- Start Header -->
        <!-- Start Header -->
        <div class="bg_color--9">
            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                <p class="small text-white">To secure a seat for B.E. Admissions 2024-25 under the Management Quota,
                    completing the below inquiry form is a mandatory.</p>
            </marquee>
        </div>
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
                            <li class="nav-item"><a class="nav-link" href="#fees">Fees</a></li>
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
                            <div class="col-md-4 col-sm-12 mb--100">
                                <div class="inner">
                                    <h2 class="text-white">Take the first step towards success: <span
                                            class="text-warning">admissions are currently open in MCE.</span></h2>
                                    <!-- <span class="text-white">Choose From 20+ Specializations</span> -->
                                    <!-- <a class="rn-button-style--2 btn_solid" href="contact.html" tabindex="0">Contact Us</a> -->
                                    <?php
                                        echo anchor('student','<span>Login</span>','class="rn-button-style--2 btn_solid"');
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="card p-4 bg-gray border">

                                    <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
                                        <?php echo $this->session->flashdata('message') ?>
                                    </div>
                                    <?php } ?>

                                    <!-- <?php echo validation_errors(); ?> -->
                                    <?php echo form_open_multipart($action, 'class="user"'); ?>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h5 class="text-danger">B.E Admissions Open for 2024-25 <span
                                                    class="h6 text-primary">(for management quota seats fill
                                                    details carefully)</span></h5>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Student Full Name (As per SSLC)<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="name"
                                                        value="<?php echo (set_value('name')) ? set_value('name') : $name; ?>"
                                                        name="name" placeholder="Enter Student Name" required>
                                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Student Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="mobile"
                                                        maxlength="10" minlength="10"
                                                        value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>"
                                                        name="mobile" placeholder="Enter Student Mobile" required>
                                                    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="email"
                                                        value="<?php echo (set_value('email')) ? set_value('email') : $email; ?>"
                                                        name="email" placeholder="Enter Email ID" required>
                                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13"> Parent/Guardian Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_name"
                                                        value="<?php echo (set_value('par_name')) ? set_value('par_name') : $par_name; ?>"
                                                        name="par_name" placeholder="Enter Parent/Guardian Name*" required>
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_name'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13"> Parent/Guardian Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_mobile" maxlength="10" minlength="10"
                                                        value="<?php echo (set_value('par_mobile')) ? set_value('par_mobile') : $par_mobile; ?>"
                                                        name="par_mobile" placeholder="Enter Parent/Guardian Mobile" required>
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_mobile'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13"> Parent/Guardian Email</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="par_email"
                                                        value="<?php echo (set_value('par_email')) ? set_value('par_email') : $par_email; ?>"
                                                        name="par_email" placeholder="Enter Parent/Guardian Email">
                                                    <span
                                                        class="text-danger"><?php echo form_error('par_email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-12">
                                                    <label class="label font-13">SSLC Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="sslc_grade"
                                                        value="<?php echo (set_value('sslc_grade')) ? set_value('sslc_grade') : $sslc_grade; ?>"
                                                        name="sslc_grade" placeholder="Enter SSLC Percentage" required>
                                                    <span
                                                        class="text-danger"><?php echo form_error('sslc_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12">
                                                    <label class="label font-13">Admission Based on<span
                                                            class="text-danger">*</span></label>
                                                    <?php $admission_options = array(" "=>"Select Admission Based On","PUC"=>"PUC","DIPLOMA"=>"DIPLOMA","GTTC"=>"GT & TC"); 
                                                            echo form_dropdown('admission_based', $admission_options, (set_value('admission_based')) ? set_value('admission_based') : $admission_based , 'class="form-control form-control-sm" id="admission_based" required'); 
                                                    ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('admission_based'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row" id="pucFields">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">PUC-I(10+1) Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="puc1_grade"
                                                        value="<?php echo (set_value('puc1_grade')) ? set_value('puc1_grade') : $puc1_grade; ?>"
                                                        name="puc1_grade" placeholder="Enter PUC-I(10+1) Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('puc1_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">PUC-II(10+2) Percentage</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="puc2_grade"
                                                        value="<?php echo (set_value('puc2_grade')) ? set_value('puc2_grade') : $puc2_grade; ?>"
                                                        name="puc2_grade" placeholder="Enter PUC-II(10+2) Percentage">
                                                    <span
                                                        class="text-danger"><?php echo form_error('puc2_grade'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row" id="diplomaFields">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">DIPLOMA-I Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="diploma1_grade"
                                                        value="<?php echo (set_value('diploma1_grade')) ? set_value('diploma1_grade') : $diploma1_grade; ?>"
                                                        name="diploma1_grade" placeholder="Enter DIPLOMA-I Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('diploma1_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">DIPLOMA-II Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="diploma2_grade"
                                                        value="<?php echo (set_value('diploma2_grade')) ? set_value('diploma2_grade') : $diploma2_grade; ?>"
                                                        name="diploma2_grade" placeholder="Enter DIPLOMA-II Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('diploma2_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">DIPLOMA-III Percentage</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="diploma3_grade"
                                                        value="<?php echo (set_value('diploma3_grade')) ? set_value('diploma3_grade') : $diploma3_grade; ?>"
                                                        name="diploma3_grade" placeholder="Enter DIPLOMA-III Percentage">
                                                    <span
                                                        class="text-danger"><?php echo form_error('diploma3_grade'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row" id="gttcFields">
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label class="label font-13">GT & TC-I Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="gttc1_grade"
                                                        value="<?php echo (set_value('gttc1_grade')) ? set_value('gttc1_grade') : $gttc1_grade; ?>"
                                                        name="gttc1_grade" placeholder="Enter GT & TC-I Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('gttc1_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label class="label font-13">GT & TC-II Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="gttc2_grade"
                                                        value="<?php echo (set_value('gttc2_grade')) ? set_value('gttc2_grade') : $gttc2_grade; ?>"
                                                        name="gttc2_grade" placeholder="Enter GT & TC-II Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('gttc2_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label class="label font-13">GT & TC-III Percentage<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="gttc3_grade"
                                                        value="<?php echo (set_value('gttc3_grade')) ? set_value('gttc3_grade') : $gttc3_grade; ?>"
                                                        name="gttc3_grade" placeholder="Enter GT & TC-III Percentage"
                                                       >
                                                    <span
                                                        class="text-danger"><?php echo form_error('gttc3_grade'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label class="label font-13">GT & TC-IV Percentage</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm percentage-input"
                                                        id="gttc4_grade"
                                                        value="<?php echo (set_value('gttc4_grade')) ? set_value('gttc4_grade') : $gttc4_grade; ?>"
                                                        name="gttc4_grade" placeholder="Enter GT & TC-IV Percentage">
                                                    <span
                                                        class="text-danger"><?php echo form_error('gttc4_grade'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Branch Preference-I<span
                                                            class="text-danger">*</span></label>
                                                    <?php echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control form-control-sm" id="course" required'); ?>
                                                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Branch Preference-II<span
                                                            class="text-danger">*</span></label>
                                                    <?php 
                                                            echo form_dropdown('course1', $course_options, (set_value('course1')) ? set_value('course1') : $course1, 'class="form-control form-control-sm" id="course1" required'); 
                                                        ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('course1'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Branch Preference-III<span
                                                            class="text-danger">*</span></label>
                                                    <?php  echo form_dropdown('course2', $course_options, (set_value('course2')) ? set_value('course2') : $course2, 'class="form-control form-control-sm" id="course2" required'); ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('course2'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">State<span
                                                            class="text-danger">*</span></label>
                                                    <?php echo form_dropdown('state', $states, (set_value('state')) ? set_value('state') : $state, 'class="form-control form-control-sm" id="state" required'); ?>
                                                    <span class="text-danger"><?php echo form_error('state'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">City<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="city"
                                                        value="<?php echo (set_value('city')) ? set_value('city') : $city; ?>"
                                                        name="city" placeholder="Enter City" required>
                                                    <span class="text-danger"><?php echo form_error('city'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Sports/Cultural Activities<span
                                                            class="text-danger">*</span></label>
                                                    <?php $sports_options = array(" "=>"Select Sports","State Level"=>"State Level","National Level"=>"National Level","International Level"=>"International Level","Not Applicable"=>"Not Applicable");
                                                            echo form_dropdown('sports', $sports_options, (set_value('sports')) ? set_value('sports') : 'sports', 'class="form-control form-control-sm" id="sports" required'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('sports'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Aadhaar Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" id="aadhaar"
                                                        maxlength="12" minlength="12"
                                                        value="<?php echo (set_value('aadhaar')) ? set_value('aadhaar') : $aadhaar; ?>"
                                                        name="aadhaar" placeholder="Enter Aadhaar No" required>
                                                    <span
                                                        class="text-danger"><?php echo form_error('aadhaar'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <?php $gender_options = array(" "=>"Select Gender","Male"=>"Male","Female"=>"Female","Not Prefer to Say"=>"Not Prefer to Say");
                                                            echo form_dropdown('gender', $gender_options, (set_value('gender')) ? set_value('gender') : 'gender', 'class="form-control form-control-sm" id="gender" required'); 
                                                        ?>
                                                    <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <label class="label font-13">Category<span
                                                            class="text-danger">*</span></label>
                                                    <?php echo form_dropdown('category', $type_options, (set_value('category')) ? set_value('category') : $category, 'class="form-control form-control-sm" id="category" required'); ?>
                                                    <span
                                                        class="text-danger"><?php echo form_error('category'); ?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- <div class="form-check col-md-8 mb-3">
                                                    <input type="checkbox" class="form-check-input" id="acknowledge">
                                                    <label class="form-check-label" for="acknowledge">
                                                        I acknowledge that the information provided is accurate.
                                                    </label>
                                                </div> -->
                                                <div class="form-check col-md-8">
                                                    <div class="form-group ml-4">
                                                        <input type="checkbox" class="form-check-input" id="acknowledge">
                                                        <label class="form-check-label text-gray" for="acknowledge">
                                                            I agree to receive information regarding my
                                                            enquiry*</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="submit" class="btn btn-danger btn_solid"
                                                        id="submitBtn" disabled>Submit</button>
                                                    <!-- <button class="rn-button-style--2 btn_solid btn-size-sm"
                                                        type="submit" value="submit" name="submit" id="submit"
                                                        disabled="true">Submit</button> -->

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
            <div class="about-area about-with-experience-area pb--120 pt--120" id="about">
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
                                            target="_blank">Computer Science and Engineering (Artificial Intelligence
                                            and Machine Learning)</a></h4>
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
                                            target="_blank">Computer Science and Business Systems (TCS Sponsored
                                            Program)</a></h4>
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
            <div class="rn-accordion-area rn-section-gap" id="fees">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
                                <h2 class="title">Fee Structure</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>The management has decided the fee structure for 1st year B.E. for the year 2024-25 : <a
                                    href="assets/FeeStructure2024.pdf" target="_blank" class="text-danger">Click
                                    Here to know more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Accordion Area  -->

            <!-- Start Accordion Area  -->
            <div class="rn-accordion-area rn-section-gap bg_color--5" id="eligibility">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
                                <h2 class="title">Eligibility & Selection Criteria</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>10+2 or equivalent (Central, State and Recognised International Boards)</p>
                            <p>MCE Selection Process + Personal Interview </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Accordion Area  -->

            <!-- Start Accordion Area  -->
            <div class="rn-accordion-area rn-section-gap" id="apply">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
                                <h2 class="title">Admission Process Flow</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="service-item mt--30 col-lg-4 col-md-4 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 1</h3>
                                            <p>Complete Online Enquiry</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div
                            class="service-item mt--30 col-lg-4 col-md-4 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 2</h3>
                                            <p>Programme Registration</p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div
                            class="service-item mt--30 col-lg-4 col-md-4 col-sm-6 col-12 elementor-repeater-item-ce062f3">
                            <div class="single-service service__style--2 bg-color-gray "> <a href="#">
                                    <div class="service">
                                        <div class="icon"> <i class="fa fa-edit"></i> </div>
                                        <div class="content">
                                            <h3 class="title">STEP 3</h3>
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
                                <!-- <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div> -->
                                <div class="inner">
                                    <!-- <h4 class="title">MTES-Office</h4>
                                    <p><a href="tel:+08172245317">08172-268371</a></p> -->
                                    <p><b>MTES-Office</b> <a href="tel:+08172268371">08172-268371</a></p>
                                    <p><b>Principal's Office</b> <a href="tel:+08172245317">08172-245317</a></p>
                                    <p><b>Dean Student Affairs</b> <a href="tel:+9449689093">9449689093</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Address  -->

                        <!-- Start Single Address  -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
                            <div class="rn-address">
                                <!-- <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div> -->
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
                                <!-- <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div> -->
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

            <!-- Modal -->
            <div class="modal fade" id="autoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="exampleModalLabel">Welcome</h5> -->
                            <button type="button" class="close" data-dismiss="modal" id="customCloseButton"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <!-- Image inside the modal -->
                            <img src="<?= base_url('assets/img/Admission_doc_ (1).jpg') ?>" alt="Modal Image"
                                class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                id="customCloseButton1">Close</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <!-- <script>
$(document).ready(function() {
    // Show the modal when the page loads
    $('#autoModal').modal('show');

    // Automatically close the modal after 5 seconds (50000 milliseconds)
    setTimeout(function() {
        $('#autoModal').modal('hide');
    }, 50000);
});
</script> -->

    <!-- <script>
$(document).ready(function() {
    // Show the modal when the page loads
    $('#autoModal').modal('show');

    // Close the modal when the custom button is clicked
    $('#customCloseButton').on('click', function() {
        $('#autoModal').modal('hide');
    });
    $('#customCloseButton1').on('click', function() {
        $('#autoModal').modal('hide');
    });
});
</script> -->

    <script>
    $(document).ready(function() {
        // Show the modal when the page loads
        // $('#autoModal').modal('show');

        // const numberInput = document.getElementById('sslc_grade');
        // const numberInput1 = document.getElementById('puc1_grade');
        const inputs = document.querySelectorAll('.percentage-input');
        inputs.forEach(input => {
            input.addEventListener('keypress', function(e) {
                const char = String.fromCharCode(e.which);
                const value = input.value + char;

                // Allow digits and decimal point
                if (!/[0-9.]/.test(char) || (char === '.' && input.value.includes('.'))) {
                    e.preventDefault();
                }

                // Prevent entry if value will exceed the range or decimal format
                if (parseFloat(value) > 100 || parseFloat(value) < 1) {
                    e.preventDefault();
                }
            });

            input.addEventListener('input', function() {
                let value = input.value;

                // Format input to one decimal place
                if (value.includes('.')) {
                    const [integerPart, decimalPart] = value.split('.');
                    if (decimalPart.length > 1) {
                        value = `${integerPart}.${decimalPart.slice(0, 1)}`;
                    }
                }

                // Prevent values outside the range
                if (isNaN(parseFloat(value))) {
                    value = '';
                } else if (parseFloat(value) > 100) {
                    value = '100.0';
                } else if (parseFloat(value) < 1 && value !== "") {
                    value = '1.0';
                }

                // Update the input value
                input.value = value;
            });
        });

        // numberInput.addEventListener('keypress', function(e) {
        //     const char = String.fromCharCode(e.which);
        //     const value = numberInput.value + char;

        //     // Allow only numeric characters or a single decimal point
        //     if (!/[0-9.]/.test(char) || (char === '.' && numberInput.value.includes('.'))) {
        //         e.preventDefault();
        //     }

        //     // Allow input only if the result is between 1 and 100 and has at most one decimal place
        //     if (parseFloat(value) > 100 || parseFloat(value) < 1 || /^\d+\.\d{2,}$/.test(value)) {
        //         e.preventDefault();
        //     }
        // });

        // numberInput.addEventListener('input', function() {
        //     const value = parseFloat(numberInput.value);

        //     // Prevent input values above 100 or below 1
        //     if (value > 100) {
        //         numberInput.value = '100';
        //     } else if (value < 1 && numberInput.value !== "") {
        //         numberInput.value = '1';
        //     }

        //     // Limit to one decimal place
        //     if (numberInput.value.includes('.')) {
        //         const parts = numberInput.value.split('.');
        //         if (parts[1].length > 1) {
        //             numberInput.value = parts[0] + '.' + parts[1].slice(0, 1);
        //         }
        //     }
        // });

        // Hide the page scrollbar when the modal is open
        $('#autoModal').on('shown.bs.modal', function() {
            $('body').css('overflow', 'hidden');
        });

        // Restore the page scrollbar when the modal is closed
        $('#autoModal').on('hidden.bs.modal', function() {
            $('body').css('overflow', 'auto');
        });

        // Close the modal when the custom button is clicked
        $('#customCloseButton, #customCloseButton1').on('click', function() {
            $('#autoModal').modal('hide');
        });


        $("#pucFields").hide();
        $("#diplomaFields").hide();
        $("#gttcFields").hide();
        $("#admission_based").change(function() {
            if ($("#admission_based").val() == "PUC") {
                $("#pucFields").show();
                $("#diplomaFields").hide();
                $("#gttcFields").hide();
            } else if ($("#admission_based").val() == "DIPLOMA") {
                $("#pucFields").hide();
                $("#diplomaFields").show();
                $("#gttcFields").hide();
            } else if ($("#admission_based").val() == "GTTC") {
                $("#pucFields").hide();
                $("#diplomaFields").hide();
                $("#gttcFields").show();
            } else {
                $("#pucFields").hide();
                $("#diplomaFields").hide();
                $("#gttcFields").hide();
            }
        })

        $('input[required], select[required], #acknowledge').on('input change', function() {
            checkFormValidity();
        });

        function checkFormValidity() {
            let allFilled = true;
            // Check if all required fields are filled
            $('input[required], select[required]').each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                    return false; // Break the loop if a field is empty
                }
            });

            var qualification = document.getElementById('admission_based').value;
            if(qualification == "PUC"){
                if (!document.getElementById('puc1_grade').value) allFilled = false;
                // if (!document.getElementById('puc2_grade').value) allFilled = false;
            }

            if(qualification == "DIPLOMA"){
                if (!document.getElementById('diploma1_grade').value) allFilled = false;
                if (!document.getElementById('diploma2_grade').value) allFilled = false;
                // if (!document.getElementById('diploma3_grade').value) allFilled = false;
            }
            
            if(qualification == "GTTC"){
                if (!document.getElementById('gttc1_grade').value) allFilled = false;
                if (!document.getElementById('gttc2_grade').value) allFilled = false;
                if (!document.getElementById('gttc3_grade').value) allFilled = false;
                // if (!document.getElementById('gttc4_grade').value) allFilled = false;
            }
            

            
            console.log(allFilled);
            // Check if acknowledgment checkbox is checked
            let checkboxChecked = $('#acknowledge').is(':checked');

            // Enable/disable the submit button based on the conditions
            if (allFilled && checkboxChecked) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        }
    });
    </script>