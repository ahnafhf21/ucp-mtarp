<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
          <br>
          <br>
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login'), false); ?>">
                        <?php echo e(csrf_field(), false); ?>


                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username'), false); ?>" required autofocus>

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong style="color:red;"><?php echo e($errors->first('username'), false); ?></strong>
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
                                        <strong style="color:red;"><?php echo e($errors->first('password'), false); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : '', false); ?>> Remember Me
                                    </label>
                                </div>
								<div>
									<a href="<?php echo e(url('/password/reset'), false); ?>">Forgot Your Password?</a>   
								</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
								<!--
                                <a class="btn btn-link" href="<?php echo e(route('password.request'), false); ?>">
                                    Forgot Your Password?
                                </a>
								-->
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