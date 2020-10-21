

<?php $__env->startSection('content'); ?>

  <div class="container">
    <br><br>
    <h3>Ganti Password</h3
    <hr>
    <div class="row">
      <div class="col-md-4">
        <ul>
          <li><a href="<?php echo e(route('account.edit', $user->username), false); ?>">Edit Profil</a></li>
          <li><a href="<?php echo e(route('password.edit', $user->username), false); ?>">Ganti Password</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="card card-outline-secondary">
            <div class="card-block">
              <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('password.update', $user->username), false); ?>">
                <?php echo e(method_field('PUT'), false); ?>

                <?php echo e(csrf_field(), false); ?>

                <div class="form-group<?php echo e($errors->has('current_password') ? ' has-error' : '', false); ?>">
                  <label for="current_password">Password</label>
                  <input id="current_password" type="password" class="form-control" name="current_password" required autofocus>
                  <?php if($errors->has('current_password')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('current_password'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                  <label for="password">Password Baru</label>
                  <input id="password" type="password" class="form-control" name="password" required autofocus>
                  <?php if($errors->has('password')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('password'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : '', false); ?>">
                  <label for="password_confirmation">Ulangi Password Baru</label>
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                  <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('password_confirmation'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>