<div class="login-box">
    <div class="login-logo">
        <h4 class='text-white text-uppercase'> Malnad College of Engineering <br /> <span class="h4 text-uppercase">Student Panel
            </span></h4>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg text-uppercase1 p">Enter credentials to Sign in to your account</p>

            <?php echo form_open($action, 'class="js-validation-signin" method="POST"'); ?>
            <?php echo '<span class="text-danger">'.validation_errors().'</span>'; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password-field" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <?php echo anchor('admin/forgot_password','Forgot Password?','class="text-danger"'); ?>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-danger btn-block">Sign In</button>
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