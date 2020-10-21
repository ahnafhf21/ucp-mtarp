<style>
strong{
		color:red;
    }
</style>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
          <br><br>
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register'), false); ?>">
                        <?php echo e(csrf_field(), false); ?>


                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username'), false); ?>" required autofocus>

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name'), false); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email'), false); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-md-6">
                                <div class="g-recaptcha" data-sitekey="6LesndMUAAAAAMJbhdseSdS5Cnxmpo2DlBsqUqrc"></div>
                                <?php if($errors->has('g-recaptcha-response')): ?>
                                    <span class="invalid-feedback" style="display:block">
                                        <strong style="color:red;"><?php echo e($errors->first('g-recaptcha-response'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>