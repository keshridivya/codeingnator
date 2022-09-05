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
                <a href="" class="btn btn-primary float-end mr-4">+ Add</a>
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
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Action</th>
                                <th>Add Social Media</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                                <td><a href="">delete</a></td>
                                <td><a href='' data-bs-toggle="modal"  class="btn btn-success rounded-circle modalWhats" title="Social Media" data-id="1"><i class="fa fa-whatsapp"></i></a>
                                <a href='' class="btn btn-primary rounded-circle" title="Social Media" data-id="2"><i class="fa fa-facebook"></i></a>
                                </td>
                            </tr>
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
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
        </div>
    </div>
    </div>  
      <!-- modal -->
      
    <!--Container Main end-->
<?php echo view('include/footer'); ?>