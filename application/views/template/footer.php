<!-- Start Footer Style Two  -->
<div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="6">
    <div class="wrapper plr--50 plr_sm--20">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="inner">
                    <div class="text">
                        <p>Copyright © 2024 MCE. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="inner text-lg-end text-center mt_md--20 mt_sm--20">
                    <div class="text">
                        <p>Design and Developed by <a href="https://medhatech.in/" target="_blank"
                                class="text-danger">MedhaTech</a></p>
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
<script src="<?php echo base_url(); ?>themes/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="<?php echo base_url(); ?>themes/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>themes/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/stellar.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/particles.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/masonry.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/stickysidebar.js"></script>
<script src="<?php echo base_url(); ?>themes/js/plugins/plugins.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/jquery.style.switcher.js"></script>
<script src="<?php echo base_url(); ?>themes/js/vendor/jquery-one-page-nav.js"></script>
<!-- Main JS -->
<script src="<?php echo base_url(); ?>themes/js/main.js"></script>


</body>

<script>
    // function enable() {
    //     var applyCheck = document.getElementById("applyCheck");
    //     var submit = document.getElementById("submit");
    //     if (applyCheck.checked) {
    //         submit.removeAttribute("disabled")
    //         submit.style.background = 'red';
    //     } else {
    //         submit.disabled = "true";
    //         submit.style.background = 'grey';
    //     }
    // }

    $(function () {
        $("#mobile").keypress(function (e) {
            let myArray = [];
            for (i = 48; i < 58; i++) myArray.push(i);
            if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();
        });
        $("#par_mobile").keypress(function (e) {
            let myArray = [];
            for (i = 48; i < 58; i++) myArray.push(i);
            if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();
        });
        $("#aadhaar").keypress(function (e) {
            let myArray = [];
            for (i = 48; i < 58; i++) myArray.push(i);
            if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();
        });
        $("#sslc_grade").keydown(function (e) {
            var k = e.keyCode || e.which;
            var ok = k >= 65 && k <= 90 || // A-Z
                k >= 96 && k <= 105 || // a-z
                k >= 35 && k <= 40 || // arrows
                k == 9 || //tab
                k == 46 || //del
                k == 8 || // backspaces
                k == 190 || //dot
                (!e.shiftKey && k >= 48 && k <= 57); // only 0-9 (ignore SHIFT options)

            if (!ok || (e.ctrlKey && e.altKey)) {
                e.preventDefault();
            }
        });

        $("#puc1_grade").keydown(function (e) {
            var k = e.keyCode || e.which;
            var ok = k >= 65 && k <= 90 || // A-Z
                k >= 96 && k <= 105 || // a-z
                k >= 35 && k <= 40 || // arrows
                k == 9 || //tab
                k == 46 || //del
                k == 8 || // backspaces
                k == 190 || //dot
                (!e.shiftKey && k >= 48 && k <= 57); // only 0-9 (ignore SHIFT options)

            if (!ok || (e.ctrlKey && e.altKey)) {
                e.preventDefault();
            }
        });

        $("#puc2_grade").keydown(function (e) {
            var k = e.keyCode || e.which;
            var ok = k >= 65 && k <= 90 || // A-Z
                k >= 96 && k <= 105 || // a-z
                k >= 35 && k <= 40 || // arrows
                k == 9 || //tab
                k == 46 || //del
                k == 8 || // backspaces
                k == 190 || //dot
                (!e.shiftKey && k >= 48 && k <= 57); // only 0-9 (ignore SHIFT options)

            if (!ok || (e.ctrlKey && e.altKey)) {
                e.preventDefault();
            }
        });



    });
</script>

</html>