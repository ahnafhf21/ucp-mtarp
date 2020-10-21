<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
	
        <div class="col-md-8 ">
		<br>
	<br>
	<br>
            <div class="card">
                <div class="card-header"><?php echo e(__('Reset Password'), false); ?></div>

                <div class="card-block">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status'), false); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email'), false); ?>">
                        <?php echo csrf_field(); ?>
						
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address'), false); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : '', false); ?>" name="email" value="<?php echo e(old('email'), false); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong style="color:red;"><?php echo e($errors->first('email'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="g-recaptcha" data-sitekey="6LesndMUAAAAAMJbhdseSdS5Cnxmpo2DlBsqUqrc"></div>
                                <?php if($errors->has('g-recaptcha-response')): ?>
                                    <span class="invalid-feedback" style="display:block">
                                        <strong style="color:red;"><?php echo e($errors->first('g-recaptcha-response'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Send Password Reset Link'), false); ?>

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