<div class="login-box">
    <div class="login-logo">
        <h2 class='text-white'> Malnad College of Engineering </h2>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-danger">

        <div class="card-body login-card-body">
            <p class="login-box-msg text-uppercase1 p">Enter your email address and mobile number associated with your
                account. We'll send you a link to reset your password.</p>

            <?php echo form_open($action, 'class="js-validation-signin" method="POST"'); ?>
            <?php echo '<span class="text-danger">'.validation_errors().'</span>'; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-envelope ml-2"></i>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" value="">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fa fa-fw fa-mobile-alt"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <?php echo anchor('admin','<i class="fas fa-caret-left"></i> Back to Login ','class="text-danger"'); ?>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-danger btn-block">Reset Password</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>



        </div>
        <!-- /.login-card-body -->
    </div>

    <div class="text-center text-white mt-3">
        <p>Copyright © <?=date('Y');?>. Powered by
            <?php echo anchor('https://medhatech.in/','MedhaTech','target="_blank" class="text-white font-weight-bold"');?>
        </p>
    </div>
</div>
<!-- /.login-box -->