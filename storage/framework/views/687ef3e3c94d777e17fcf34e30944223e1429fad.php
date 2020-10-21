

<?php $__env->startSection('content'); ?>

  <div class="container">
    <br><br>
    <h3>Edit Profil</h3>
    <hr>
    <div class="row">
      <div class="col-md-4">
        <ul>
          <li><a href="<?php echo e(route('account.edit', $account->username), false); ?>">Edit Profil</a></li>
          <li><a href="<?php echo e(route('password.edit', $account->username), false); ?>">Ganti Password</a></li>
         <!-- <li><a href="<?php echo e(route('email.edit', $account->username), false); ?>">Ganti Email</a></li>-->
        </ul>
      </div>
      <div class="col-md-8">
        <div class="card card-outline-secondary">
            <div class="card-block">
              <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('account.update', $account->username), false); ?>">
                <?php echo e(method_field('PUT'), false); ?>

                <?php echo e(csrf_field(), false); ?>

                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
                  <label  for="username">Username</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">@</div>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo e($account->username, false); ?>" disabled>
                  </div>
                  <?php if($errors->has('username')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('username'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                  <label for="name">Nama</label>
                  <input id="name" type="text" class="form-control" name="name" value="<?php echo e($account->name, false); ?>" required autofocus>
                  <?php if($errors->has('name')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('name'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                  <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : '', false); ?>">
                  <label for="description">Deskripsi</label>
                  <textarea name="description" class="form-control" id="description" style="resize: none;" rows="3"><?php echo e($account->description, false); ?></textarea>
                  <?php if($errors->has('description')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('description'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('facebook') ? ' has-error' : '', false); ?>">
                  <label for="facebook">Facebook Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://facebook.com/</div>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo e($account->facebook, false); ?>">
                  </div>
                  <?php if($errors->has('facebook')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('facebook'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('twitter') ? ' has-error' : '', false); ?>">
                  <label for="twitter">Twitter Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://twitter.com/</div>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo e($account->twitter, false); ?>">
                  </div>
                  <?php if($errors->has('twitter')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('twitter'), false); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('instagram') ? ' has-error' : '', false); ?>">
                  <label for="instagram">Instagram Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://instagram.com/</div>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo e($account->instagram, false); ?>">
                  </div>
                  <?php if($errors->has('instagram')): ?>
                    <span class="help-block">
                     <strong><?php echo e($errors->first('instagram'), false); ?></strong>
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