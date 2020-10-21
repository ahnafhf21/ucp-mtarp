<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=170364940106621&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-lg-12 text-center">
        <?php if(Auth::user()): ?>
          <h1 class="mt-5">Hello, <?php echo $account->username; ?> !!!</h1>
        <?php else: ?>
          <h1 class="mt-5">Hello, Roleplayer !!!</h1>
        <?php endif; ?>
          <br>
          <div class="fb-page" data-href="https://www.facebook.com/liongamingroleplay" data-tabs="timeline" data-width="500"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/liongamingroleplay" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/liongamingroleplay">Lion Gaming Roleplay</a></blockquote></div>
          <p class="lead">Jangan lupa untuk follow semua sosial media Lion Gaming Roleplay untuk info - info terbaru tentang lion!!!</p>
          <ul class="list-unstyled">
              <li><i>Lion Gaming Developer Team</i></li>
          </ul>
      </div>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>