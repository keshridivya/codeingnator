<?php echo view('include/header'); ?>
<?php echo view('include/sidebar'); ?>
<!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Main Components</h4>
        <!-- ucfirst means text-transform capitalize -->
        <h4><?= ucfirst($userInfo['fname']) ?></h4>
    </div>
    <!--Container Main end-->
<?php echo view('include/footer'); ?>
    