

<?php $__env->startSection('content'); ?>
<div class="container">

      <h1 class="mt-5 text-center">Server Statistics</h1>
      <hr>
      <div class="row">
      <div class="col-sm-6">
      <table class="table table-hover">
        <h2>General Statistics</h2>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Total Accounts</th>
            <td><?php echo $accounts->count(); ?></td>
          </tr>
          <tr>
            <th scope="row">Total Characters</th>
            <td><?php echo $characters->count(); ?></td>
          </tr>
          <tr>
            <th scope="row">Total Factions</th>
            <td><?php echo $factions->count(); ?></td>
          </tr>
          <tr>
            <th scope="row">Total Interiors</th>
            <td><?php echo $interiors->count(); ?></td>
          </tr>
          <tr>
            <th scope="row">Total Vehicles</th>
            <td><?php echo $vehicles->count(); ?></td>
          </tr>
          <tr>
            <th scope="row">Total NPC</th>
            <td><?php echo $shops->count(); ?></td>
          </tr>
        </tbody>
      </table>
      </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6">
    <table class="table table-hover">
      <h2>Top 10 Playhours</h2>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Character Name</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        <?php $__currentLoopData = $playhours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $i=$i+1; ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <th scope="row"><?php echo $ph->charactername; ?></th>
          <td><?php echo $ph->hoursplayed; ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>

    <div class="col-sm-6">
    <table class="table table-hover">
      <h2>Top 10 Donates</h2>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        <?php $__currentLoopData = $topdonates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $i=$i+1; ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <th scope="row"><?php echo $donate->username; ?></th>
          <td><?php echo number_format($donate->totalcredits); ?> Coin(s)</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>