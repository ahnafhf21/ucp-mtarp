<?php $__env->startSection('content'); ?>
  <div class="container">
    <br>
    <br>
    <?php if(Auth::user()->username == $account->username and $account->activated == 0): ?>
    <form id="activation" method="POST" action="<?php echo e(route('account.activation', $account->username), false); ?>">
      <?php echo e(method_field('PUT'), false); ?>

      <?php echo e(csrf_field(), false); ?>

      <div class="alert alert-danger" style="margin-top:5px;" role="alert">
        Your account is <strong>not active</strong>, <a style="text-decoration: underline;" href="#" onclick="document.getElementById('activation').submit()">click here</a> to activate your account !!!
      </div>
    </form>
    <?php endif; ?>
    <div class="card">
      <div class="card-header">
        <h2><?php echo e($account->username, false); ?>'s Profile</h2>
      </div>
      <div class="card-block">
        <div class="row">
          <div class="col-md-2">
            <img src="https://www.gravatar.com/avatar/<?php echo e(md5( strtolower( trim( $account->email ) ) ), false); ?>?d=<?php echo e(urlencode( 'monsterid' ), false); ?>"  alt="Profile Photo" width="135px" height="135px" class="rounded-circle">
            <br>
            <p style="margin-left: 25px;">
              <?php if($account->facebook): ?>
                <a href="https://facebook.com/<?php echo e($account->facebook, false); ?>" target="_blank"><img src="<?php echo e(asset('/images/fb.png'), false); ?>" width="25px" alt="facebook"></a>
              <?php endif; ?>
              <?php if($account->twitter): ?>
                <a href="https://twitter.com/<?php echo e($account->twitter, false); ?>" target="_blank"><img src="<?php echo e(asset('/images/tw.png'), false); ?>" width="25px" alt="twitter"></a>
              <?php endif; ?>
              <?php if($account->instagram): ?>
                <a href="https://instagram.com/<?php echo e($account->instagram, false); ?>" target="_blank"><img src="<?php echo e(asset('/images/ig.png'), false); ?>" width="25px" alt="instagram"></a>
              <?php endif; ?>
            </p>
          </div>
          <div class="col-md-4 border-left"> 

            <a href="#"><h4><?php echo e('@' . $account->username, false); ?> <?php if($account->verification==1): ?> <img src="/images/oce.png" width="20px" alt="verified"> <?php endif; ?></h4></a>
            <h4><?php echo e($account->name, false); ?></h4>
            <h6>Joined about <?php echo $account->registerdate->diffForHumans(); ?>.</h6>
			<?php if($account->lastlogin): ?>
            <h6>Last login about <?php echo $account->lastlogin->diffForHumans(); ?>.</h6>
			<?php endif; ?>
            <?php if($account->activated == 1): ?>
              <span class="badge badge-success">Account Verified</span>
            <?php else: ?>
              <span class="badge badge-danger">Not Activated</span>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <?php if(!$account->description): ?>
              <div class="card card-outline-info mb-3 text-center">
                <div class="card-block">
                  <blockquote class="card-blockquote">
                    <p>Nothing to share.</p>
                    <footer>Signed by <cite title="Source Title"><?php echo e($account->username, false); ?></cite></footer>
                  </blockquote>
                </div>
              </div>
            <?php else: ?>
              <div class="card card-outline-info mb-3 text-center">
                <div class="card-block">
                  <blockquote class="card-blockquote">
                    <p><?php echo e($account->description, false); ?></p>
                    <footer>Signed by <cite title="Source Title"><?php echo e($account->username, false); ?></cite></footer>
                  </blockquote>
                </div>
              </div>
            <?php endif; ?>
            <!--<a class="card card-danger col-md-4 mb-3 text-white text-center" href="#">Admin History</a> -->
          </div>
        </div>
      </div>
    </div>
    <br>
    <h2>Friends</h2>
    <hr>


    <?php $__currentLoopData = $account->friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="/account/<?php echo $f->user->username; ?>" alt="Test">
      <img src="https://www.gravatar.com/avatar/<?php echo e(md5( strtolower( trim( $f->user->email ) ) ), false); ?>?d=<?php echo e(urlencode( 'monsterid' ), false); ?>"  alt="<?php echo e($f->user->username, false); ?>" width="80px" height="80px" style="margin-left: 8px; margin-top:8px;" class="rounded-circle">
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <br>
    <?php if(Auth::user()->username == $account->username or Auth::user()->admin >= 6): ?>
    <br>
    <h2>Character details</h2>
    <hr>
    <div class="card ">
     <div class="card-header">
       <ul class="nav nav-tabs card-header-tabs pull-right"  id="myTab" role="tablist">
         <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->first): ?>
            <li class="nav-item character-list">
             <a class="nav-link active" id="<?php echo $character->charactername; ?>-tab" data-toggle="tab" href="#<?php echo $character->charactername; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $character->charactername; ?></a>
            </li>
          <?php else: ?>
          <li class="nav-item character-list">
            <a class="nav-link" id="<?php echo $character->charactername; ?>-tab" data-toggle="tab" href="#<?php echo $character->charactername; ?>" role="tab" aria-controls="contact" aria-selected="false"><?php echo $character->charactername; ?></a>
          </li>
          <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
     </div>
     <div class="card-body">
      <div class="tab-content" id="myTabContent">
        <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($loop->first): ?>
          <div class="tab-pane fade show active" id="<?php echo $character->charactername; ?>" role="tabpanel" aria-labelledby="<?php echo $character->charactername; ?>-tab">
            <div class="row">
              <div class="col-md-2">
                <img src="<?php echo e(asset('images/chars/' . $character->skin . '.png'), false); ?>" width="200px" alt="">
              </div>
              <div class="col-md-4 border-left" style="margin-left: 15px;">
                <br>
                <h3>General info</h3>
                <hr>
                Character Name : <a href="#"><?php echo $character->charactername; ?></a><br>
                Status : <a href="#">
                  <?php if($character->cked==1): ?>
                    Mati
                  <?php else: ?>
                    Hidup
                  <?php endif; ?>
                </a><br>
                Gender : <a href="#">
                  <?php if($character->gender==0): ?>
                    Man
                  <?php else: ?>
                    Women
                  <?php endif; ?>
                </a><br>
                Age : <a href="#"><?php echo $character->age; ?></a><br>
                Health : <a href="#"><?php echo $character->health; ?></a><br>
                Armor : <a href="#"><?php echo $character->armor; ?></a><br>
                Hunger : <a href="#"><?php echo $character->hunger; ?></a><br>
                Thirst : <a href="#"><?php echo $character->thirst; ?></a><br>
                Fun : <a href="#"><?php echo $character->fun; ?></a><br>
                Pocket money : <a href="#">$<?php echo number_format($character->money, 2, ',', '.'); ?></a> <br>
                Bank money : <a href="#">$<?php echo number_format($character->bankmoney, 2, ',', '.'); ?></a> <br>
                Job : <a href="#">
                  <?php if($character->job==0): ?>
                    Unemployed
                  <?php elseif($character->job==1): ?>
                    Trucker
                  <?php elseif($character->job==2): ?>
                      Taxi Driver
                  <?php elseif($character->job==3): ?>
                      Bus Driver
                  <?php elseif($character->job==4): ?>
                      City Maintenence
                  <?php elseif($character->job==5): ?>
                      Mechanic
                  <?php else: ?>
                      Unknown
                  <?php endif; ?>
                </a>
                <br>
                <br>
                <h3>Licenses info</h3>
                <hr>
                Driving license :
                <?php if($character->car_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Pilot license :
                <?php if($character->pilot_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Bike license :
                <?php if($character->bike_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Gun license :
                <?php if($character->gun_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                 <br>
              </div>

              <div class="col-md-4">
                <br>
                <h3>Interior info</h3>
                <hr>
                  Interior: ( <?php echo count($character->interiors->where('deleted', 0)); ?>/<?php echo $character->maxinteriors; ?> )
                <ul>
                  <?php $__currentLoopData = $character->interiors->where('deleted', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="#"><?php echo e($interior->name, false); ?> (<?php echo e($interior->id, false); ?>)</a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <br>
                <h3>Vehicle info</h3>
                <hr>
                Vehicle : ( <?php echo count($character->vehicles->where('deleted', 0)); ?>/<?php echo $character->maxvehicles; ?> )
                <br>
                  <ul>
                    <?php $__currentLoopData = $character->vehicles->where('deleted', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="#"><?php echo e(isset($vehicle->shop->vehbrand) ? $vehicle->shop->vehbrand : 'Unknown', false); ?> - <?php echo e(isset($vehicle->shop->vehmodel) ? $vehicle->shop->vehmodel : '', false); ?> <?php echo e(isset($vehicle->shop->vehyear) ? $vehicle->shop->vehyear : '', false); ?> (<?php echo e($vehicle->id, false); ?>)</a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
            </div>
          </div>
         <?php else: ?>
          <div class="tab-pane fade " id="<?php echo $character->charactername; ?>" role="tabpanel" aria-labelledby="<?php echo $character->charactername; ?>-tab">
            <div class="row">
              <div class="col-md-2">
                <img src="<?php echo e(asset('images/chars/' . $character->skin . '.png'), false); ?>" width="200px" alt="">
              </div>
              <div class="col-md-4 border-left" style="margin-left: 15px;">
                <br>
                <h3>General info</h3>
                <hr>
                Character Name : <a href="#"><?php echo $character->charactername; ?></a><br>
                Status : <a href="#">
                  <?php if($character->cked==1): ?>
                    Mati
                  <?php else: ?>
                    Hidup
                  <?php endif; ?>
                </a><br>
                Gender : <a href="#">
                  <?php if($character->gender==0): ?>
                    Man
                  <?php else: ?>
                    Women
                  <?php endif; ?>
                </a><br>
                Age : <a href="#"><?php echo $character->age; ?></a><br>
                Health : <a href="#"><?php echo $character->health; ?></a><br>
                Armor : <a href="#"><?php echo $character->armor; ?></a><br>
                Hunger : <a href="#"><?php echo $character->hunger; ?></a><br>
                Thirst : <a href="#"><?php echo $character->thirst; ?></a><br>
                Fun : <a href="#"><?php echo $character->fun; ?></a><br>
                Pocket money : <a href="#">$<?php echo number_format($character->money, 2, ',', '.'); ?></a> <br>
                Bank money : <a href="#">$<?php echo number_format($character->bankmoney, 2, ',', '.'); ?></a> <br>
                Job : <a href="#">
                  <?php if($character->job==0): ?>
                    Unemployed
                  <?php elseif($character->job==1): ?>
                    Trucker
                  <?php elseif($character->job==2): ?>
                      Taxi Driver
                  <?php elseif($character->job==3): ?>
                      Bus Driver
                  <?php elseif($character->job==4): ?>
                      City Maintenence
                  <?php elseif($character->job==5): ?>
                      Mechanic
                  <?php else: ?>
                      Unknown
                  <?php endif; ?>
                </a>
                <br>
                <br>
                <h3>Licenses info</h3>
                <hr>
                Driving license :
                <?php if($character->car_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Pilot license :
                <?php if($character->pilot_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Bike license :
                <?php if($character->bike_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                Gun license :
                <?php if($character->gun_license==0): ?>
                  <a href="#" style="color:red;">No</a>
                <?php else: ?>
                  <a href="#" style="color:green;">Yes</a>
                <?php endif; ?>
                 <br>
                 <br>
              </div>

              <div class="col-md-4">
                <br>
                <h3>Interior info</h3>
                <hr>
                  Interior: ( <?php echo count($character->interiors->where('deleted', 0)); ?>/<?php echo $character->maxinteriors; ?> )
                <ul>
                  <?php $__currentLoopData = $character->interiors->where('deleted', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="#"><?php echo e($interior->name, false); ?> (<?php echo e($interior->id, false); ?>)</a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <br>
                <h3>Vehicle info</h3>
                <hr>
                Vehicle : ( <?php echo count($character->vehicles->where('deleted', 0)); ?>/<?php echo $character->maxvehicles; ?> )
                <br>
                  <ul>
                    <?php $__currentLoopData = $character->vehicles->where('deleted', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="#"><?php echo e(isset($vehicle->shop->vehbrand) ? $vehicle->shop->vehbrand : 'Unknown', false); ?> - <?php echo e(isset($vehicle->shop->vehmodel) ? $vehicle->shop->vehmodel : '', false); ?> <?php echo e(isset($vehicle->shop->vehyear) ? $vehicle->shop->vehyear : '', false); ?> (<?php echo e($vehicle->id, false); ?>)</a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
            </div>
          </div>
         <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
     </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>