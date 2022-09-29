<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Suppliers  Listing</h3>
              <div class="box-tools">
               <a href="<?php echo site_url('suppliers/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add Suppliers</a> 
                </div>
              </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="empTable" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Company name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact person name</th>
                    <th>Contact person number</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   <!--  <?php $i=$noof_page+1; 
           if(isset($suppliers) && $suppliers!=null)
           {
           foreach($suppliers as $s){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                   
                    <td><?php echo $s['company_name']; ?></td>
                    <td><?php echo $s['address']; ?></td>
                    <td><?php echo $s['state_name']; ?></td>
                    <td><?php echo $s['phone']; ?></td>
                    <td><?php echo $s['contact_person_name']; ?></td>
                    <td><?php echo $s['contact_person_number']; ?></td>
                    <td><?php echo $s['email']; ?></td>
                    <td><?php echo $s['gsts_no']; ?></td>
                  
                     <td><a href="<?php echo site_url('suppliers/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('suppliers/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                     </td>
                    </tr>
                     <?php }
                    
                           }

          ?> -->
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

        </div>
    </div>

</div>
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
             'url':'<?=base_url()?>api/suppliers/supplierList'
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
