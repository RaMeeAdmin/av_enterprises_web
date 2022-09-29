<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Locations  List</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('locations/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Locations </a> 
                </div>
                </div>
          <div class="box-body"> 
          <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="empTable" class="table table-striped">
                    <thead>
                    <tr>
                  <!--   <th>#</th> -->
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact person name</th>
                    <th>Contact number</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  <!--   <?php $i=$noof_page+1; 
           if(isset($locations) && $locations!=null)
           {
           foreach($locations as $l){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $l['name']; ?></td>
                    <td><?php echo $l['address']; ?></td>
                    <td><?php echo $l['contact_person_name']; ?></td>
                    <td><?php echo $l['contact_number']; ?></td>
                  
                     <td><a href="<?php echo site_url('locations/edit/'.$l['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('locations/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> 
                     </td>
                    </tr>
                     <?php }
                    
                           }
          ?>-->
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/locations/empList'
          },
          'columns': [
             { data: 'name'},
             { data: 'address'},
             { data: 'contact_person_name'},
             { data: 'contact_number'},
             { data: 'href'},
           
          ]
        });
        $('.is_remove').click(function(){
          var book_id = $(this).parent().data('id');
        //alert(book_id);
      });
     });
     </script>