<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Customer Details</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('customer/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Customer</a> </div>
            </div>
            <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body">
              <table id="empTable" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <!-- <th>State</th> -->
                  <th>Contact person name</th>
                  <th>Contact person contact number</th>
                <!-- <th>Gstn uin</th>
                  <th>Credit days</th> -->
                 <!--  <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php $i=$noof_page+1; 
                if(isset($customer) && $customer!=null)
                {
                 foreach($customer as $c){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td><?php echo $c['phone']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['address']; ?></td>
                
                    <td><?php echo $c['contact_person_name']; ?></td>
                    <td><?php echo $c['contact_person_contact_number']; ?></td>
               
                  <td><label class="switch">
                    <?php if($c['isActive']=='Y'){ ?>
                      <input type="checkbox" checked>
                    <?php }else{ ?>
                      <input type="checkbox">
                    <?php } ?>

                    <span class="slider round"></span>
                  </label>
                </td>
                  <td><a href="<?php echo site_url('customer/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                   <a
                   onclick="return confirm('Are you sure You want to delete?')"
                   href="<?php echo site_url('customer/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash">
                   </span> Delete</a>
                 </td>
               </tr>
             <?php }

           } ?> -->
         </tbody>
       </table>
     </div><!-- /.box-body -->
   </div><!-- /.box -->
 </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/customer/empList'
          },
          'columns': [
             { data: 'id'},
             { data: 'name'},
             { data: 'phone'},
             { data: 'email'},
             { data: 'address'},
             { data: 'contact_person_name'},
             { data: 'contact_number'},
             {data:'href'},
           
          ]
        });
         });
      </script>
<!-- SlimScroll -->

