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
                <a href="<?php echo base_url('Business') ?>" class="btn btn-primary float-end mr-4">+ Add</a>
                <a href="" class="btn btn-warning float-end">Card</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Registration List</div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Owner Name </th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Business Name</th>
                                <th>Office Address</th>
                                <th>Action</th>
                                <th>Add Social Media</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        //ucfirst means first letter capital
                        if(!empty($result)){ 
                            $count=1;
                                        foreach($result as $row){
                                        ?>
                            <tr>
                                <td><?=  $count; ?></td>
                                <td><?= ucfirst($row->owner_name); ?></td>
                                <td><?= $row->phone; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->business_name; ?></td>
                                <td><?= $row->office_address; ?></td>
                                <td><a href="<?= base_url('delete/'.$row->id) ?>" class="btn btn-warning rounded-circle"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url('edit/'.$row->id) ?>" class="btn btn-primary rounded-circle"><i class="fa fa-edit"></i></a></td>
                                <td>
                                <a href="#" class="btn btn-info btn-sm btn-business-whtsp rounded-circle" data-id="<?= $row->id;?>" data-name="whatsapp"><i class="fa fa-whatsapp"></i></a>    
                                <a href='#' class="btn btn-primary rounded-circle btn-business-whtsp" title="Social Media"  data-id="<?= $row->id;?>" data-name="facebook"><i class="fa fa-facebook"></i></a>
                                </td>
                            </tr>
                            <?php $count++; }  } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- whatsapp modal -->
    <div class="modal fade" id="exampleModalrr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insert Whatsapp Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="<?= base_url('Social Media'); ?>">
        <div class="modal-body">
                <input type="hidden" id="business_id" name="business_id">
                <input type="hidden" id="business_name" name="business_name">
            <div class="mb-3">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="number" class="col-form-label">Number</label>
                <input type="text" class="form-control" id="number" name="number">
            </div>
            <div class="mb-3">
                <label for="recipient-email" class="col-form-label">Email id</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control"/>
                <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer;position: absolute;margin-left: 85%;margin-top: -25px;"></i>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Store Detail</button>
        </div>
        </form>
        </div>
    </div>
    </div>  
      <!-- modal -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-business-whtsp').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');

            $('#business_id').val(id);
            $('#business_name').val(name);
            $('#exampleModalrr').modal('show');
        });
 
    });
</script>
<script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
  
        togglePassword.addEventListener('click', () => {
  
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
                  
            password.setAttribute('type', type);
  
            // Toggle the eye and bi-eye icon
            this.classList.toggle('fa-eye');
        });
    </script>
    <!--Container Main end-->
<?php echo view('include/footer'); ?>