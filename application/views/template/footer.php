 <!-- Start Footer Style Two  -->
 <div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="6">
            <div class="wrapper plr--50 plr_sm--20">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="inner">
                            <div class="logo text-center text-sm-start mb_sm--20">
                                <a href="#">
                                    <img src="<?php echo base_url();?>themes/images/logo/MCE_logo1.png" alt="Logo images" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="inner text-center">
                            <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="inner text-lg-end text-center mt_md--20 mt_sm--20">
                            <div class="text">
                                <p>Copyright © 2024 MCE. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Style Two  -->
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="<?php echo base_url();?>themes/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="<?php echo base_url();?>themes/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url();?>themes/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/stellar.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/particles.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/masonry.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/stickysidebar.js"></script>
    <script src="<?php echo base_url();?>themes/js/plugins/plugins.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/js.cookie.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/jquery.style.switcher.js"></script>
    <script src="<?php echo base_url();?>themes/js/vendor/jquery-one-page-nav.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url();?>themes/js/main.js"></script>


</body>

<script>
    function enable(){
        var applyCheck = document.getElementById("applyCheck");
        var submit = document.getElementById("submit");
        if(applyCheck.checked){
            submit.removeAttribute("disabled")
        } else{
            submit.disabled="true";
        }
    }
 </script>
</html>