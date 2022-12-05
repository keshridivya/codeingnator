<?php echo view('include/header'); ?> 
<?php echo view('include/sidebar'); ?>
<style>
    .main-header{
   padding-top:1rem;
}
.card{
    margin-top:5rem
}
</style>
   <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="main-header">
            <h4>Business Registration</h4>
            <div style="width:100%">
                <a href="<?= base_url('Registration') ?>" class="btn btn-primary float-end mr-4">Registration List</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Business Registration Form</div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('Business') ?>">
                    <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Owner Name</label>
                            <input type="text" name="name" class="form-control" id="exampleCheck1" value="<?= set_value('name'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : '' ?></span>
                        </div>
                        <div class="mb-3 form-check">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?= set_value('email'); ?>" name="email">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Mobile No</label>
                            <input type="tel" class="form-control" name="mob" id="exampleCheck1" value="<?= set_value('mob'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'mob') : '' ?></span>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Whatsapp No</label>
                            <input type="tel" class="form-control" name="whtsp" id="exampleCheck1" value="<?= set_value('whtsp'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'whtsp') : '' ?></span>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Business Name</label>
                            <input type="text" class="form-control" name="busi_name" id="exampleCheck1" value="<?= set_value('busi_name'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'busi_name') : '' ?></span>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Office Address</label>
                            <input type="tel" class="form-control" name="office_name" id="exampleCheck1" value="<?= set_value('office_name'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation,'office_name') : '' ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
    <!--Container Main end-->
<?php echo view('include/footer'); ?>