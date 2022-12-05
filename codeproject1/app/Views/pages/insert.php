<?php echo view('include/header'); 

$validation = \config\services::validation();
?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="<?php echo base_url('/') ?>" class="btn btn-danger btn-sm rounded">Back</a>
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="container-fluid">
                            <form method="post" action="<?php echo base_url('insert'); ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="agent_name" class="form-label">Name <span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control <?= $validation->getError('name')?"is-invalid":'' ?>" value="<?php echo set_value('name') ?>">
                                        <?php
                                        if($validation->getError('name')){ ?>
                                            <div class="invalid-feedback">
                                                <?php echo $validation->getError('name'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="agent_address" class="form-label">Mobile<span class="text-danger">
                                                *</span></label>
                                        <input type="tel" id="mob" name="mob" maxlength="10" minlength="10"  class="form-control <?= $validation->getError('mob')?"is-invalid":'' ?>" value="<?php echo set_value('mob') ?>">
                                        <?php
                                        if($validation->getError('mob')){ ?>
                                            <div class="invalid-feedback">
                                                <?php echo $validation->getError('mob'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="agent_address" class="form-label">Email<span class="text-danger">
                                                *</span></label>
                                        <input type="email" id="email" name="email" class="form-control <?= $validation->getError('email')?"is-invalid":'' ?>" value="<?php echo set_value('email') ?>">
                                        <?php
                                        if($validation->getError('email')){ ?>
                                            <div class="invalid-feedback">
                                                <?php echo $validation->getError('email'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 text-center">
                                        <input type="submit" name="sub" class="btn btn-primary" value="submit" >
                                    </div>
                                </div>
                            </div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('include/footer') ?>