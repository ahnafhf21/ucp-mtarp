<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal(<?php echo Session::pull('sweet_alert.alert'); ?>);
    </script>
<?php endif; ?>
