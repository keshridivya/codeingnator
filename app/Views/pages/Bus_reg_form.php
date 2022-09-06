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
<?php
print_r($editRecord);
echo $editRecord->status;

foreach ($editRecord as $row);
if(!empty($editRecord)){
    $action = base_url('edit/'.$row->id);
}else{
    $action = base_url('Business');
}
?>
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
                    <form method="post" action="<?= $action ?>">
                    <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Owner Name</label>
                            <input type="text" name="name" class="form-control" id="exampleCheck1" value="<?= ucfirst($row->owner_name) ?>">
                        </div>
                        <div class="mb-3 form-check">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $row->email ?>" name="email">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Mobile No</label>
                            <input type="tel" class="form-control" name="mob" id="exampleCheck1" value="<?= $row->phone ?>">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Whatsapp No</label>
                            <input type="tel" class="form-control" name="whtsp" id="exampleCheck1" value="<?= $row->whatsapp_no ?>">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Business Name</label>
                            <input type="text" class="form-control" name="busi_name" id="exampleCheck1" value="<?= $row->business_name ?>">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-label" for="exampleCheck1">Office Address</label>
                            <input type="tel" class="form-control" name="office_name" id="exampleCheck1" value="<?= $row->office_address ?>">
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
    <!--Container Main end-->
<?php echo view('include/footer'); ?>